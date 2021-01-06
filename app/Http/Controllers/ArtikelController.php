<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Database\Query\Builder;
use App\Http\Controllers\Controller;
use App\User;
use App\Artikel;
// use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Input;
use File;
use App\Http\Requests;
class ArtikelController extends Controller
{
	public function getkategori(Request $request, $kategori_art)
	{
		$post = Artikel::where('kategori_art', '=', $kategori_art)->orderBy('created_at','desc')->paginate(2);
		$post2 = Artikel::orderBy('created_at','desc')->take(3)->get();
		$post3 =Artikel::orderBy('judul_art', 'asc')->paginate(2);
		$post4 = Artikel::orderBy('created_at','asc')->paginate(2);
		$kategori = DB::table('artikel')
                     ->select(DB::raw('count(id_art) as jumlah, kategori_art'))
                     ->groupBy('kategori_art')
                     ->orderBy('jumlah')
                     ->get();
		return view('post.kategori', ['post'=>$post,'kategori'=>$kategori,'post2'=>$post2, 'post3'=>$post3, 'post4'=>$post4]);
		
	}

     public function getFormArtikel()
    {
       $post = Artikel::get();
        return view('post.add', compact ('post'));
    }

    public function setFormArtikel()
    {
    	$validation = Validator::make(Input::all(),array(
    		'kategori_art' =>'required',
    		'judul_art' =>'required',
    		'gambar_art' =>'required|image|mimes:jpeg,png,jpg,gif,svg',
    		'isi_art'=>'required',
    	));

    	if($validation->fails()) {
            return Redirect::back()->withErrors($validation->messages());
        }
        // $destinationPath = public_path('/articlesimage');
 
        // $fileName = Input::file('gambar_art')->getClientOriginalName();

        // Input::file('gambar_art')->resize(1800,1350)->move($destinationPath, $fileName);
        if(Input::file()){
        	$image = Input::file('gambar_art');
        	$fileName  = time() . '.' . $image->getClientOriginalExtension();
        	// $fileName = Input::file('gambar_art')->getClientOriginalName();
        	$destinationPath = public_path('/articlesimage/'. $fileName);
        	Image::make($image->getRealPath())->resize(1800,1350)->save($destinationPath);
        }
        Artikel::create([
        		'id' =>Auth::User()->id,
        		'kategori_art' =>Input::get('kategori_art'),
        		'judul_art' =>Input::get('judul_art'),
                'gambar_art' => $fileName,
                'isi_art' => Input::get('isi_art'),
               
            ]);
            return back()
           ->with('success','Post submitted successfully.');
    }

    public function editFormArtikel($id_art)
    {
    	$post = Artikel::find($id_art);
        return view('post.edit', compact('post'));
    }

    public function updateFormArtikel(Request $request, $id_art)
    {	
    	$post = Artikel::find($id_art);
    	// $this->validate($request, [
        //  'kategori_art' =>'required',
    	// 	'judul_art' =>'required',
    	// 	'gambar_art' =>'required|image|mimes:jpeg,png,jpg,gif,svg',
    	// 	'isi_art'=>'required',
        //  ]);
    	//  $post = Artikel::find($id_art);
    	//  $post->kategori_art = $request->input('kategori_art');
        //    $post->judul_art = $request->input('judul_art');
       //    $post->isi_art = $request->input('isi_art');
    	$validation = Validator::make(Input::all(),array(
    		'kategori_art' =>'required',
    		'judul_art' =>'required',
    		'gambar_art' =>'required|image|mimes:jpeg,png,jpg,gif,svg',
    		'isi_art'=>'required',
    	));
    	if($validation->fails()) {
            return Redirect::back()->withErrors($validation->messages());
        }

    	// if($request->hasFile('gambar_art'))
    	// {
    	// 	$gambar_art = $request->file('gambar_art');
    	// 	$fileName  = time() . '.' . $gambar_art->getClientOriginalExtension();
    	// 	$destinationPath = public_path('/articlesimage/'. $fileName);
    	// 	Image::make($gambar_art->getRealPath())->resize(1800,1350)->save($destinationPath);
    	// 	// $post->gambar_art = $fileName;
    	// }
        
        // $post->kategori_art = $request->input('kategori_art');
        // $post->judul_art = $request->input('judul_art');
        // $post->isi_art = $request->input('isi_art');
        if(Input::file()){
        	$image = Input::file('gambar_art');
        	$fileName  = time() . '.' . $image->getClientOriginalExtension();
        	$destinationPath = public_path('/articlesimage/'. $fileName);
        	Image::make($image->getRealPath())->resize(1800,1350)->save($destinationPath);
        }
        
        Artikel::where('id_art',$id_art)->update([
        		
        		'kategori_art' =>Input::get('kategori_art'),
        		'judul_art' =>Input::get('judul_art'),
                'gambar_art' => $fileName,
                'isi_art' => Input::get('isi_art'),
        ]);
         // $post->save();

        return redirect()->back();


    }

    public function deleteArtikel($id_art)
    {
    	Artikel::destroy($id_art);
    	return back();
    }


}
