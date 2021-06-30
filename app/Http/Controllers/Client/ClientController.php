<?php

namespace App\Http\Controllers\Client;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    const PERMISSIONS = [
        'create' => 'client-create',
        'show' => 'client-show',
        'edit' => 'client-edit',
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
        $clients = Client::paginate('5');
        return view('modules.client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modules.client.create');
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
            'name' => 'required|unique:clients',
            'name_person' => 'required',
        ], [
            'name.required' => 'Campo nombre se encuentra vací',
            'name.unique' => 'El cliente ah sido registrado previamente, intenta con otro nombre',
            'name_person.required' => 'Campo persona de contacto se encuentra vací',

        ]);

        $client = new Client();
        $client->name = request('name');
        $client->name_person = request('name_person');
        $client->phone_person = request('phone_person') ? request('phone_person') : Null;
        $client->description = request('description') ? request('description') : Null;
        $client->state = request('state') ? '1' : '0';


        $client->save();

        return redirect()->route('client.index');
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

        $client = Client::find($id);
        return view('modules.client.edit', compact('client'));
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
            'name' => 'required|unique:clients,name,' . $id,
            'name_person' => 'required',
        ], [
            'name.required' => 'Campo nombre se encuentra vacío',
            'name.unique' => 'este cliente ya se encuentra registrado intenta con otro',
            'name_person.require' => 'Campo persona de contacto se encuentra vacío',
        ]);
        $client = Client::find($id);
        $client->name = request('name');
        $client->name_person = request('name_person');
        $client->phone_person = request('phone_person') ? request('phone_person') : Null;
        $client->description = request('description') ? request('description') : Null;
        $client->state = request('state') ? '1' : '0';
        $client->save();
        return redirect()->route('client.index');
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
            $client = DB::table('clients')
                ->where('clients.name',$request['value'])
                ->select(["clients.*"])
                ->first();
        } else {
            $client = null;
        }
        return response(json_encode($client), 200)->header('Content-type', 'text/plain');
    }
    public function search(Request $request)
    {

        if ($request['value'] == null) {
            $client = Client::all();
        } else {
            $client = Client::where('name', 'like', $request['value'] . '%')->get();
        }

        return response(json_encode($client), 200)->header('Content-type', 'text/plain');
    }
}
