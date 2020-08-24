<?php

namespace App\Http\Controllers;
use DB;
use Session;
use Validator;
use App\Models\DataBarang;
use App\Models\KategoriBarang as Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DataBarangController extends Controller
{
    public function index()
    {
        
        $databarang = DataBarang::with('kategori')->orderBy('kode_barang')->get();
        return view('backend.barang.index',compact('databarang'));
    }
    
    public function create()
    {
        $kategori = Kategori::orderBy('kategori')->get();
        return view('backend.barang.create',compact('kategori'));
    }
    
    public function edit($id)
    {
        $kategori = Kategori::orderBy('kategori')->get();
        $get = DataBarang::find($id);
        return view('backend.barang.edit',compact('get','id','kategori'));
    }
    public function show($id)
    {
        $get = DataBarang::where('id',$id)->with('kategori')->first();
        return view('backend.barang.show',compact('get','id'));
    }
    
    public function store(Request $request)
    {
        $rules = [
            'foto' => 'required',
            'kategori_id' => 'required',
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'comment' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $error = $validator->messages()->get('*');
            Session::flash('error', $error);  
            return redirect()->route('data-barang.create');
        }

        DB::beginTransaction();
        try {

            $foto = null;
            if ($request->has('foto')) {
                $file = $request->foto;
                $filename = time().'.'.$file->getClientOriginalExtension();
                $foto = $file->storeAs('public/foto', $filename);
            }

            $databarang = new DataBarang;
            $databarang->kode_barang=$request->kode_barang;
            $databarang->nama_barang=$request->nama_barang;
            $databarang->kategori_id=$request->kategori_id;
            $databarang->foto=$foto;
            $databarang->keterangan=$request->comment;
            $databarang->save();

            Session::flash('success', 'Save new Data Successfull');
            
            DB::commit();
        }
        catch (Exception $e) {
            DB::rollback();
            Session::flash('fail', 'Save New Data Unsuccessfull');
        }

        return redirect()->route('data-barang.index');
    }

    public function update(Request $request,$id)
    {
        $rules = [
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'kategori_id' => 'required',
            'comment' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $error = $validator->messages()->get('*');
            Session::flash('error', $error);  
            return redirect()->route('data-barang.edit',$id);
        }

        DB::beginTransaction();
        try {
            

            $databarang = DataBarang::find($id);
            $databarang->kode_barang=$request->kode_barang;
            $databarang->nama_barang=$request->nama_barang;
            $databarang->kategori_id=$request->kategori_id;
            if ($request->has('foto')) {
                $file = $request->foto;
                $filename = time().'.'.$file->getClientOriginalExtension();
                $foto = $file->storeAs('public/foto', $filename);
                $databarang->foto=$foto;
            }
            $databarang->keterangan=$request->comment;
            $databarang->save();
            Session::flash('success', 'Save Update Data Successfull');
            
            DB::commit();
        }
        catch (Exception $e) {
            DB::rollback();
            Session::flash('fail', 'Save Update Data Unsuccessfull');
        }

        return redirect()->route('data-barang.index');
    }

    public function destroy($id){
        DB::beginTransaction();
        try {
            $databarang = DataBarang::find($id);
            $databarang->delete();

            Session::flash('success', 'Delete Data Successfull');
            
            DB::commit();
        }
        catch (Exception $e) {
            DB::rollback();
            Session::flash('fail', 'Delete Data Unsuccessfull');
        }

        return redirect()->route('data-barang.index');
    }
}
