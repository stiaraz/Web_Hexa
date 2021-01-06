<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Artikel;
use App\Anggota;
use App\Kelompok;
use App\Http\Controllers\Controller;
use Illuminate\Database\Query\Builder;
use Response;
use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{
    public function index()
    {
    	$post = Artikel::orderBy('created_at','asc')->paginate(3);
    	$post2 = Artikel::orderBy('created_at','desc')->take(3)->get();
    	$kategori = DB::table('artikel')
                     ->select(DB::raw('count(id_art) as jumlah, kategori_art'))
                     ->groupBy('kategori_art')
                     ->orderBy('jumlah')
                     ->get();
    	return view('index',['post'=>$post, 'post2' =>$post2, 'kategori' =>$kategori]);
    }

    public function error()
    {
        return view('error');
    }


    public function gagal(Request $request)
    {
        $data = DB::table('kelompoks')
                ->select ('nama_ang')
               ->join('anggotas','anggotas.id_kel','=','kelompoks.id_kel')
               ->where('anggotas.id_kel','=','0')->get();
        return response()->json(["status" => "No content", 'data'=>$data ],402);
    }
    public function datas($nama_kel)
    {  
      if(!Kelompok::where ('nama_kel',$nama_kel)->exists()){
        return response()->json(["status" => "No content data"],402);
      }
      else{
        $data = DB::table('kelompoks')
                ->select ('nama_ang')
                ->join('anggotas','anggotas.id_kel', '=','kelompoks.id_kel')
                ->where('kelompoks.nama_kel','=',$nama_kel)
                ->get();
        $datasArray = array();
        foreach ($data as $datas) {
            $datasArray[]= $datas->nama_ang;
        }
         return response()->json([$nama_kel=>$datasArray]);
      }
        
    }

}
