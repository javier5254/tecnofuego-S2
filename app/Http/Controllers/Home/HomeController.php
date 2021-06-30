<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    const PERMISSIONS = [
        'show' => 'home-show',
    ];

    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('permission:'.self::PERMISSIONS['create'])->only(['create', 'store']);
        // $this->middleware('permission:'.self::PERMISSIONS['show'])->only(['index', 'show']);
        // $this->middleware('permission:'.self::PERMISSIONS['edit'])->only(['edit', 'update']);
    }
    public function index()
    {
        $r1 = DB::table('activities')->whereIn('type_id', [1, 6])->get()->count();
        $r2 = DB::table('activities')->whereIn('type_id', [2, 7])->get()->count();
        $r3 = DB::table('activities')->whereIn('type_id', [3, 8])->get()->count();
        $r4 = DB::table('activities')->whereIn('type_id', [4, 9])->get()->count();
        $r5 = DB::table('activities')->whereIn('type_id', [5, 10])->get()->count();
        $r6 = DB::table('activities')->join('type_activs','activities.type_id','=','type_activs.id')->get();
        
        $r7 = DB::table('equipments as e')
        ->join("activities as a", "e.id", "=", "a.equip_id")
        ->join('type_activs as ta','a.type_id','=','ta.id')
        ->join("clients as c", "e.client_id", "=", "c.id")
        ->join("projects as p", "e.project_id", "=", "p.id")
        ->join("valists as v1", "e.flota_id", "=", "v1.id")
        ->join("valists as v2", "e.marca_id", "=", "v2.id")
        ->join("valists as v3", "e.modelo_id", "=", "v3.id")
        ->select(["e.internalN","c.name as cname", "p.name as pname","a.created_at","a.state","ta.name as tyname","v1.label as flota", "v2.label as marca", "v3.label as modelo"])
        ->paginate(5);

        
        return view("modules.home.index",compact('r1','r2','r3','r4','r5','r6','r7'));
    }
    public function search(Request $request)
    {

        if ($request['value'] == null) {
            $r7 = DB::table('equipments as e')
            ->join("activities as a", "e.id", "=", "a.equip_id")
            ->join('type_activs as ta','a.type_id','=','ta.id')
            ->join("clients as c", "e.client_id", "=", "c.id")
            ->join("projects as p", "e.project_id", "=", "p.id")
            ->join("valists as v1", "e.flota_id", "=", "v1.id")
            ->join("valists as v2", "e.marca_id", "=", "v2.id")
            ->join("valists as v3", "e.modelo_id", "=", "v3.id")
            ->select(["a.id as id", "e.internalN","c.name as cname", "p.name as pname","a.created_at","a.state","ta.name as tyname","v1.label as flota", "v2.label as marca", "v3.label as modelo"])->get();
        } else {
            $r7 = DB::table('equipments as e')
            ->join("activities as a", "e.id", "=", "a.equip_id")
            ->join('type_activs as ta','a.type_id','=','ta.id')
            ->join("clients as c", "e.client_id", "=", "c.id")
            ->join("projects as p", "e.project_id", "=", "p.id")
            ->join("valists as v1", "e.flota_id", "=", "v1.id")
            ->join("valists as v2", "e.marca_id", "=", "v2.id")
            ->join("valists as v3", "e.modelo_id", "=", "v3.id")
            ->select(["a.id as id", "e.internalN","c.name as cname", "p.name as pname","a.created_at","a.state","ta.name as tyname","v1.label as flota", "v2.label as marca", "v3.label as modelo"])
            ->where("e.internalN",'like',$request['value'].'%')
            ->get();
        }

        return response(json_encode($r7), 200)->header('Content-type', 'text/plain');
    }
}
