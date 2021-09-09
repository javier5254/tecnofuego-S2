<?php

namespace App\Http\Controllers\Project;

use App\Models\Client;
use App\Models\Valist;
use App\Models\Project;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.   
     *
     * @return \Illuminate\Http\Response
     */
    const PERMISSIONS = [
        'create' => 'project-create',
        'show' => 'project-show',
        'edit' => 'project-edit',
    ];

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:'.self::PERMISSIONS['create'])->only(['create', 'store']);
        $this->middleware('permission:'.self::PERMISSIONS['show'])->only(['index', 'show']);
        $this->middleware('permission:'.self::PERMISSIONS['edit'])->only(['edit', 'update']);
    }
    public function index()
    {
        $projects = Project::paginate('5');
        return view('modules.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        return view('modules.project.create', compact('clients'));
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

            'name' => 'required|unique:users',
            'client_id' => 'required',
        ], [
            'name.required' => 'campo nombre del proyecto se encuentra vacío',
            'name.unique' => 'proyecto ya fue registrado, intenta con otro nombre',
            'client_id.required' => 'campo cliente se encuentra vacío',

        ]);

        $project = new Project();
        $project->name = request('name');
        $project->description = request('description');
        $project->state = request('state') ? '1' : '0';
        $project->client_id = request('client_id') ? request('client_id') : Null;

        $project->save();
        $data = request('data');
        if($data != ''){
            foreach ($data as $d) {
                $l = new Location;
                $l->name = $d;
                $l->project_id = $project->id;
                $l->save();
            }
        }
        return redirect()->route('project.index');
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
        $clients = Client::all();
        $project = Project::find($id);
        $locacion = Location::where('project_id',$id)->get();
        return view('modules.project.edit', compact(['project', 'clients','locacion']));
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
            'name' => 'required|unique:projects,name,' . $id,
            'client_id' => 'required',
        ], [
            'name.required' => 'Campo nombre se encuentra vacío',
            'name.unique' => 'El proyecto ya fue registrado, intenta con otro nombre',
            'client_id.required' => 'Campo cliente se encuentra vacío',
            
            ]);
        $project = Project::find($id);
        $project->name = request('name');
        $project->client_id = request('client_id');
        $project->description = request('description') ? request('description') : Null;
        $project->state = request('state') ? '1' : '0';
        $project->save();

        $data = request('data');
        if($data != ''){
            foreach ($data as $d) {
                $listClear = Location::where('name', $d)->where('project_id',$project->id)->get();
            
                if (count($listClear) == 0) {
                    $l = new Location;
                    $l->name = $d;
                    $l->project_id = $project->id;
                    $l->save();
                }
            }
        }

        return redirect()->route('project.index');
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
            $project = DB::table('projects')
                ->where('projects.name',$request['value'])
                ->select(["projects.*"])
                ->first();
        } else {
            $project = null;
        }
        return response(json_encode($project), 200)->header('Content-type', 'text/plain');
    }
    public function deletelocations(Request $request)
    {
        $data = $request->data;
        $array = [
            'id' => $data['id'],
            'project_id' => $data['project_id']
        ];
        $resp = Location::where("id", $array['id'])->where("project_id", $array['project_id']);
        $resp->delete();
        return response(json_encode($resp), 200)->header('Content-type', 'text/plain');
    }
    public function search(Request $request)
    {

        if ($request['value'] == null) {
            $project = Project::all();
        } else {
            $project = Project::where('name', 'like', $request['value'] . '%')->get();
        }

        return response(json_encode($project), 200)->header('Content-type', 'text/plain');
    }
}
