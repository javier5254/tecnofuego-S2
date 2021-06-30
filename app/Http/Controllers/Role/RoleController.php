<?php

namespace App\Http\Controllers\Role;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{

    const PERMISSIONS = [
        'create' => 'admin-role-create',
        'show' => 'admin-role-show',
        'edit' => 'admin-role-edit',
        'delete' => 'admin-role-delete',
    ];

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:' . self::PERMISSIONS['create'])->only(['create', 'store']);
        $this->middleware('permission:' . self::PERMISSIONS['show'])->only(['index', 'show']);
        $this->middleware('permission:' . self::PERMISSIONS['edit'])->only(['edit', 'update']);
        $this->middleware('permission:' . self::PERMISSIONS['delete'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('name')->paginate();

        return view('modules.role.index', [
            'roles' => $roles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response 
     */
    public function create()
    {
        $permissions = Permission::all();
        $modules = Category::all();

        return view('modules.role.create', [
            'row' => new Role(),
            'permissions' => $permissions,
            'modules' => $modules,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $row = new Role($request->all());
        $row->save();

        $row->permissions()->sync($request->permission);


        return redirect()
            ->route('role.index', $row->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('modules.role.show', [
            'row' => $role->load('permissions', 'users')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $content = '';
        $modules = Category::all();
        return view('modules.role.edit', [
            'row' => $role,
            'permissions' => Permission::all(),
            'modules' => $modules,
            'content' => $content,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {

        $content = '1';


        try {
            $role->update($request->all());
            $role->permissions()->sync($request->permission);
        } catch (\Throwable $th) {


            $content = '0';
        }

        $modules = Category::all();

        return view('modules.role.edit', [
            'content' => $content,
            'row' => $role,
            'permissions' => Permission::all(),
            'modules' => $modules,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()
            ->route('role.index');
    }
    public function search(Request $request)
    {

        if ($request['value'] == null) {
            $Role = Role::all();
        } else {
            $Role = Role::where('name', 'like', '%' . $request['value'] . '%')->get();
        }

        return response(json_encode($Role), 200)->header('Content-type', 'text/plain');
    }
}
