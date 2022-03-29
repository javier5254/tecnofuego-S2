<?php

namespace App\Http\Controllers\Activity;

use App\Models\Item;
use App\Models\Client;
use App\Models\Project;
use App\Models\Activity;
use App\Models\ActivList;
use App\Models\Component;
use App\Models\Equipment;
use Illuminate\Http\Request;
use App\Models\answers_activities;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ControlFields;
use App\Models\EquipCompo;
use App\Models\EquipPart;
use App\Models\Location;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    const PERMISSIONS = [
        'create' => 'activity-create',
        'show' => 'activity-show',
        'edit' => 'activity-edit',
    ];
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:' . self::PERMISSIONS['create'])->only(['create', 'store']);
        $this->middleware('permission:' . self::PERMISSIONS['show'])->only(['index', 'show']);
        $this->middleware('permission:' . self::PERMISSIONS['edit'])->only(['edit', 'update']);
    }
    public function main($module)
    {

        switch ($module) {
            case 1:
                $module = [1, 6];
                break;
            case 2:
                $module = [2, 7];
                break;
            case 3:
                $module = [3, 8];
                break;
            case 4:
                $module = [4, 9];
                break;
            case 5:
                $module = [5, 10];
                break;

            default:
                $module = 1;
                break;
        }

        // return view('modules.activity.main',compact('module'));
        $vals = DB::table('equipments as e')
            ->join("valists as v1", "e.flota_id", "=", "v1.id")
            ->join("valists as v2", "e.marca_id", "=", "v2.id")
            ->join("activities as a", "e.id", "=", "a.equip_id")
            ->join("clients as c", "e.client_id", "=", "c.id")
            ->join("projects as p", "e.project_id", "=", "p.id")
            ->join("type_activs as type", "a.type_id", "=", "type.id")
            ->whereIn("a.type_id", $module)
            ->select(["a.id as id", "a.endDate", "e.internalN", "c.name as cname", "p.name as pname", "a.created_at", "a.state", "type.name","v1.label as flota", "v2.label as marca"])
            ->orderBy('id', 'DESC')
            ->paginate(20);

        return view('modules.activity.main', compact('module', 'vals'));
    }
    public function index($module)
    {
        $equips = DB::table('equipments')
            ->join("valists as v1", "equipments.flota_id", "=", "v1.id")
            ->join("valists as v2", "equipments.marca_id", "=", "v2.id")
            ->join("valists as v3", "equipments.modelo_id", "=", "v3.id")
            ->join("clients as c", "equipments.client_id", "=", "c.id")
            ->join("projects as p", "equipments.project_id", "=", "p.id")
            ->select(["equipments.*", "v1.label as flota", "v2.label as marca", "v3.label as modelo", "c.name as cname", "p.name as pname"])
            ->paginate(5);
        return view('modules.activity.index', compact('equips', 'module'));
    }
    public function create($array)
    {
        $data = explode("-", $array);
        $id = $data[0];
        $module = $data[1];
        $equip = DB::table('equipments')
            ->join("valists as v1", "equipments.flota_id", "=", "v1.id")
            ->join("valists as v2", "equipments.marca_id", "=", "v2.id")
            ->join("valists as v3", "equipments.modelo_id", "=", "v3.id")
            ->join("clients as c", "equipments.client_id", "=", "c.id")
            ->join("projects as p", "equipments.project_id", "=", "p.id")
            ->select(["equipments.*", "v1.label as flota", "v2.label as marca", "v3.label as modelo", "c.name as cname", "p.name as pname", "p.id as pid"])
            ->where("equipments.id", "=", $id)
            ->first();
        $list = ActivList::where("type_id", $module)->get(["id", "name", "description"]);
        if ($equip->project_id) {

            $locations = Location::where("project_id", $equip->project_id)->get(["id", "name"]);
        } else {
            $locations = "";
        }
        return view('modules.activity.create', compact('equip', 'list', 'module', 'id', 'locations'));
    }
    public function edit($id)
    {
        $activ = DB::table('activities')->where('id', $id)->first();
        $module = $activ->type_id;
        $list = ActivList::where("type_id", "=", $module)->where("father_id", "=", null)->get(["id", "name", "description", "father", "funct", "father_id"]);
        $equip = DB::table('equipments')
            ->join("valists as v1", "equipments.flota_id", "=", "v1.id")
            ->join("valists as v2", "equipments.marca_id", "=", "v2.id")
            ->join("valists as v3", "equipments.modelo_id", "=", "v3.id")
            ->join("clients as c", "equipments.client_id", "=", "c.id")
            ->join("projects as p", "equipments.project_id", "=", "p.id")
            ->select(["equipments.*", "v1.label as flota", "v2.label as marca", "v3.label as modelo", "c.name as cname", "p.name as pname", "p.id as pid"])
            ->where("equipments.id", "=", $activ->equip_id)
            ->first();
        $locations = Location::where("project_id", $equip->project_id)->get(["id", "name"]);
        $answers = DB::table('answers_activities')->where('answers_activities.activ_id', $id)->get();
        $answersFathers = DB::table('answers_activities')->join('activ_lists', 'activ_lists.id', 'answers_activities.list_id')->where('activ_lists.father_id', null)->where('answers_activities.activ_id', $id)->get();

        return view('modules.activity.edit', compact('id', 'activ', 'list', 'equip', 'module', 'answers', 'locations', 'answersFathers'));
    }
    public function storeInitial(Request $request)
    {

        if (request("idAct")) {
            $activity = Activity::find(request("idAct"));
            if (request("endDate") || request("endTime")) {
                $activity->state = 3;
                $activity->endDate = request("endDate");
                $activity->endTime = request("endTime");
            } else {
                $activity->startDate =  request("startDate");
                $activity->startTime =  request("startTime");
                $activity->horometer =  request("horometer");
                $activity->location_id =  request("location_id");
                $activity->creator_id = Auth::user()->id;
                $activity->type_id = request("type_id");
                $activity->equip_id = request("equip_id");
            }
            $activity->save();
        } else {
            $activity = new Activity();
            $activity->startDate =  request("startDate") ? request("startDate") : null;
            $activity->startTime =  request("startTime") ? request("startTime") : null;
            $activity->horometer =  request("horometer") ? request("horometer") : null;
            $activity->location_id =  request("location_id") ? request("location_id") : null;
            $activity->state = request('state') ? '1' : '0';
            $activity->creator_id = Auth::user()->id;
            $activity->type_id = request("type_id") ? request("type_id") : null;
            $activity->equip_id = request("equip_id") ? request("equip_id") : null;
            $activity->save();
        }
        return response(json_encode($activity->id), 200)->header('Content-type', 'text/plain');
    }
    public function savetask(Request $request)
    {

        if ($request->idAnswer) {
            $task = answers_activities::find($request->idAnswer);
            $task->observ = request('observation');
            $task->creator_id = Auth::user()->id;
            $task->list_id = request('idList');
            $task->activ_id = request('idActiv');
            if (request('na') != '') {
                $task->state = 3;
            } else {
                $task->state = request('state') ? 1 : 0;
            }
            if (request('v1')) {
                $task->v1 = request('v1');
            }
            $task->save();
        } else {
            $task = new answers_activities;
            $task->observ = request('observation');
            $task->creator_id = Auth::user()->id;
            $task->list_id = request('idList');
            $task->activ_id = request('idActiv');
            if (request('na') != '') {
                $task->state = 3;
            } else {
                $task->state = request('state') ? 1 : 0;
            }
            if (request('v1')) {
                $task->v1 = request('v1');
            }
            $task->save();
        }
        return response(json_encode($task), 200)->header('Content-type', 'text/plain');
    }
    public function parents(Request $request)
    {
        $response = DB::table('activ_lists')->where('father_id', request('idlist'))->get();
        foreach ($response as $r) {
            $answers = DB::table('answers_activities')->where('answers_activities.activ_id', request('idActiv'))->where('answers_activities.list_id', $r->id)->first();
            if ($answers) {
                $val = $answers->id;
                $val1 = $answers->observ;
                $val2 = $answers->state;
                $val3 = $answers->v1;
            } else {
                $val = '';
                $val1 = '';
                $val2 = '';
                $val3 = '';
            }
            $r->observ = $val1;
            $r->idanswer = $val;
            $r->stateanswer = $val2;
            $r->v1 = $val3;
        }
        return response(json_encode($response), 200)->header('Content-type', 'text/plain');
    }
    public function f1(Request $request)
    {
        $response = DB::table('equip_has_compos')->where('equip_has_compos.equip_id', request('idEquip'))->join('components', 'components.id', '=', 'equip_has_compos.compo_id')->join('control_fills', 'control_fills.component_id', '=', 'components.id')->where('components.item_id', 6)->where('control_fills.valist_id', 9)->first(['control_fills.value as cvalue', 'components.id as compo_id', 'components.item_id as item_id']);
        return response(json_encode($response), 200)->header('Content-type', 'text/plain');
    }
    public function f2(Request $request)
    {
        $response = DB::table('equip_has_parts')->join('valists', 'valists.id', '=', 'equip_has_parts.attr_id')->where('equip_id', request('idEquip'))->where('item_id', 3)->where('attr_id', 11)->where('equip_has_parts.state', 1)->first(['equip_has_parts.*', 'valists.label']);
        return response(json_encode($response), 200)->header('Content-type', 'text/plain');
    }
    public function f3(Request $request)
    {
        $old = EquipPart::find(request('id'));
        $old->state = 2;
        $old->save();
        $new = new EquipPart;
        $new->attr_id = $old->attr_id;
        $new->equip_id = $old->equip_id;
        $new->item_id = $old->item_id;
        $new->val = request('val');
        $new->state = 1;
        $new->save();
        return response(json_encode($new), 200)->header('Content-type', 'text/plain');
    }
    public function f4(Request $request)
    {
        $response = DB::table('equip_has_parts')->join('valists', 'valists.id', '=', 'equip_has_parts.attr_id')->where('equip_id', request('idEquip'))->where('item_id', 4)->whereIn('attr_id', [11, 12])->where('equip_has_parts.state', 1)->first(['equip_has_parts.*', 'valists.label']);

        return response(json_encode($request->all()), 200)->header('Content-type', 'text/plain');
    }
    public function f5(Request $request)
    {
        $response = DB::table('equip_has_parts')->join('valists', 'valists.id', '=', 'equip_has_parts.attr_id')->where('equip_id', request('idEquip'))->where('item_id', 25)->where('attr_id', 11)->where('equip_has_parts.state', 1)->first(['equip_has_parts.*', 'valists.label']);
        return response(json_encode($response), 200)->header('Content-type', 'text/plain');
    }
    public function f6(Request $request)
    {
        $response = DB::table('equip_has_parts')->join('valists', 'valists.id', '=', 'equip_has_parts.attr_id')->where('equip_id', request('idEquip'))->where('item_id', 35)->where('attr_id', 11)->where('equip_has_parts.state', 1)->first(['equip_has_parts.*', 'valists.label']);
        return response(json_encode($response), 200)->header('Content-type', 'text/plain');
    }
    public function f7(Request $request)
    {
        $response = DB::table('equip_has_compos')->join('components', 'components.id', '=', 'equip_has_compos.compo_id')->join('items', 'items.id', '=', 'components.item_id')->where('equip_has_compos.equip_id', request('idEquip'))->where('equip_has_compos.state','=','1')->whereIn('items.id', [1, 8, 9, 20, 10, 11, 12])->get(['items.id as itemId','items.name', 'components.id as compo_id']);
        foreach ($response as $r) {
            $p = DB::table('control_fills')->join('components', 'components.id', '=', 'control_fills.component_id')->where('components.id', $r->compo_id)->whereIn('control_fills.valist_id', [9, 10])->get();
            foreach ($p as $p1) {
                if ($p1->valist_id == '9') {
                    $r->v9 = $p1->value;
                } else if ($p1->valist_id == '10') {
                    $r->v10 = $p1->value;
                }
            }
        }
        return response(json_encode($response), 200)->header('Content-type', 'text/plain');
    }
    public function f8(Request $request)
    {
        $response = DB::table('answers_activities')->where('list_id', request('idList'))->where('activ_id', request('idAct'))->first(['v1']);
        return response(json_encode($response), 200)->header('Content-type', 'text/plain');
    }
    public function f9(Request $request)
    {
        $validate = DB::table('answers_activities')->where('list_id', request('idList'))->where('activ_id', request('idAct'))->get();

        if ($validate) {
            $validate = new answers_activities();
            $validate->list_id = request('idList');
            $validate->activ_id = request('idActiv');
            $validate->v1 = request('val');
            $validate->save();
        } else {
            $response = new answers_activities();
            $response->list_id = request('idList');
            $response->activ_id = request('idActiv');
            $response->v1 = request('val');
            $response->save();
        }

        return response(json_encode($request->all()), 200)->header('Content-type', 'text/plain');
    }
    public function f10(Request $request)
    {
        if (request('item_id')) {
            switch (request('item_id')) {
                case '6':
                    $response = DB::table('components')->join('items', 'items.id', '=', 'components.item_id')->whereIn('items.id', [6])->where('components.state', 1)->get(['items.id as iid','items.name', 'components.id as compo_id', 'components.state']);
                    break;
                case '1':
                    $response = DB::table('components')->join('items', 'items.id', '=', 'components.item_id')->whereIn('items.id', [1])->where('components.state', 1)->get(['items.id as iid','items.name', 'components.id as compo_id', 'components.state']);
                    break;
                case '2':
                    $response = DB::table('components')->join('items', 'items.id', '=', 'components.item_id')->whereIn('items.id', [2, 21, 22])->where('components.state', 1)->get(['items.id as iid','items.name', 'components.id as compo_id', 'components.state']);
                    break;
                case '10':
                    $response = DB::table('components')->join('items', 'items.id', '=', 'components.item_id')->whereIn('items.id', [10])->where('components.state', 1)->get(['items.id as iid','items.name', 'components.id as compo_id', 'components.state']);
                    break;
                case '21':
                    $response = DB::table('components')->join('items', 'items.id', '=', 'components.item_id')->whereIn('items.id', [21])->where('components.state', 1)->get(['items.id as iid','items.name', 'components.id as compo_id', 'components.state']);
                    break;
                case '19':
                    $response = DB::table('components')->join('items', 'items.id', '=', 'components.item_id')->whereIn('items.id', [19])->where('components.state', 1)->get(['items.id as iid','items.name', 'components.id as compo_id', 'components.state']);
                    break;
                case '7':
                    $response = DB::table('components')->join('items', 'items.id', '=', 'components.item_id')->whereIn('items.id', [7])->where('components.state', 1)->get(['items.id as iid','items.name', 'components.id as compo_id', 'components.state']);
                    break;

                default:
                    $response = null;
                    break;
            }
        } else {
            $response = DB::table('components')->join('items', 'items.id', '=', 'components.item_id')->whereIn('items.id', [1, 8, 9, 20, 10, 11, 12])->where('components.state', 1)->get(['items.name', 'components.id as compo_id', 'components.state']);
        }

        if ($response) {

            foreach ($response as $r) {
                $p = DB::table('control_fills')->join('components', 'components.id', '=', 'control_fills.component_id')->where('components.id', $r->compo_id)->whereIn('control_fills.valist_id', [9, 10,13])->get();
                foreach ($p as $p1) {
                    if ($p1->valist_id == '9') {
                        $r->v9 = $p1->value;
                    } else if ($p1->valist_id == '10') {
                        $r->v10 = $p1->value;
                    } else if ($p1->valist_id == '13') {
                        $r->v13 = $p1->value;
                    }
                }
            }
            return response(json_encode($response), 200)->header('Content-type', 'text/plain');
        }
    }
    public function f100(Request $request)
    {
        if (request('item_id')) {
            switch (request('item_id')) {
                case '3':
                    $response = DB::table('items')->where('items.id', request('item_id'))->where('items.state', 1)->get(['items.*']);
                    break;


                default:
                    $response = null;
                    break;
            }
        } else {
            $response = DB::table('items')->where('items.type', 'R')->where('items.state', 1)->get(['items.*']);
        }

        if ($response) {

            foreach ($response as $r) {

                $p = DB::table('equip_has_parts')->where('equip_has_parts.item_id', $r->id)->get();
                foreach ($p as $p1) {
                    if ($p1->attr_id == '11') {
                        $r->v11 = $p1->val;
                    } else if ($p1->attr_id == '12') {
                        $r->v12 = $p1->val;
                    }
                }
            }
            return response(json_encode($response), 200)->header('Content-type', 'text/plain');
        }
    }
    public function f11(Request $request)
    {
        $data = EquipCompo::where('equip_id', request('idEquip'))->where('compo_id', request('idOld'))->where('state', 1)->first();
        $data->compo_id = request('idNew');
        $data->save();

        $data2 = Component::find(request('idOld'));
        $data2->state = 1;
        $data2->save();

        $data3 = Component::find(request('idNew'));
        $data3->state = 2;
        $data3->save();


        return response(json_encode($request->all()), 200)->header('Content-type', 'text/plain');
    }
    public function f111(Request $request)
    {
        $data = EquipPart::where('equip_id', request('idEquip'))->where('id', request('idOld'))->where('state', 1)->first();
        $data->state = 2;
        $data->save();

        $data2 = new EquipPart();
        $data2->state = 1;
        $data2->val = date('y-m-d');
        $data2->item_id = $data->item_id;
        $data2->equip_id = $data->equip_id;
        $data2->attr_id = $data->attr_id;
        $data2->save();

        return response(json_encode($request->all()), 200)->header('Content-type', 'text/plain');
    }
    public function f12(Request $request)
    {
        $response = DB::table('components')->join('control_fills', 'control_fills.component_id', '=', 'components.id')->join('items', 'items.id', '=', 'components.item_id')->whereIn('items.id', [1, 8, 9, 20, 10, 11, 12])->where('components.state', 1)->where('control_fills.value', 'like', request('data') . "%")->get(['items.name', 'components.id as compo_id', 'components.state']);
        foreach ($response as $r) {
            $p = DB::table('control_fills')->join('components', 'components.id', '=', 'control_fills.component_id')->where('components.id', $r->compo_id)->whereIn('control_fills.valist_id', [9, 10])->get();
            foreach ($p as $p1) {
                if ($p1->valist_id == '9') {
                    $r->v9 = $p1->value;
                } else if ($p1->valist_id == '10') {
                    $r->v10 = $p1->value;
                }
            }
        }
        return response(json_encode($response), 200)->header('Content-type', 'text/plain');
    }
    public function f13(Request $request)
    {
        $response = DB::table('equip_has_compos')->join('components', 'components.id', '=', 'equip_has_compos.compo_id')->join('items', 'items.id', '=', 'components.item_id')->where('equip_has_compos.state','=','1')->where('equip_has_compos.equip_id', request('idEquip'))->whereIn('items.id', [1, 8, 9])->get(['items.name', 'components.id as compo_id', 'items.id as itId']);
        foreach ($response as $r) {
            $p = DB::table('control_fills')->join('components', 'components.id', '=', 'control_fills.component_id')->where('components.id', $r->compo_id)->whereIn('control_fills.valist_id', [14, 9])->get('control_fills.*');
            foreach ($p as $p1) {
                if ($p1->valist_id == 9) {
                    $r->v9 = $p1->value;
                } else {
                    $r->v14 = $p1->value;
                }
                $r->ControlFillId = $p1->id;
            }
        }
        return response(json_encode($response), 200)->header('Content-type', 'text/plain');
    }
    public function f14(Request $request)
    {
        $control = ControlFields::find(request('idControlFill'));
        $control->value = request('data');
        $control->save();
        return response(json_encode($control), 200)->header('Content-type', 'text/plain');
    }
    public function f15(Request $request)
    {
        $response = DB::table('equip_has_compos')->join('components', 'components.id', '=', 'equip_has_compos.compo_id')->join('items', 'items.id', '=', 'components.item_id')->where('equip_has_compos.equip_id', request('idEquip'))->whereIn('items.id', [10, 11, 12, 20])->get(['items.name', 'components.id as compo_id', 'items.id as itId']);
        foreach ($response as $r) {
            $p = DB::table('control_fills')->join('components', 'components.id', '=', 'control_fills.component_id')->where('components.id', $r->compo_id)->whereIn('control_fills.valist_id', [17, 9])->get('control_fills.*');
            foreach ($p as $p1) {
                if ($p1->valist_id == 9) {
                    $r->v9 = $p1->value;
                } else {
                    $r->v14 = $p1->value;
                }
                $r->ControlFillId = $p1->id;
            }
        }
        return response(json_encode($response), 200)->header('Content-type', 'text/plain');
    }
    public function f16(Request $request)
    {
        $response = DB::table('equip_has_compos')->join('components', 'components.id', '=', 'equip_has_compos.compo_id')->join('items', 'items.id', '=', 'components.item_id')->where('equip_has_compos.equip_id', request('idEquip'))->where('equip_has_compos.state','=','1')->whereIn('items.id', [2, 21, 22])->get(['items.name', 'components.id as compo_id', 'items.id as itId']);
        foreach ($response as $r) {
            $p = DB::table('control_fills')->join('components', 'components.id', '=', 'control_fills.component_id')->where('components.id', $r->compo_id)->whereIn('control_fills.valist_id', [9])->get('control_fills.*');
            foreach ($p as $p1) {
                $r->ControlFillId = $p1->id;
                $r->v14 = $p1->value;
            }
        }
        return response(json_encode($response), 200)->header('Content-type', 'text/plain');
    }
    public function f17(Request $request)
    {
        $response = DB::table('equip_has_compos')->join('components', 'components.id', '=', 'equip_has_compos.compo_id')->join('items', 'items.id', '=', 'components.item_id')->where('equip_has_compos.equip_id', request('idEquip'))->where('equip_has_compos.state','=','1')->whereIn('items.id', [2, 21, 22])->get(['items.name', 'components.id as compo_id', 'items.id as itId']);
        foreach ($response as $r) {
            $p = DB::table('control_fills')->join('components', 'components.id', '=', 'control_fills.component_id')->where('components.id', $r->compo_id)->whereIn('control_fills.valist_id', [10, 9])->get('control_fills.*');
            foreach ($p as $p1) {
                if ($p1->valist_id == 9) {
                    $r->v9 = $p1->value;
                } else {
                    $r->v14 = $p1->value;
                }
            }
        }
        return response(json_encode($response), 200)->header('Content-type', 'text/plain');
    }
    public function f18(Request $request)
    {
        $control = ControlFields::find(request('id'));
        $control->value = request('val');
        $control->save();
        return response(json_encode($control), 200)->header('Content-type', 'text/plain');
    }
    public function f19(Request $request)
    {;
        $response = DB::table('equip_has_compos')->join('components', 'components.id', '=', 'equip_has_compos.compo_id')->join('items', 'items.id', '=', 'components.item_id')->where('equip_has_compos.equip_id', request('idEquip'))->where('equip_has_compos.state','=','1')->where('items.id', 2)->get(['items.name', 'components.id as compo_id', 'items.id as itId']);
        foreach ($response as $r) {
            $p = DB::table('control_fills')->join('components', 'components.id', '=', 'control_fills.component_id')->where('components.id', $r->compo_id)->whereIn('control_fills.valist_id', [15, 16, 9])->get('control_fills.*');
            foreach ($p as $p1) {
                $r->ControlFillId = $p1->id;
                if ($p1->valist_id == 15) {
                    $r->V15 = $p1->value;
                } else if ($p1->valist_id == 16) {
                    $r->V16 = $p1->value;
                } else {
                    $r->V9 = $p1->value;
                }
            }
        }
        return response(json_encode($response), 200)->header('Content-type', 'text/plain');
    }
    public function f20(Request $request)
    {;
        $response = DB::table('equip_has_compos')->join('components', 'components.id', '=', 'equip_has_compos.compo_id')->join('items', 'items.id', '=', 'components.item_id')->where('equip_has_compos.equip_id', request('idEquip'))->where('equip_has_compos.state','=','1')->whereIn('items.id', [21, 22])->get(['items.name', 'components.id as compo_id', 'items.id as itId']);
        foreach ($response as $r) {
            $p = DB::table('control_fills')->join('components', 'components.id', '=', 'control_fills.component_id')->where('components.id', $r->compo_id)->whereIn('control_fills.valist_id', [18, 9])->get('control_fills.*');
            foreach ($p as $p1) {
                if ($p1->valist_id == 9) {
                    $r->V9 = $p1->value;
                } else {
                    $r->V15 = $p1->value;
                }
            }
        }
        return response(json_encode($response), 200)->header('Content-type', 'text/plain');
    }
    public function f21(Request $request)
    {;
        $response = DB::table('equip_has_compos')->join('components', 'components.id', '=', 'equip_has_compos.compo_id')->join('items', 'items.id', '=', 'components.item_id')->where('equip_has_compos.equip_id', request('idEquip'))->whereIn('items.id', [21, 22])->get(['items.name', 'components.id as compo_id', 'items.id as itId']);
        foreach ($response as $r) {
            $p = DB::table('control_fills')->join('components', 'components.id', '=', 'control_fills.component_id')->where('components.id', $r->compo_id)->whereIn('control_fills.valist_id', [18])->get('control_fills.*');
            foreach ($p as $p1) {
                $r->ControlFillId = $p1->id;
                $r->V15 = $p1->value;
            }
        }
        return response(json_encode($response), 200)->header('Content-type', 'text/plain');
    }
    public function f22(Request $request)
    {
        $response = DB::table('equip_has_compos')->join('components', 'components.id', '=', 'equip_has_compos.compo_id')->join('items', 'items.id', '=', 'components.item_id')->where('equip_has_compos.equip_id', request('idEquip'))->whereIn('items.id', [2, 21, 22])->get(['items.name', 'components.id as compo_id', 'items.id as itId']);
        foreach ($response as $r) {
            $p = DB::table('control_fills')->join('components', 'components.id', '=', 'control_fills.component_id')->where('components.id', $r->compo_id)->whereIn('control_fills.valist_id', [9])->get('control_fills.*');
            foreach ($p as $p1) {
                $r->ControlFillId = $p1->id;
                $r->v14 = $p1->value;
            }
        }
        return response(json_encode($response), 200)->header('Content-type', 'text/plain');
    }
    public function f23(Request $request)
    {
        $response = DB::table('equip_has_compos')->join('components', 'components.id', '=', 'equip_has_compos.compo_id')->join('items', 'items.id', '=', 'components.item_id')->where('equip_has_compos.equip_id', request('idEquip'))->whereIn('items.id', [2])->get(['items.name', 'components.id as compo_id', 'items.id as itId']);
        foreach ($response as $r) {
            $p = DB::table('control_fills')->join('components', 'components.id', '=', 'control_fills.component_id')->where('components.id', $r->compo_id)->whereIn('control_fills.valist_id', [10])->get('control_fills.*');
            foreach ($p as $p1) {
                $r->ControlFillId = $p1->id;
                $r->v14 = $p1->value;
            }
        }
        return response(json_encode($response), 200)->header('Content-type', 'text/plain');
    }
    public function f24(Request $request)
    {;
        $response = DB::table('equip_has_compos')->join('components', 'components.id', '=', 'equip_has_compos.compo_id')->join('items', 'items.id', '=', 'components.item_id')->where('equip_has_compos.equip_id', request('idEquip'))->where('items.id', 2)->get(['items.name', 'components.id as compo_id', 'items.id as itId']);
        foreach ($response as $r) {
            $p = DB::table('control_fills')->join('components', 'components.id', '=', 'control_fills.component_id')->where('components.id', $r->compo_id)->whereIn('control_fills.valist_id', [15, 16, 9])->get('control_fills.*');
            foreach ($p as $p1) {
                $r->ControlFillId = $p1->id;
                if ($p1->valist_id == 15) {
                    $r->V15 = $p1->value;
                }
                if ($p1->valist_id == 16) {
                    $r->V16 = $p1->value;
                } else {
                    $r->V9 = $p1->value;
                }
            }
        }
        return response(json_encode($response), 200)->header('Content-type', 'text/plain');
    }
    public function f25(Request $request)
    {
        $response = DB::table('equip_has_compos')->join('components', 'components.id', '=', 'equip_has_compos.compo_id')->join('items', 'items.id', '=', 'components.item_id')->where('equip_has_compos.equip_id', request('idEquip'))->whereIn('items.id', [7])->get(['items.name', 'components.id as compo_id', 'items.id as itId']);
        foreach ($response as $r) {
            $p = DB::table('control_fills')->join('components', 'components.id', '=', 'control_fills.component_id')->where('components.id', $r->compo_id)->whereIn('control_fills.valist_id', [9])->get('control_fills.*');
            foreach ($p as $p1) {
                $r->ControlFillId = $p1->id;
                $r->v14 = $p1->value;
            }
        }
        return response(json_encode($response), 200)->header('Content-type', 'text/plain');
    }
    public function f26(Request $request)
    {;
        $response = DB::table('equip_has_compos')->join('components', 'components.id', '=', 'equip_has_compos.compo_id')->join('items', 'items.id', '=', 'components.item_id')->where('equip_has_compos.equip_id', request('idEquip'))->where('items.id', 7)->get(['items.name', 'components.id as compo_id', 'items.id as itId']);
        foreach ($response as $r) {
            $p = DB::table('control_fills')->join('components', 'components.id', '=', 'control_fills.component_id')->where('components.id', $r->compo_id)->whereIn('control_fills.valist_id', [15, 16, 9])->get('control_fills.*');
            foreach ($p as $p1) {
                $r->ControlFillId = $p1->id;
                if ($p1->valist_id == 15) {
                    $r->V15 = $p1->value;
                } else if ($p1->valist_id == 16) {
                    $r->V16 = $p1->value;
                } else {
                    $r->V9 = $p1->value;
                }
            }
        }
        return response(json_encode($response), 200)->header('Content-type', 'text/plain');
    }
    public function f27(Request $request)
    {
        $response = DB::table('equip_has_compos')->join('components', 'components.id', '=', 'equip_has_compos.compo_id')->join('items', 'items.id', '=', 'components.item_id')->where('equip_has_compos.equip_id', request('idEquip'))->whereIn('items.id', [7])->where('equip_has_compos.state','=',1)->get(['items.name', 'components.id as compo_id', 'items.id as itId']);
        foreach ($response as $r) {
            $p = DB::table('control_fills')->join('components', 'components.id', '=', 'control_fills.component_id')->where('components.id', $r->compo_id)->whereIn('control_fills.valist_id', [9])->get('control_fills.*');
            foreach ($p as $p1) {
                $r->ControlFillId = $p1->id;
                $r->v14 = $p1->value;
            }
        }
        return response(json_encode($response), 200)->header('Content-type', 'text/plain');
    }
    public function f28(Request $request)
    {
        $response = DB::table('equip_has_compos')->join('components', 'components.id', '=', 'equip_has_compos.compo_id')->join('items', 'items.id', '=', 'components.item_id')->where('equip_has_compos.state','=','1')->where('equip_has_compos.equip_id', request('idEquip'))->whereIn('items.id', [7])->first(['items.name', 'components.id as compo_id', 'items.id as itId']);
        
        $p = DB::table('control_fills')->join('components', 'components.id', '=', 'control_fills.component_id')->where('components.id', $response->compo_id)->whereIn('control_fills.valist_id', [9])->get('control_fills.*');
        foreach ($p as $p1) {
            $response->ControlFillId = $p1->id;
            $response->v14 = $p1->value;
        }
        
        return response(json_encode($response), 200)->header('Content-type', 'text/plain');
    }
    public function f29(Request $request)
    {
        $response = DB::table('equip_has_compos')->where('equip_has_compos.equip_id', request('idEquip'))->join('components', 'components.id', '=', 'equip_has_compos.compo_id')->join('control_fills', 'control_fills.component_id', '=', 'components.id')->join('items', 'components.item_id', '=', 'items.id')->where('components.item_id', 19)->where('equip_has_compos.state','=','1')->where('control_fills.valist_id', 9)->get(['control_fills.value as cvalue', 'components.id as compo_id', 'components.item_id as item_id','items.name as iname']);
        return response(json_encode($response), 200)->header('Content-type', 'text/plain');
    }
    public function f30(Request $request)
    {
        $response = DB::table('equip_has_compos')->join('components', 'components.id', '=', 'equip_has_compos.compo_id')->join('items', 'items.id', '=', 'components.item_id')->where('equip_has_compos.state','=','1')->where('equip_has_compos.equip_id', request('idEquip'))->whereIn('items.id', [19])->get(['items.name', 'components.id as compo_id', 'items.id as itId']);
        foreach ($response as $r) {
            $p = DB::table('control_fills')->join('components', 'components.id', '=', 'control_fills.component_id')->where('components.id', $r->compo_id)->whereIn('control_fills.valist_id', [13, 9])->get('control_fills.*');
            foreach ($p as $p1) {
                if ($p1->valist_id == 9) {
                    $r->v9 = $p1->value;
                } else {
                    $r->v14 = $p1->value;
                }
            }
        }
        return response(json_encode($response), 200)->header('Content-type', 'text/plain');
    }
    public function search(Request $request)
    {

        if ($request['value'] == null) {
            $equips = DB::table('equipments')
                ->join("valists as v1", "equipments.flota_id", "=", "v1.id")
                ->join("valists as v2", "equipments.marca_id", "=", "v2.id")
                ->join("valists as v3", "equipments.modelo_id", "=", "v3.id")
                ->join("clients as c", "equipments.client_id", "=", "c.id")
                ->join("projects as p", "equipments.project_id", "=", "p.id")
                ->select(["equipments.*", "v1.label as flota", "v2.label as marca", "v3.label as modelo", "c.name as cname", "p.name as pname"])
                ->get();
        } else {
            $equips = DB::table('equipments')
                ->join("valists as v1", "equipments.flota_id", "=", "v1.id")
                ->join("valists as v2", "equipments.marca_id", "=", "v2.id")
                ->join("valists as v3", "equipments.modelo_id", "=", "v3.id")
                ->join("clients as c", "equipments.client_id", "=", "c.id")
                ->join("projects as p", "equipments.project_id", "=", "p.id")
                ->where('internalN', 'like', $request['value'] . '%')
                ->select(["equipments.*", "v1.label as flota", "v2.label as marca", "v3.label as modelo", "c.name as cname", "p.name as pname"])
                ->get();
        }

        return response(json_encode($equips), 200)->header('Content-type', 'text/plain');
    }
    public function getEquip(Request $request)
    {

        if (request('value') == null) {
            $equips = "";
        } else {
            $activ = Activity::find(request('value'));

            $equips = DB::table('equipments')
                ->join("valists as v1", "equipments.flota_id", "=", "v1.id")
                ->join("valists as v2", "equipments.marca_id", "=", "v2.id")
                ->join("valists as v3", "equipments.modelo_id", "=", "v3.id")
                ->join("clients as c", "equipments.client_id", "=", "c.id")
                ->join("projects as p", "equipments.project_id", "=", "p.id")
                ->where('equipments.id', $activ->equip_id)
                ->select(["equipments.*", "v1.label as flota", "v2.label as marca", "v3.label as modelo", "c.name as cname", "p.name as pname"])
                ->first();
            $answerActiv = answers_activities::where("activ_id", $activ->id)->get();
            $listActiv = ActivList::where("type_id", $activ->type_id)->get();
        }
        $arr = [
            "equips" => $equips,
            "answerActiv" => $answerActiv,
            "listActiv" => $listActiv,
            "type_id" => $activ->type_id
        ];

        return response(json_encode($arr), 200)->header('Content-type', 'text/plain');
    }
    public function show()
    {
    }
    public function destroy($id)
    {
        $answers = answers_activities::where('activ_id', $id);
        $answers->delete();
        $activ = Activity::find($id);
        $activ->delete();
        return back();
    }
}
