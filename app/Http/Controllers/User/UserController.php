<?php

namespace App\Http\Controllers\User;

use App\Models\Rol;
use App\Models\User;
use App\Models\Charge;
use App\Models\Client;
use App\Models\Valist;
use App\Models\Listing;
use App\Models\Project;
use App\Models\typeDoc;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;


class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    const PERMISSIONS = [
        'create' => 'user-create',
        'show' => 'user-show',
        'edit' => 'user-edit',
        'assign-roles' => 'user-role',
        'assign-permissions' => 'user-permission',
    ];

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:'.self::PERMISSIONS['create'])->only(['create', 'store']);
        $this->middleware('permission:'.self::PERMISSIONS['show'])->only(['index', 'show']);
        $this->middleware('permission:'.self::PERMISSIONS['edit'])->only(['edit', 'update']);
        $this->middleware('permission:'.self::PERMISSIONS['assign-roles'])->only(['role']);
        $this->middleware(' permission:'.self::PERMISSIONS['assign-permissions'])->only(['permission']);
    }



    public function index()
    {
        $users = User::paginate('5');
        $permissions = Permission::all();
        return view('modules.user.index', compact('users', 'permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //typeDocs



        $typeDocs = Valist::where('list_id', '1')->get();
        $charges = Valist::where('list_id', '2')->get();
        $clients = Client::all();
        $projects = Project::all();

        return view('modules.user.create', compact('typeDocs', 'clients', 'projects', 'charges'));
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
            'name' => 'required',
            'dni' => 'required',
            'email' => 'required|unique:users',
            'typeD_id' => 'required',
            'charge_id' => 'required',
        ], [
            'name.required' => 'Campo nombre se encuentra vacío',
            'typeD_id.required' => 'Campo tipo de documento se encuentra vacío',
            'dni.required' => 'Campo cedula se encuentra vacío',
            'email.required' => 'Campo correo se encuentra vacío',
            'email.unique' => 'Campo correo ya se encuentra registrado, intente con otro porfavor',
            'charge_id.required' => 'Campo cargo se encuentra vacío',

        ]);
        $foto = '';
        if ($request->file('profile_photo_path')){
            $foto = $request->file('profile_photo_path')->store('ImagesUsers','public');
        }

        $user = new User();
        $user->name = request('name');
        $user->dni = request('dni');
        $user->email = request('email');
        $user->password = bcrypt(request('dni'));
        $user->typeD_id = request('typeD_id') ? request('typeD_id') : Null;
        $user->charge_id = request('charge_id') ? request('charge_id') : Null;
        $user->profile_photo_path =  $foto;
        $user->client_id = request('client_id') ? request('client_id') : Null;
        $user->project_id = request('project_id') ? request('project_id') : Null;


        $user->save();

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $typeD = Valist::where('list_id', '1')->get();
        $charges = Valist::where('list_id', '2')->get();
        $clients = Client::all();
        $projects = Project::all();
        $user = User::find($id);
        $roles = Role::all();
        return view('modules.user.show', compact('typeD', 'charges', 'clients', 'projects', 'user', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $typeD = Valist::where('list_id', '1')->get();
        $charges = Valist::where('list_id', '2')->get();
        $clients = Client::all();
        $projects = Project::all();
        $user = User::find($id);
        $roles = Role::all();
        return view('modules.user.edit', compact('typeD', 'charges', 'clients', 'projects', 'user', 'roles'));
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
            'name' => 'required',
            'dni' => 'required',
            'state' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'typeD_id' => 'required',
            'charge_id' => 'required',
        ], [
            'name.required' => 'Campo nombre se encuentra vacío',
            'typeD_id.required' => 'Campo tipo de documento se encuentra vacío',
            'dni.required' => 'Campo cedula se encuentra vacío',
            'email.required' => 'Campo correo se encuentra vacío',
            'email.unique' => 'Campo correo ya se encuentra registrado, intente con otro porfavor',
            'charge_id.required' => 'Campo cargo se encuentra vacío',

        ]);

        $user = User::find($id)->update($request->all());
        return redirect()->route('user.index');
    }
    public function updatePhoto(Request $request)
    {
        
        $user = User::find(auth()->user()->id);
        $user->profile_photo_path = $request->file('profile_photo_path')->store('ImagesUsers','public');
        $user->save();
        return redirect()->route('user.show',$user->id);
        // return response(json_encode($request->all()), 200)->header('Content-type', 'text/plain');
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
    public function role(Request $request, $id)
    {
        $user = User::find($id);
        $user->roles()->sync($request->roles);
        return redirect()->route('user.index', $user->id);
    }
    public function search(Request $request)
    {

        if ($request['value'] == null) {
            $user = User::all();
        } else {
            $user = User::where('name', 'like', $request['value'] . '%')->get();
        }

        return response(json_encode($user), 200)->header('Content-type', 'text/plain');
    }
}
