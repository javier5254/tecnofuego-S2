<?php

namespace App\Http\Controllers\Component;

use App\Models\Item;
use App\Models\Client;
use App\Models\Valist;
use App\Models\Project;
use App\Models\Component;
use Illuminate\Http\Request;
use App\Models\ControlFields;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    const PERMISSIONS = [
        'create' => 'component-create',
        'show' => 'component-show',
        'edit' => 'component-edit',
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
        $components = DB::table("components")
            ->join('items', 'components.item_id', '=', 'items.id')
            ->join('clients', 'components.client_id', '=', 'clients.id')
            ->join('projects', 'components.project_id', '=', 'projects.id')
            ->join('control_fills', 'control_fills.component_id', '=', 'components.id')
            ->where('control_fills.valist_id', "=", "9")
            ->where('control_fills.value', "<>", "")
            ->select("components.*", "items.name", "clients.name as cname", "projects.name as pname", "control_fills.value")->orderBy('id', 'DESC')->paginate(5);
        $equipcompo = DB::table('equip_has_compos')->join("equipments", "equipments.id", "=", "equip_has_compos.equip_id")->get(["equipments.internalN as in", "equip_has_compos.compo_id as compo_id"]);
        return view('modules.component.index', compact('components', 'equipcompo'));
    }

    function fetch_data(Request $request)
    {
        if ($request->ajax()) {
            $components = DB::table("components")
                ->join('items', 'components.item_id', '=', 'items.id')
                ->join('clients', 'components.client_id', '=', 'clients.id')
                ->join('projects', 'components.project_id', '=', 'projects.id')
                ->join('control_fills', 'control_fills.component_id', '=', 'components.id')
                ->where('control_fills.valist_id', "=", "9")
                ->where('control_fills.value', "<>", "")
                ->select("components.*", "items.name", "clients.name as cname", "projects.name as pname", "control_fills.value")->paginate(5);
                $equipcompo = DB::table('equip_has_compos')->join("equipments", "equipments.id", "=", "equip_has_compos.equip_id")->get(["equipments.internalN as in", "equip_has_compos.compo_id as compo_id"]);
            return view('modules.component.tableajax', compact('components','equipcompo'))->render();
        }
    }
    function fetch_dataSearch(Request $request)
    {
        if ($request->ajax()) {
            if ($request['value'] == null) {
                $components = DB::table("components")
                    ->join('items', 'components.item_id', '=', 'items.id')
                    ->join('clients', 'components.client_id', '=', 'clients.id')
                    ->join('projects', 'components.project_id', '=', 'projects.id')
                    ->join('control_fills', 'control_fills.component_id', '=', 'components.id')
                    ->join('equip_has_compos','equip_has_compos.compo_id','=','components.id','left outer')
                    ->join("equipments", "equipments.id", "=", "equip_has_compos.equip_id",'left outer')
                    ->where('control_fills.valist_id', "=", "9")
                    ->where('control_fills.value', "<>", "")
                    ->select("components.*", "items.name", "clients.name as cname", "projects.name as pname", "control_fills.value","equipments.internalN")->paginate(5);
            } else {
                $components = DB::table("components")
                    ->join('items', 'components.item_id', '=', 'items.id')
                    ->join('clients', 'components.client_id', '=', 'clients.id')
                    ->join('projects', 'components.project_id', '=', 'projects.id')
                    ->join('control_fills', 'control_fills.component_id', '=', 'components.id')
                    ->join('equip_has_compos','equip_has_compos.compo_id','=','components.id','left outer')
                    ->join("equipments", "equipments.id", "=", "equip_has_compos.equip_id",'left outer')
                    ->where('control_fills.valist_id', "=", "9")
                    ->where('control_fills.value', 'like', $request['value'] . '%')
                    ->select("components.*", "items.name", "clients.name as cname", "projects.name as pname", "control_fills.value","equipments.internalN","equip_has_compos.state as equipocompostate")->paginate(5);
            }
                $equipcompo = DB::table('equip_has_compos')->join("equipments", "equipments.id", "=", "equip_has_compos.equip_id")->get(["equipments.internalN as in", "equip_has_compos.compo_id as compo_id"]);
            return view('modules.component.tableajax', compact('components','equipcompo'))->render();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $families = Valist::where('list_id', '4')->get();
        $items = Item::where('type', 'p')
            ->where('state', '1')->get(['items.*']);
        return view('modules.component.selectComponent', compact('families', 'items'));
    }
    public function formdinamic(Request $request)
    {
        $id = $request->id;
        $control = ControlFields::where('item_id', $id)->where('component_id',null)->get();
        $controlfills = Valist::where('list_id', '3')->get();
        $clients = Client::all();
        $projects = Project::all();
        return view('modules.component.create', compact('control', 'controlfills', 'clients', 'projects', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'client_id' => 'required',
            'project_id' => 'required',
        ], [
            'project_id.required' => 'campo proyecto se encuentra vacío',
            'client_id.required' => 'campo cliente se encuentra vacío',
        ]);
        $id = $request->id;
        $state = $request->state ? '1' : '0';
        $client_id = $request->client_id ? $request->client_id : ' ';
        $project_id = $request->project_id ? $request->project_id : ' ';
        $cf = $request->cf;
        $component = new Component;
        $component->client_id = $client_id;
        $component->project_id = $project_id;
        $component->item_id = $id;
        $component->state = $state;
        $component->save();
        foreach ($cf as $c => $value) {
            $controlf = new ControlFields;
            $controlf->value = $value;
            $controlf->item_id = $id;
            $controlf->valist_id = $c;
            $controlf->component_id = $component->id;
            $controlf->save();
        }
        // $item = Item::find($id);
        // $item->state = '2';
        // $item->save();
        return redirect()->route('component.index');
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
        $component = Component::find($id);
        $controlPart = ControlFields::where('component_id', $id)->get();
        $controlfills = Valist::where('list_id', '3')->get();
        $clients = Client::all();
        $projects = Project::all();
        $equipcompo = DB::table('equip_has_compos')->join("equipments", "equipments.id", "=", "equip_has_compos.equip_id")->where('equip_has_compos.compo_id','=',$id)->first(["equipments.internalN as in", "equip_has_compos.compo_id as compo_id"]);
        return view('modules.component.edit', compact('controlfills', 'controlPart', 'clients', 'projects', 'id', 'component','equipcompo'));
    }
    public function validSerial(Request $request)
    {
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
        return response(json_encode($resp), 200)->header('Content-type', 'text/plain');
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
        
        request()->validate([
            'client_id' => 'required',
            'project_id' => 'required',
        ], [
            'project_id.required' => 'Campo projecto se encuentra vacio',
            'client_id.required' => 'Campo cliente se encuentra vacio',
            ]);
        $state = $request->state ? '1' : '0';
        $client_id = $request->client_id ? $request->client_id : ' ';
        $project_id = $request->project_id ? $request->project_id : ' ';
        $cf = $request->cf;
        $component = Component::find($id);
        $component->client_id = $client_id;
        $component->project_id = $project_id;
        $component->state = $state;
        $component->save();
        foreach ($cf as $c => $value) {
            $controlf = ControlFields::find($c);
            if ($controlf != '') {
                $controlf->value = $value;
                $controlf->save();
            } 
        }
        return redirect()->route('component.index');
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
    public function search(Request $request)
    {
        dd($request->all());
        if ($request['value'] == null) {
            $components = DB::table("components")
                ->join('items', 'components.item_id', '=', 'items.id')
                ->join('clients', 'components.client_id', '=', 'clients.id')
                ->join('projects', 'components.project_id', '=', 'projects.id')
                ->join('control_fills', 'control_fills.component_id', '=', 'components.id')
                ->join('equip_has_compos','equip_has_compos.compo_id','=','components.id','left outer')
                ->join("equipments", "equipments.id", "=", "equip_has_compos.equip_id",'left outer')
                ->where('control_fills.valist_id', "=", "9")
                ->where('control_fills.value', "<>", "")
                ->select("components.*", "items.name", "clients.name as cname", "projects.name as pname", "control_fills.value","equipments.internalN")->paginate(5);
        } else {
            $components = DB::table("components")
                ->join('items', 'components.item_id', '=', 'items.id')
                ->join('clients', 'components.client_id', '=', 'clients.id')
                ->join('projects', 'components.project_id', '=', 'projects.id')
                ->join('control_fills', 'control_fills.component_id', '=', 'components.id')
                ->join('equip_has_compos','equip_has_compos.compo_id','=','components.id','left outer')
                ->join("equipments", "equipments.id", "=", "equip_has_compos.equip_id",'left outer')
                ->where('control_fills.valist_id', "=", "9")
                ->where('control_fills.value', 'like', $request['value'] . '%')
                ->select("components.*", "items.name", "clients.name as cname", "projects.name as pname", "control_fills.value","equipments.internalN","equip_has_compos.state as equipocompostate")->paginate(5);
        }
    
        $equipcompo = DB::table('equip_has_compos')->join("equipments", "equipments.id", "=", "equip_has_compos.equip_id")->get(["equipments.internalN as in", "equip_has_compos.compo_id as compo_id"]);
    
        return view('modules.component.index', compact('components', 'equipcompo'));

    }
}
