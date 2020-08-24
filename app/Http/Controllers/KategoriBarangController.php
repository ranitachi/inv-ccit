<?php

namespace App\Http\Controllers;
use DB;
use Session;
use Validator;
use App\Models\KategoriBarang as Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KategoriBarangController extends Controller
{
    public function index()
    {
        $kategori = Kategori::orderBy('kategori')->get();
        return view('backend.kategori.index',compact('kategori'));
    }
    
    public function create()
    {
        return view('backend.kategori.create');
    }
    
    public function edit($id)
    {
        $get = Kategori::find($id);
        return view('backend.kategori.edit',compact('get','id'));
    }
   
    public function store(Request $request)
    {
        $rules = [
            'kategori' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $error = $validator->messages()->get('*');
            Session::flash('error', $error);  
            return redirect()->route('kategori-barang.create');
        }

        DB::beginTransaction();
        try {


            $Kategori = new Kategori;
            $Kategori->kategori=$request->kategori;
            $Kategori->keterangan=$request->keterangan;
            $Kategori->save();

            Session::flash('success', 'Save new Kategori Successfull');
            
            DB::commit();
        }
        catch (Exception $e) {
            DB::rollback();
            Session::flash('fail', 'Save New Kategori Unsuccessfull');
        }

        return redirect()->route('kategori-barang.index');
    }

    public function update(Request $request,$id)
    {
        $rules = [
            'kategori' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $error = $validator->messages()->get('*');
            Session::flash('error', $error);  
            return redirect()->route('kategori-barang.edit',$id);
        }

        DB::beginTransaction();
        try {
            

            $Kategori = Kategori::find($id);
            $Kategori->kategori=$request->kategori;
            $Kategori->keterangan=$request->keterangan;
            $Kategori->save();
            Session::flash('success', 'Save Update Kategori Successfull');
            
            DB::commit();
        }
        catch (Exception $e) {
            DB::rollback();
            Session::flash('fail', 'Save Update Kategori Unsuccessfull');
        }

        return redirect()->route('kategori-barang.index');
    }

    public function destroy($id){
        DB::beginTransaction();
        try {
            $Kategori = Kategori::find($id);
            $Kategori->delete();

            Session::flash('success', 'Delete Kategori Successfull');
            
            DB::commit();
        }
        catch (Exception $e) {
            DB::rollback();
            Session::flash('fail', 'Delete Kategori Unsuccessfull');
        }

        return redirect()->route('kategori-barang.index');
    }
}
