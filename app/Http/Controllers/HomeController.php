<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\User;
use App\Models\Faq;
use App\Models\DataBarang;
use Illuminate\Support\Str;
use App\Models\SkemaBantuan;
use Illuminate\Http\Request;
use App\Models\DokumenBansos;
use App\Models\PengajuanBaru;
use App\Models\PenerimaBansos;
use App\Models\PengajuanBansos;
use App\Models\PersyaratanBantuan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\ConnectionException;

class HomeController extends Controller
{
    public function index()
    {
        return redirect()->route('user-login');
        $berita=array();
        $skema=array();
        
        // return $berita;
        return view('frontend.pages.index')
                ->with('berita',$berita)
                ->with('skema',$skema);
    }

    public function detail_barang($kode)
    {
        $get = DataBarang::where('kode_barang',$kode)->with('kategori')->first();
        return view('frontend.pages.detail-barang',compact('get'));
    }
    public function data_barang()
    {
        $databarang = DataBarang::with('kategori')->orderBy('kode_barang')->paginate(10);
        return view('frontend.pages.index',compact('databarang'));
    }
}
