<?php

namespace App\Http\Controllers\Equipment;

use App\Models\Item;
use App\Models\Client;
use App\Models\Valist;
use App\Models\Project;
use App\Models\Component;
use App\Models\Equipment;
use App\Models\EquipPart;
use App\Models\EquipCompo;
use Illuminate\Http\Request;
use App\Models\ControlFields;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    const PERMISSIONS = [
        'create' => 'equipment-create',
        'show' => 'equipment-show',
        'edit' => 'equipment-edit',
    ];
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:' . self::PERMISSIONS['create'])->only(['create', 'store']);
        $this->middleware('permission:' . self::PERMISSIONS['show'])->only(['index', 'show']);
        $this->middleware('permission:' . self::PERMISSIONS['edit'])->only(['edit', 'update']);
    }
    public function index()
    {
        $equips = DB::table('equipments')
            ->join("valists as v1", "equipments.flota_id", "=", "v1.id")
            ->join("valists as v2", "equipments.marca_id", "=", "v2.id")
            ->join("valists as v3", "equipments.modelo_id", "=", "v3.id")
            ->join("clients as c", "equipments.client_id", "=", "c.id")
            ->join("projects as p", "equipments.project_id", "=", "p.id")
            ->select(["equipments.*", "v1.label as flota", "v2.label as marca", "v3.label as modelo", "c.name as cname", "p.name as pname"])
            ->paginate(5);
        return view('modules.equipment.index', compact('equips'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all(['name', 'id']);
        $projects = Project::all(['name', 'id']);
        $flotas = Valist::where('list_id', '6')->where('state','1')->get(['label', 'id']);
        $marcas = Valist::where('list_id', '7')->where('state','1')->get(['label', 'id']);
        $sistemas = Valist::where('list_id', '8')->where('state','1')->get(['label', 'id']);
        $formatos = Valist::where('list_id', '13')->where('state','1')->get(['label', 'id']);
        $periodicidad = Valist::where('list_id', '9')->where('state','1')->get();
        $servs = Item::where('type', 'r')->where('state', '1')->get();
        $components = DB::table('components')
            ->join('items', 'components.item_id', '=', 'items.id')
            ->join('control_fills', 'components.id', '=', 'control_fills.component_id')
            ->where('control_fills.valist_id', "=", '9')
            ->where('control_fills.value', "<>", null)
            ->where('components.state', "=", '1')
            ->select('components.*', 'items.name', 'control_fills.value')
            ->get();
        return view('modules.equipment.create', compact('formatos','servs', 'components', 'clients', 'projects', 'flotas', 'marcas', 'sistemas', 'periodicidad'));
    }
    public function showModelos(Request $request)
    {
        if ($request->value == "") {
            $models = "";
        } else {
            $models = Valist::where('list_id', '11')->where('father_id', $request->value)->where('state','1')->get();
        }
        return response(json_encode($models), 200)->header('Content-type', 'text/plain');
    }
    public function getFormat(Request $request)
    {
        if ($request->value == "") {
            $equipment = "";
        } else {
            $equipment = Equipment::where('internalN', request('value'))->where('state','1')->first();
        }
        return response(json_encode($equipment), 200)->header('Content-type', 'text/plain');
    }
    public function showAttributes(Request $request)
    {
        if ($request->value == "") {
            $cf = "";
        } else {
            $cf = DB::table('control_fills')->where('item_id', $request->value)->join('valists', 'valists.id', '=', 'control_fills.valist_id')->where('state','1')->get();
        }
        return response(json_encode($cf), 200)->header('Content-type', 'text/plain');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hoy = Carbon::today();
        request()->validate([
            'client_id' => 'required',
            'project_id' => 'required',
            'flota_id' => 'required',
            'marca_id' => 'required',
            'modelo_id' => 'required',
            'sistema_id' => 'required',
            'periodicidad_id' => 'required',
            'internalN' => 'required',
            'horometer' => 'required',
        ], [
            'project_id.required' => 'Campo projecto se encuentra vacío',
            'client_id.required' => 'Campo cliente se encuentra vacío',
            'flota_id.required' => 'Campo flota se encuentra vacío',
            'internalN.required' => 'Campo numero interno se encuentra vacío',
            'marca_id.required' => 'Campo marca se encuentra vacío',
            'modelo_id.required' => 'Campo modelo se encuentra vacío',
            'sistema_id.required' => 'Campo sistema se encuentra vacío',
            'periodicidad_id.required' => 'Campo periodicidad se encuentra vacío',
            'horometer.required' => 'Campo horometer se encuentra vacío',
        ]);

        switch ($request->sistema_id) {
            case 70:
                $extinction = "";
                $detection = "S";
                break;
            case 71:
                $extinction = "S";
                $detection = "";
                break;
            case 72:
                $extinction = "S";
                $detection = "S";
                break;
            default:
                $extinction = "";
                $detection = "";
                break;
        }
        $equipment = new Equipment;
        $equipment->project_id = $request->project_id ? $request->project_id : null;
        $equipment->client_id = $request->client_id ? $request->client_id : null;
        $equipment->detection = $detection;
        $equipment->extinction = $extinction;
        $equipment->flota_id = $request->flota_id ? $request->flota_id : null;
        $equipment->marca_id = $request->marca_id ? $request->marca_id : null;
        $equipment->modelo_id = $request->modelo_id ? $request->modelo_id : null;
        $equipment->sistema_id = $request->formato_id ? $request->formato_id : null;
        $equipment->periodicidad_id = $request->periodicidad_id ? $request->periodicidad_id : null;
        $equipment->internalN = $request->internalN ? $request->internalN : null;
        $equipment->horometer = $request->horometer ? $request->horometer : null;
        $equipment->state = $request->state ? '1' : '0';
        $equipment->save();

        $compos = $request->compos;
        if ($compos) {
            foreach ($compos as $c => $value) {
                $comp = new EquipCompo;
                $comp->compo_id = $value;
                $comp->equip_id = $equipment->id;
                $comp->state = '1';
                $comp->save();
                $component = Component::find($value);
                $component->state = '2';
                $component->save();
            }
        }
        $servs = $request->servs;
        if ($servs) {
            $attrscf = $request->attrscf;
            if ($attrscf) {
                foreach ($attrscf as $at => $value) {
                    $data = explode(",", $at);
                    $controlf = new ControlFields;
                    $controlf->value = $value;
                    $controlf->item_id = $data[0];
                    $controlf->valist_id = $data[1];
                    $controlf->component_id = null;
                    // $controlf->save();
                    foreach ($servs as $s => $value) {
                        $serv = new EquipPart;
                        $serv->item_id = $value;
                        $serv->equip_id = $equipment->id;
                        $serv->val = $controlf->value;
                        $serv->state = '1';
                        $serv->attr_id = $data[1];
                        $serv->save();
                    }
                }
            }else{
                foreach ($servs as $s => $value) {
                    $serv = new EquipPart;
                    $serv->item_id = $value;
                    $serv->equip_id = $equipment->id;
                    $serv->val = $hoy;
                    $serv->state = '1';
                    $serv->attr_id = '1';
                    $serv->save();
                }
            }
        }
        return redirect()->route('equipment.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $clients = Client::all(['name', 'id']);
        $projects = Project::all(['name', 'id']);
        $valists = Valist::all(['label', 'id', 'list_id']);
        $equipment = DB::table('equipments as e')
            ->leftjoin('clients as c', 'c.id', '=', 'e.client_id')
            ->leftjoin('projects as p', 'p.id', '=', 'e.project_id')
            ->leftjoin('valists as v1', 'v1.id', '=', 'e.flota_id')
            ->leftjoin('valists as v2', 'v2.id', '=', 'e.marca_id')
            ->leftjoin('valists as v3', 'v3.id', '=', 'e.modelo_id')
            ->leftjoin('valists as v4', 'v4.id', '=', 'e.sistema_id')
            ->leftjoin('valists as v5', 'v5.id', '=', 'e.periodicidad_id')
            ->where('e.id', '=', $id)
            ->first(
                [
                    "e.id as id",
                    "e.internalN",
                    "e.detection",
                    "e.extinction",
                    "e.horometer",
                    "e.state",
                    "c.id as cname",
                    "p.id as pname",
                    "v1.id as flota",
                    "v2.id as marca",
                    "v3.id as modelo",
                    "v4.id as sistema",
                    "v5.id as periodicidad"
                ]
            );
        $componentsEquip = DB::table('equip_has_compos')
            ->join('components', 'components.id', '=', 'equip_has_compos.compo_id')
            ->join('items', 'items.id', '=', 'components.item_id')
            ->join('clients', 'clients.id', '=', 'components.client_id')
            ->join('projects', 'projects.id', '=', 'components.project_id')
            ->join('control_fills', 'control_fills.component_id', '=', 'components.id')
            ->where('control_fills.valist_id', "=", "9")
            ->where('control_fills.value', "<>", "")
            ->where('equip_has_compos.equip_id', $id)
            ->where('equip_has_compos.state', '1')
            ->select(
                'equip_has_compos.*',
                'components.item_id',
                'components.client_id',
                'components.project_id',
                'clients.name as cname',
                'projects.name as pname',
                'items.name as iname',
                'control_fills.value'
            )
            ->get();
        $servs = DB::table('equip_has_parts')
            ->join('items', 'equip_has_parts.item_id', '=', 'items.id')
            ->leftJoin('valists', 'equip_has_parts.attr_id', '=', 'valists.id')
            ->where('equip_has_parts.equip_id', '=', $id)
            ->where('equip_has_parts.state', '=', '1')
            ->get(['items.*', 'equip_has_parts.val', 'valists.label','equip_has_parts.id as id']);
        $newservs = Item::where('type', 'r')->where('state', '1')->get();
        // dd($servs);
        $components = DB::table('components')
            ->join('items', 'components.item_id', '=', 'items.id')
            ->join('control_fills', 'components.id', '=', 'control_fills.component_id')
            ->where('control_fills.valist_id', "=", '9')
            ->where('control_fills.value', "<>", null)
            ->where('components.state', "=", '1')
            ->select('components.*', 'items.name', 'control_fills.value')
            ->get();
            $formatos = Valist::where('list_id', '13')->where('state','1')->get(['label', 'id']);
        return view('modules.equipment.edit', compact('formatos','components','clients', 'projects', 'valists', 'equipment', 'componentsEquip', 'servs','newservs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $hoy = Carbon::today();
        request()->validate([
            'client_id' => 'required',
            'project_id' => 'required',
            'flota_id' => 'required',
            'marca_id' => 'required',
            'modelo_id' => 'required',
            'sistema_id' => 'required',
            'periodicidad_id' => 'required',
            'horometer' => 'required',
        ], [
            'project_id.required' => 'Campo projecto se encuentra vacío',
            'client_id.required' => 'Campo cliente se encuentra vacío',
            'flota_id.required' => 'Campo flota se encuentra vacío',
            'marca_id.required' => 'Campo marca se encuentra vacío',
            'modelo_id.required' => 'Campo modelo se encuentra vacío',
            'sistema_id.required' => 'Campo sistema se encuentra vacío',
            'periodicidad_id.required' => 'Campo periodicidad se encuentra vacío',
            'horometer.required' => 'Campo horometer se encuentra vacío',
        ]);
        switch ($request->sistema_id) {
            case 70:
                $extinction = "";
                $detection = "S";
                break;
            case 71:
                $extinction = "S";
                $detection = "";
                break;
            case 72:
                $extinction = "S";
                $detection = "S";
                break;
            default:
                $extinction = "";
                $detection = "";
                break;
        }
        
        $project_id = $request->project_id;
        $client_id = $request->client_id;
        $modelo_id = $request->modelo_id;
        $sistema_id = $request->formato_id;
        $periodicidad_id = $request->periodicidad_id;
        $internalN = $request->internalN;
        $horometer = $request->horometer;
        $flota_id = $request->flota_id;
        $marca_id = $request->marca_id;
        $state = $request->state ? '1' : '0';

        Equipment::find($id)->update([
            'project_id' => $project_id,
            'client_id' => $client_id,
            'detection' => $detection,
            'extinction' => $extinction,
            'flota_id' => $flota_id,
            'marca_id' => $marca_id,
            'modelo_id' => $modelo_id,
            'sistema_id' => $sistema_id,
            'periodicidad_id' => $periodicidad_id,
            'internalN' => $internalN,
            'state' => $state,
            'horometer' => $horometer
        ]);
        $servs = $request->servs;
        if ($servs) {
            $attrscf = $request->attrscf;
            if ($attrscf) {
                foreach ($attrscf as $at => $value) {
                    $data = explode(",", $at);
                    $controlf = new ControlFields;
                    $controlf->value = $value;
                    $controlf->item_id = $data[0];
                    $controlf->valist_id = $data[1];
                    $controlf->component_id = null;
                    // $controlf->save();
                    foreach ($servs as $s => $value) {
                        $serv = new EquipPart;
                        $serv->item_id = $value;
                        $serv->equip_id = $id;
                        $serv->val = $controlf->value;
                        $serv->state = '1';
                        $serv->attr_id = $data[1];
                        $serv->save();
                    }
                }
            }else{
                foreach ($servs as $s => $value) {
                    $serv = new EquipPart;
                    $serv->item_id = $value;
                    $serv->equip_id = $equipment->id;
                    $serv->val = $hoy;
                    $serv->state = '1';
                    $serv->attr_id = '1';
                    $serv->save();
                }
            }
        }

        return redirect()->route('equipment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function validateN(Request $request)
    {
        if ($request['value'] != null) {
            $equips = DB::table('equipments')
                ->where('equipments.internalN',$request['value'])
                ->where('equipments.project_id',$request['project_id'])
                ->select(["equipments.*"])
                ->first();
        } else {
            $equips = null;
        }

        if ($request['data'] == null) {
            $resp = '1';
        } else {
            $cf = DB::table('control_fills as  cf')->where('cf.value', $request['data'])->join('components as c','c.id','=','cf.component_id')->where('cf.valist_id', 9)->where('c.project_id', request('project'))->get();
            if (count($cf) > 0) {
                $resp = '2';
            } else {
                $resp = '3';
            }
        }


        return response(json_encode($equips), 200)->header('Content-type', 'text/plain');
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
    public function EquipCompo(Request $request){
        $equipCompo = new EquipCompo();
        $equipCompo->compo_id = $request->compo_id;
        $equipCompo->equip_id = $request->equip_id;
        $equipCompo->state = 1;
        $equipCompo->save();
        Component::find($request->compo_id)->update(['state'=>'2']);
        return response(json_encode($equipCompo), 200)->header('Content-type', 'text/plain'); 
    }
    public function deleteCompo(Request $request)
    {
        $tabrel = EquipCompo::find($request->compo_id);
        $compo = Component::find($tabrel->compo_id)->update(['state' => '1']);
        $resp = EquipCompo::where("id", $request->compo_id)->where('equip_id', request('equip_id'))->update(['state' => '2']);
        return response(json_encode($resp), 200)->header('Content-type', 'text/plain');
    }
    public function deleteServ(Request $request)
    {        
        $resp = EquipPart::where("id", $request->part_id)->where('equip_id', request('equip_id'))->update(['state' => '2']);
        return response(json_encode($resp), 200)->header('Content-type', 'text/plain');
    }
}
