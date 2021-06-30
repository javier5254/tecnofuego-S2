<?php

namespace App\Http\Controllers\Serv;

use App\Models\Item;
use App\Models\Client;
use App\Models\Valist;
use App\Models\CostClient;
use Illuminate\Http\Request;
use App\Models\ControlFields;
use App\Http\Controllers\Controller;

class ServController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    const PERMISSIONS = [
        'create' => 'serv-create',
        'show' => 'serv-show',
        'edit' => 'serv-edit',
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
        $items = Item::where('type', 's')->get();
        return view('modules.serv.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $families = Valist::where('list_id', '4')->get();
        $categories = Valist::where('list_id', '5')->get();
        $controlfills = Valist::where('list_id', '3')->get();
        $clients = Client::all();
        return view('modules.serv.create', compact('controlfills', 'families', 'categories', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response\
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required|unique:items',
            'quantity' => 'required',
            'CostU' => 'required',
        ], [
            'name.required' => 'Campo nombre se encuentra vacío',
            'name.unique' => 'El cliente ah sido registrado previamente, intenta con otro nombre',
            'quantity.required' => 'Campo unidades se encuentra vacío',
            'CostU.required' => 'Campo costo unitario se encuentra vacío',
        ]);
        $item = new Item();
        $item->name = request('name');
        $item->quantity = request('quantity');
        $item->description = request('description');
        $item->CostU = request('CostU');
        $item->type = 's';
        $item->state = request('state') ? '1' : '0' ;
        $item->save();
        return redirect()->route('serv.index');
    }

    public function clientv(Request $request)
    {
        $idItem = Item::orderby('created_at', 'DESC')->take(1)->get();
        foreach (request('data') as $data) {
            $values = explode(",", $data);
            $dataCreate = [
                'client_id' => $values[0],
                'item_id' => request('id') ? request('id') : $idItem[0]["id"] + 1 ,
                'cost' => $values[1]
            ];
            $response = CostClient::create($dataCreate);
        }
    }
    public function deleteclientv(Request $request)
    {
        $data = $request->data;
        $array = [
            'client_id' => $data[0],
            'item_id' => $data[1]
        ];
        $resp = CostClient::where("client_id",$array['client_id'])->where("item_id",$array['item_id']);
        $resp->delete();
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
        $item = Item::find($id);
        $control = ControlFields::where('item_id', $id)->get();
        $families = Valist::where('list_id', '4')->get();
        $categories = Valist::where('list_id', '2')->get();
        $controlfills = Valist::where('list_id', '3')->get();
        $clients = Client::all();
        $CostClient = CostClient::where('item_id', $id)->get();
        return view('modules.serv.edit', compact('item', 'control', 'controlfills', 'families', 'categories', 'clients', 'CostClient'));
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
            'name' =>  'required|unique:items,name,'.$id,
            'quantity' => 'required',
            'CostU' => 'required',
        ], [
            'name.required' => 'Campo nombre se encuentra vaco',
            'name.unique' => 'El cliente ah sido registrado previamente, intenta con otro nombre',
            'quantity.required' => 'Campo unidades se encuentra vaco',
            'CostU.required' => 'Campo costo unitario se encuentra vaco',
        ]);
        
        $item = Item::find($id);
        $item->name = request('name');
        $item->quantity = request('quantity');
        $item->description = request('description');
        $item->CostU = request('CostU');
        $item->type = 's';
        $item->state = request('state') ? '1' : '0' ;
        $item->save();
        return redirect()->route('serv.index');
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

        if ($request['value'] == null) {
            $item = Item::where('type', 's')->get();
        } else {
            $item = Item::where('name', 'like', $request['value'] . '%')->where('type', 's')->get();
        }

        return response(json_encode($item), 200)->header('Content-type', 'text/plain');
    }
}
