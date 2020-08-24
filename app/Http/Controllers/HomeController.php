<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\User;
use App\Models\Faq;
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

    public function newsdetail($judul)
    {
        // $data=array();
        $data=$this->berita($judul);
        $berita=$data['berita'][0];
        $lain=$data['lain'];
        return view('frontend.pages.news-detail')
                ->with('judul',$judul)
                ->with('berita',$berita)
                ->with('lain',$lain);
    }
    
    public function skema($jenis)
    {
        // $data=array();
        $skema=SkemaBantuan::where('flag_active',1)->get();
        $get=SkemaBantuan::where('jenis_slug',$jenis)->first();
        $syarat=PersyaratanBantuan::where('skema_id',$get->id)->where('flag_active',1)->orderBy('persyaratan')->get();

        if(isset(Auth::user()->id))
        {
            $user = User::where('id',Auth::user()->id)->with('identitas')->first();
            if($user)
                $pengajuan = \App\Models\PengajuanBaru::where('status_pengajuan','!=',2)->where('register_id',$user->identitas->id)->get();
            else
                $pengajuan = array();
        }
        else
            $pengajuan = array();

        return view('frontend.pages.skema')
                ->with('pengajuan',$pengajuan)
                ->with('skema',$skema)
                ->with('syarat',$syarat)
                ->with('get',$get);
    }

    public function pencarian()
    {
        return view('frontend.pages.pencarian');
    }

    public function pencarian_result(Request $request)
    {
        $nik=$request->nik_kk;
        $nama=strtolower($request->nama_ktp);

        $cari_penerima=PenerimaBansos::whereRaw('LOWER(nama_lengkap) = ?',array($nama))
                        ->where(function($query) use ($nik){
                            $query->where('nomor_kk', '=', $nik);
                            $query->orWhere('nik', '=', $nik);
                        })->with('kel')->with('kec')
                        ->first();
        $result=array();
        $source='';
        if($cari_penerima)
        {
            $result=$cari_penerima;
            $source='penerima';
        }
        else
        {
            $cari_pengajuan=PengajuanBansos::whereRaw('LOWER(nama_lengkap) = ?',array($nama))
                ->where(function($query) use ($nik){
                    $query->where('nomor_kk', '=', $nik);
                    $query->orWhere('nik', '=', $nik);
                })->with('kel')->with('kec')
                ->first();

            if($cari_pengajuan)
            {
                $result=$cari_pengajuan;
                $source='pengajuan';
            }
        }
        // return $data;
        return view('frontend.pages.pencarian-data')->with('source',$source)->with('result',$result);
    }

    public function jadwal()
    {
        $jadwal=DokumenBansos::where('publish',1)->orderBy('created_at','desc')->get();
        return view('frontend.pages.jadwal')
                ->with('jadwal',$jadwal);
    }
    public function faq()
    {
        $faq=Faq::where('publish',1)->get();
        return view('frontend.pages.faq')
                ->with('faq',$faq);
    }
}
