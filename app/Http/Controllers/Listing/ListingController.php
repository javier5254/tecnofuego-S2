<?php

namespace App\Http\Controllers\Listing;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use App\Models\Valist;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    const PERMISSIONS = [
        'create' => 'listing-create',
        'show' => 'listing-show',
        'edit' => 'listing-edit',
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
        $listas = Listing::where('state',1)->get();
        return view('modules.list.index', compact('listas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listas = Listing::all();
        $Valoreslistas = Valist::all();
        return view('modules.list.create', compact('listas', 'Valoreslistas'));
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
            'label' => 'required|unique:lists',
        ], [
            'label.required' => 'Campo nombre de la lista se encuentra vacio',
            'label.unique' => 'nombre de esta lista ya esta registrado, intenta con otro',
        ]);
        $list = new Listing;
        $list->label = $request->label;
        $list->son = $request->son ? '1' : '0';
        $list->father_id = $request->lfather_id != '' ? $request->lfather_id : null;
        $list->save();
        if ($request->data != '') {
            foreach ($request->data as $label) {
                $data = explode(",", $label);
                $valist = new Valist;
                $valist->label = $data[0];
                $valist->list_id = $list->id;
                $valist->state = $data[1];
                $valist->father_id = isset($data[2]) ? $data[2] : null;
                $valist->save();
            }
        }
        return redirect()->route('list.index');
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
    public function showVals(Request $request)
    {
        if ($request['value'] == null) {
            $lista = null;
        } else {
            $lista = Valist::where('list_id', $request['value'])->get(['id','label']);
        }

        
        return response(json_encode($lista), 200)->header('Content-type', 'text/plain');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listas = Listing::find($id);
        $listasOthers = Listing::all();
        $valoreslistas = Valist::where('list_id', $id)->get();
        $valoresOthers = Valist::all();
        
        return view('modules.list.edit', compact(['listas', 'listasOthers', 'valoresOthers', 'valoreslistas']));
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
            'label' => 'required|unique:lists,label,' . $id,
        ], [
            'label.required' => 'Campo nombre se encuentra vacio',
            'label.unique' => 'Esta lista ya esta registrada, intenta con otra',
        ]);
        $list = Listing::find($id);
        $list->label = $request->label;
        $list->son = $request->son ? '1' : '0';
        $list->father_id = $request->lfather_id != '' ? $request->lfather_id : null;
        $list->save();
        if ($request->data != '') {
            foreach ($request->data as $label) {
                $data = explode(",", $label);
                dd( $data);
                $listClear = Valist::where('label', $data[0])->get();
                
                if (count($listClear) == 0) {
                    $valist = new Valist;
                    $valist->label = $data[0];
                    $valist->list_id = $list->id;
                    $valist->state = $data[1];
                    $valist->father_id = $data[2] ? $data[2] : null;
                    $valist->save();
                }
                
            }
        }
        return redirect()->route('list.edit',$list->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $valist = Valist::find($request->id);
        $valist->delete();
        return response(json_encode(true), 200)->header('Content-type', 'text/plain');
    }
    public function search(Request $request)
    {
        if ($request['value'] == null) {
            $lista = Listing::all();
        } else {
            $lista = Listing::where('label', 'like', $request['value'] . '%')->get();
        }

        return response(json_encode($lista), 200)->header('Content-type', 'text/plain');
    }
    public function findinfovalue(Request $request)
    {
        if ($request['id'] == null) {
            $lista = Valist::all();
        } else {
            $lista = Valist::where('id', '=', $request['id'])->first();
        }

        return response(json_encode($lista), 200)->header('Content-type', 'text/plain');
    }
    public function updatevalist(Request $request)
    {
        if (request('id') == null) {
            
        } else {
            $valist = Valist::find(request('id'));
            $valist->label = request('label');
            $valist->state = request('state');
            $valist->father_id = request('father_id') ? request('father_id') : null;
            $valist->save();
        }
        return response(json_encode($request->all()), 200)->header('Content-type', 'text/plain');
    }
    public function filtervalues(Request $request)
    {
        if (request('value') == null) {
            $listas = valist::all();
        } else {
            $listas = valist::where('father_id',request('value'))->get();
        }
        return response(json_encode($listas), 200)->header('Content-type', 'text/plain');
    }
}
