<?php

namespace App\Http\Controllers\Part;

use App\Models\Item;
use App\Models\Client;
use App\Models\Valist;
use App\Models\CostClient;
use Illuminate\Http\Request;
use App\Models\ControlFields;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    const PERMISSIONS = [
        'create' => 'part-create',
        'show' => 'part-show',
        'edit' => 'part-edit',
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
        $items = Item::whereIn('type', ['p', 'r', 'o'])->get();
        $families = Valist::where('list_id', '4')->get();
        return view('modules.part.index', compact('items', 'families'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $families = Valist::where('list_id', '4')->where("state",'1')->get();
        $categories = Valist::where('list_id', '5')->where("state",'1')->get();
        $controlfills = Valist::where('list_id', '3')->where("state",'1')->get();
        $clients = Client::all();
        return view('modules.part.create', compact('controlfills', 'families', 'categories', 'clients'));
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
            'name' => 'required|unique:items',
            'family_id' => 'required',
            'category_id' => 'required',
            'partNum' => 'required|unique:items',
            'CostU' => 'required',
        ], [
            'name.required' => 'Campo nombre se encuentra vacío',
            'name.unique' => 'Campo nombre ya se encuentra registrado en la base de datos, prueba con otro',
            'family_id.required' => 'Campo familia se encuentra vacío',
            'category_id.required' => 'Campo categoria se encuentra vacío',
            'partNum.required' => 'Campo parte numero se encuentra vacío',
            'partNum.unique' => 'la numero ya fue registrado, pruebe con otro',
            'CostU.required' => 'Campo costo unidad se encuentra vacío',
        ]);
        $item = new Item();
        $item->name = request('name');
        $item->family_id = request('family_id');
        $item->category_id = request('category_id');
        $item->partNum = request('partNum');
        $item->CostU = request('CostU');
        $item->state = request('state') ? '1' : '0';
        $cont = 0;
        if (request('toggle') != '') {
            foreach (request('toggle') as $idList) {
                if ($idList == '9') {
                    $cont = 1;
                } 
            }
            if ($cont == 1){
                $type = 'p';
            }else{
                $type = 'r';
            }
        } else {
            $type = 'o';
        }
        $item->type = $type;
        $item->save();
        if (request('toggle') != '') {
            foreach (request('toggle') as $idList) {
                $dataControl = [
                    'item_id' => $item->id,
                    'valist_id' => $idList
                ];
                ControlFields::create($dataControl);
            }
        }
        return redirect()->route('part.index');
    }
    public function clientv(Request $request)
    {
        $Item = Item::latest('id')->first();
        if ($Item == '') {
            $idItem = 1;
        } else {
            $idItem = $Item->id + 1;
        }
        foreach (request('data') as $data) {
            $values = explode(",", $data);
            $dataCreate = [
                'client_id' => $values[0],
                'item_id' => $idItem,
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
        $resp = CostClient::where("client_id", $array['client_id'])->where("item_id", $array['item_id']);
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
        $families = Valist::where('list_id', '4')->where("state",'1')->get();
        $categories = Valist::where('list_id', '5')->where("state",'1')->get();
        $controlfills = Valist::where('list_id', '3')->where("state",'1')->get();
        $clients = Client::all();
        $costClient = CostClient::where('item_id', $id)->get();
        return view('modules.part.edit', compact('item', 'control', 'controlfills', 'families', 'categories', 'clients', 'costClient'));
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
            'name' => 'required|unique:items,name,' . $id,
            'family_id' => 'required',
            'category_id' => 'required',
            'partNum' => 'required|unique:items,partNum,' . $id,
            'CostU' => 'required',
        ], [
            'name.required' => 'Campo nombre se encuentra vacío',
            'name.unique' => 'este nombre ya se encuentra regitrado intenta con otro',
            'family_id.required' => 'Campo familia se encuentra vacío',
            'category_id.required' => 'Campo categoria se encuentra vacío',
            'partNum.required' => 'Campo parte numero se encuentra vacío',
            'partNum.unique' => 'esta parte número ya se encuentra regitrada, intenta con otra.',
            'CostU.required' => 'Campo costo unidad se encuentra vacío',
        ]);
        $item = Item::find($id);
        $item->name = request('name');
        $item->family_id = request('family_id');
        $item->category_id = request('category_id');
        $item->partNum = request('partNum');
        $item->CostU = request('CostU');
        $item->type = 'p';
        $item->state = request('state') ? '1' : '0';
        $item->save();
        if ($request->toggle) {
            foreach ($request->toggle as $key => $toggle) {
                $control = ControlFields::where('valist_id', $key)->where('item_id', $id)->get();
                if (count($control) > 0) {
                    $cfid = $control->pluck('id');
                    $controlfieldsid = $cfid->all();
                } else {
                    $controlfieldsid = '';
                }

                if (!empty($controlfieldsid)) {
                } else {
                    $dataCreate = [
                        'valist_id' => $key,
                        'item_id' => $id
                    ];
                    ControlFields::create($dataCreate);
                }
            }
        }
        return redirect()->route('part.index');
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
            $item = DB::table('items')->join('valists','valists.id','=','items.family_id')->where('type', 'p')->get(['items.*','valists.name as nfamily']);
        } else {
            $item = DB::table('items')->join('valists','valists.id','=','items.family_id')->where('type', 'p')->where('name', 'like', $request['value'] . '%')->get(['items.*','valists.label as nfamily']);
        }

        return response(json_encode($item), 200)->header('Content-type', 'text/plain');
    }
    public function validateN(Request $request)
    {
        if ($request['value'] != null) {
            $equips = DB::table('items')
                ->where('items.partNum',$request['value'])
                ->select(["items.*"])
                ->first();
        } else {
            $equips = null;
        }
        return response(json_encode($equips), 200)->header('Content-type', 'text/plain');
    }
}
