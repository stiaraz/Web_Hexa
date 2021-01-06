<?php

namespace App\Http\Controllers;


use App\Artikel;
use App\Anggota;
use App\Kelompok;
use App\Http\Requests;
use Illuminate\Database\Query\Builder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // $post = Artikel::orderBy('created_at','asc')->paginate(3);
        $post = Artikel::orderBy('created_at','asc')->paginate(2);
        $post2 =Artikel::orderBy('judul_art', 'asc')->paginate(2);
        $post3 =Artikel::orderBy('created_at', 'desc')->take(3)->get();
        $kategori = DB::table('artikel')
                     ->select(DB::raw('count(id_art) as jumlah, kategori_art'))
                     ->groupBy('kategori_art')
                     ->orderBy('jumlah')
                     ->get();
        return view('home',['post'=>$post, 'post2'=>$post2, 'post3'=>$post3, 'kategori'=>$kategori]);
    }

    public function hewan(Request $request, $nama_kel)
    {
        $data= Anggota::where('nama_kel','=', $nama_kel)->get();
        $anggota= Anggota::with('kelompok')->get();
        return response()->json($anggota);
    }
}
