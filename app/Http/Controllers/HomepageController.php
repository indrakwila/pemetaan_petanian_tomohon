<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\kecamatan;
use App\Models\produksi;
use App\Models\ZonasiLahanModel;

class HomepageController extends Controller
{
    //
	public function index(){
		$menukecamatan = kecamatan::all();

		$produksiterbaru = produksi::with('foreign_kecamatan')->orderBy('created_at','DESC')->limit(3)->get();
		$mapsproduksi = produksi::all();

		$countkecamatan = kecamatan::count();
		$countproduksi = produksi::count();
		$zonasi = ZonasiLahanModel::leftJoin('produksis','produksis.id','table_zonasi.id_produksi')
							->select('table_zonasi.*','produksis.warna_zone as warna','produksis.nama_produksi as produksi')
							->orderBy('created_at','DESC')->get();
		return view('layouts.homepage.index', compact('menukecamatan','produksiterbaru','countkecamatan','countproduksi','mapsproduksi','zonasi'));
		
	}

	public function hasilproduksi(){
		$menukecamatan = kecamatan::all();

		$produksiterbaru = produksi::with('foreign_kecamatan')->orderBy('created_at','DESC')->paginate(10);

		//$countkecamatan = kecamatan::count();
		//$countproduksi = produksi::count();

		return view('layouts.homepage.produksi', compact('menukecamatan','produksiterbaru'));
		
	}

    public function detailproduksi($id)
    {
		$menukecamatan = kecamatan::all();

		$produksiterbaru = produksi::with('foreign_kecamatan')->find($id);
		$zonasi = ZonasiLahanModel::where('id_produksi',$id)->get();

		//$countkecamatan = kecamatan::count();
		//$countproduksi = produksi::count();

		return view('layouts.homepage.detailproduksi', compact('menukecamatan','produksiterbaru','zonasi'));	
    }  	    

    public function detailkecamatan($id)
    {
		$menukecamatan = kecamatan::all();

		$detailkecamatan = kecamatan::find($id);

        $produksikecamatan = produksi::with('foreign_kecamatan')->where('id_kecamatan', $id)->get();
		$zonasi = ZonasiLahanModel::leftJoin('produksis','produksis.id','table_zonasi.id_produksi')
				->select('table_zonasi.*','produksis.warna_zone as warna','produksis.nama_produksi as produksi')
				->where('table_zonasi.id_kecamatan',$id)->get();

		//$countkecamatan = kecamatan::count();
		//$countproduksi = produksi::count();

		return view('layouts.homepage.detailkecamatan', compact('zonasi','menukecamatan','detailkecamatan','produksikecamatan'));	
    }  	        


}
