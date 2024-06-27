<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//user
use Auth;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\kecamatan;
use App\Models\produksi;

class AdminController extends Controller
{
    //

	public function Home(){

		$tahun = date('Y');
		$kecamatan = kecamatan::orderBy('created_at', 'DESC')->limit(5)->get();			
		
		//$countuser = user::count();
		$countkecamatan = kecamatan::count();
		$countproduksi = produksi::count();
	
		return view('layouts.admin.home', compact('countkecamatan','countproduksi','kecamatan'));

		// return view('layouts.admin.home');
	}

	//mulai kecamatan
	
	public function tampilkecamatan(){
		$kecamatan = kecamatan::all();
		return view('layouts.admin.tampilkecamatan', compact('kecamatan'));
	}	
	
	public function tambahkecamatan(){
		return view('layouts.admin.tambahkecamatan');
	}		
	
	public function prosestambahkecamatan(Request $request){
			$kecamatan = new kecamatan();
			$kecamatan->nama_kecamatan = $request->input('nama_kecamatan');
			$kecamatan->informasi_tambahan = $request->input('informasi_tambahan');
			$kecamatan->save();
			return redirect()->route('kecamatan.home')->with('success', 'Berhasil Menambah Data');
	}
	
   public function editkecamatan($id)
   {
       $kecamatan = kecamatan::find($id);
       return view('layouts.admin.editkecamatan', compact('kecamatan'));		
   }  	
	
   public function prosesupdatekecamatan(Request $request, $id)
   {
       $ubh = kecamatan::findorfail($id);
           $dt = [
               'nama_kecamatan' => $request['nama_kecamatan'],
               'informasi_tambahan' => $request['informasi_tambahan'],
           ];	
           $ubh->update($dt);
           return redirect()->route('kecamatan.home')->with('success', 'Data Berhasil di ubah');	
   } 	
   
	public function hapuskecamatan($id){
		$kecamatan = kecamatan::find($id);
		$kecamatan->delete(); 		
		return redirect()->route('kecamatan.home')->with('success', 'Data Berhasil di hapus');
	}	

	//end

	// Mulai produksi
	
	public function tampilproduksi(){
		$produksi = produksi::with('foreign_kecamatan')->get();
		return view('layouts.admin.tampilproduksi', compact('produksi'));
	}	
	
	public function tambahproduksi(){
		$kecamatan = kecamatan::all();
		return view('layouts.admin.tambahproduksi', compact('kecamatan'));
	}		
	
	public function prosestambahproduksi(Request $request){
		
			//$datauser_aktif = Auth::user()->id;
			
			$request->validate([
				'gambar' => 'mimes:jpeg,bmp,png,gif,svg,pdf|max:2048',
			]);		
			
			$nama_file = $request->gambar;			
			$filegambar = time().rand(100,999).".".$nama_file->getClientOriginalName();			
		
			$produksi = new produksi();
			$produksi->id_kecamatan = $request->input('id_kecamatan');
			$produksi->nama_produksi = $request->input('nama_produksi');
			$produksi->luas_tanam = $request->input('luas_tanam');
			$produksi->luas_panen = $request->input('luas_panen');
			$produksi->produksi = $request->input('produksi');
			$produksi->tanggal = $request->input('tanggal');
			$produksi->lokasi_gps = $request->input('lokasi_gps');
			$produksi->informasi_tambahan = $request->input('informasi_tambahan');
			$produksi->warna_zone = $request->warna_zone;
			$produksi->gambar = $filegambar;
			$produksi->save();
			
			$nama_file->move(public_path().'/gambarproduksi/', $filegambar);
			return redirect()->route('produksi.home')->with('success', 'Berhasil Menambah Data');
	}
	
   public function editproduksi($id)
   {
       $produksi = produksi::with('foreign_kecamatan')->find($id);
	   $kecamatan = kecamatan::all();
       return view('layouts.admin.editproduksi', compact('produksi','kecamatan'));		
   }  	
	
   public function prosesupdateproduksi(Request $request, $id)
   {
       $ubh = produksi::findorfail($id);
	   $data_awal = $ubh->gambar;
		if ($request->gambar == '')
		{	   
           $dt = [
               'id_kecamatan' => $request['id_kecamatan'],
               'nama_produksi' => $request['nama_produksi'],
               'luas_tanam' => $request['luas_tanam'],
               'luas_panen' => $request['luas_panen'],
               'produksi' => $request['produksi'],
               'tanggal' => $request['tanggal'],
               'lokasi_gps' => $request['lokasi_gps'],
               'informasi_tambahan' => $request['informasi_tambahan'],
			   'warna_zone'=>$request->warna_zone
           ];	
           $ubh->update($dt);
           return redirect()->route('produksi.home')->with('success', 'Data Berhasil di ubah');	
		}
		else {
		   
			$request->validate([
				'gambar' => 'mimes:jpeg,bmp,png,gif,svg,pdf|max:2048',
			]);				   
		   			
           $dt = [
               'id_kecamatan' => $request['id_kecamatan'],
               'nama_produksi' => $request['nama_produksi'],
               'luas_tanam' => $request['luas_tanam'],
               'luas_panen' => $request['luas_panen'],
               'produksi' => $request['produksi'],
               'tanggal' => $request['tanggal'],
               'lokasi_gps' => $request['lokasi_gps'],
               'informasi_tambahan' => $request['informasi_tambahan'],
               'gambar' => $data_awal,
			   'warna_zone'=>$request->warna_zone
           ];	
		   $request->gambar->move(public_path().'/gambarproduksi/', $data_awal);
           $ubh->update($dt);
           return redirect()->route('produksi.home')->with('success', 'Data Berhasil di ubah');				
		}
   } 	
   
	public function hapusproduksi($id){
		$produksi = produksi::find($id);
		$produksi->delete(); 		
		return redirect()->route('produksi.home')->with('success', 'Data Berhasil di hapus');
	}		

}
