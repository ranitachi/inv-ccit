<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Session;
use SSO\SSO;
use App\User;
use Validator;
use App\Models\Trainee;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Organization;
use Illuminate\Http\Request;
use App\Models\PengajuanBaru;
use App\Helpers\FunctionHelper;
use App\Rules\MatchOldPassword;
use App\Models\IdentitasPengaju;
use App\Models\PengajuanDokumen;
use App\Models\PengajuanKolomNilai;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if(Auth::check()){
            return redirect('user-profil'); 
        }
        $tab='login';
        if(isset($request->tab))
            $tab=$request->tab;

        return view('frontend.pages.user.index')
            ->with('tab',$tab);
    }
    public function profil()
    {

        $user=array();
        if(!Auth::check()){
            Session::flash('fail', 'Please Login/Register');
            return redirect('user-login'); 
        }
        
        $user=User::where('id',Auth::user()->id)->with('trainee')->first();
        // return $user;
        // return $user;
        return view('frontend.pages.user.profil')
                    ->with('user',$user);
    }

    public function proses(Request $request)
    {
        // return $request->all();
        DB::beginTransaction();

        try {

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                
                $user=User::where('email',$request->email)->first();
                if($user){

                    Auth::login($user);
                    // if($user->level!=10 && $user->flag_active==1)
                    // {
                        if($user->level==0)
                            return redirect('admin/dashboard');

                        return redirect('dashboard');
                    // }
                }
                else{
                    Session::flash('fail', 'Email & Password Incorrent, Please Try Again');
                    return redirect()->route('user-login');
                }
            }
            else
            {
                Session::flash('fail', 'Email & Password Incorrent, Please Try Again');
                return redirect()->route('user-login');
            }

            Session::flash('success', 'Anda Berhasil Login');    
            DB::commit();
            return redirect()->route('user-profil');
        }
        catch (Exception $e) {
            DB::rollback();
            Session::flash('fail', 'Email & Password Incorrent, Please Try Again');
            return redirect()->route('user-login');
        }

        
    
    }
    public function register(Request $request)
    {
        
        DB::beginTransaction();

        try {

            $rules = [
                'email' => 'required|unique:users',
                'nama' => 'required',
                'password' => 'required',
                'ktp' => 'required|mimes:png,jpg,jpeg|image|max:2000',
                'captcha' => 'required|captcha',
            ];

            $customMessage=[
                'email.unique' => 'Your Email already Use',
                'email.required' => 'Email field is Required',
                'ktp.required' => 'ID Field is Required',
                'mimes' => 'Only allow format JPG or PNG',
                'max' => 'Maximum Size Allowed 2 MB',
                'captcha.captcha' => 'Please Check Security Code',
            ];

            $validator = validator()->make(request()->all(), $rules,$customMessage);
            if ($validator->fails()) {
                $error = $validator->messages()->get('*');
                Session::flash('error', $error);  
                return redirect('user-login?tab=register');
            } 
            
            // r    eturn $request->all();
            
            $ktp_path = null;
            if ($request->has('ktp')) {
                $file = $request->ktp;
                $filename = time().'.'.$file->getClientOriginalExtension();
                $ktp_path = $file->storeAs('ktp', $filename);
            }

            $data = new User;
            $data->name = $request->nama;
            $data->email = $request->email;
            $data->phone = $request->nomor_hp;
            $data->level = 10;
            $data->password = bcrypt($request->password);
            $data->id_card = $ktp_path;
            $data->save();

            $user_id=$data->id;

            $trainee =  new Trainee;
            $trainee->user_id = $user_id;
            $trainee->email1 = $request->email;
            $trainee->name = $request->nama;
            $trainee->mobile_phone = $request->nomor_hp;
            $trainee->id_card = $ktp_path;
            $trainee->save();

            DB::commit();
            Session::flash('success', 'Registrasion Succes, Please Update Your Profile'); 
            
            Auth::login($data);

            return redirect()->route('user-profil');   
            
        }
        catch (Exception $e) {
            DB::rollback();
            Session::flash('fail', 'Opss Something Wrong');
        }

        return redirect()->route('user-page');
    
    }
    public function update(Request $request)
    {
        // return $request->all();
        DB::beginTransaction();

        try {
            $id=Auth::user()->id;
            $rules = [
                'ktp' => 'mimes:png,jpg,jpeg|image|max:1000',
                'foto' => 'mimes:png,jpg,jpeg|image|max:1000',
                'foto_ktp' => 'mimes:png,jpg,jpeg|image|max:1000',
            ];

            $customMessage=[
                'mimes' => 'Hanya Boleh Upload dengan Format JPG atau PNG',
                'max' => 'Maksimal Ukuran Foto 1 MB',
            ];

            $validator = validator()->make(request()->all(), $rules,$customMessage);
            if ($validator->fails()) {
                $error = $validator->messages()->get('*');
                Session::flash('error', $error);  
                return redirect('user-profil');
            } 
            $kec_id=$kel_id=0;
            if(isset($request->kelurahan))
                list($kec_id,$kel_id)=explode('--',$request->kelurahan);

            $ktp_path = null;
            if ($request->has('ktp')) {
                $file = $request->ktp;
                $filename = time().'.'.$file->getClientOriginalExtension();
                $ktp_path = $file->storeAs('public/ktp', $filename);
            }
            $foto_ktp_path = null;
            if ($request->has('foto_ktp')) {
                $file = $request->foto_ktp;
                $filename = time().'.'.$file->getClientOriginalExtension();
                $foto_ktp_path = $file->storeAs('public/foto_ktp', $filename);
            }
            $foto_path = null;
            if ($request->has('foto')) {
                $file = $request->foto;
                $filename = time().'.'.$file->getClientOriginalExtension();
                $foto_path = $file->storeAs('public/foto', $filename);
            }


            $data = User::find($id);
            
            $update_nik = $data->email;

            $data->name = $request->nama_lengkap;
            $data->email = $request->nik;
            $data->telepon = $request->nomor_telepon;
            
            if($foto_path!=null)
                $data->foto = $foto_path;
            
            $data->save();

            $nik=$update_nik;

            $identitas =  IdentitasPengaju::where('nik',$nik)->first();;
            $identitas->nik = $request->nik;
            $identitas->nama_lengkap = $request->nama_lengkap;
            $identitas->nomor_telepon = $request->nomor_telepon;
            $identitas->kecamatan = $kec_id;
            $identitas->kelurahan = $kel_id;
            $identitas->alamat = $request->alamat;
            $identitas->kelamin = $request->jenis_kelamin;
            // $identitas->gender = $request->jenis_kelamin;
            $identitas->tempat_lahir = $request->tempat_lahir;
            $identitas->tanggal_lahir = $request->tanggal_lahir;
            $identitas->pekerjaan_lama = $request->pekerjaan_lama;
            $identitas->pekerjaan_saat_ini = $request->pekerjaan_saat_ini;
            
            if($ktp_path!=null)
                $identitas->ktp = $ktp_path;

            if($foto_ktp_path!=null)
                $identitas->foto_ktp = $foto_ktp_path;
            
            if($foto_path!=null)
                $identitas->foto = $foto_path;

            $identitas->save();

            DB::commit();
            Session::flash('success', 'Anda Berhasil Melakukan Update Profil'); 
            
        }
        catch (Exception $e) {
            DB::rollback();
            Session::flash('fail', 'Opss terjadi kesalahan');
        }

        return redirect()->route('user-profil');
    
    }

    public function change_pass()
    {
        $user=array();
        if(!Auth::check()){
            return redirect('user-login'); 
        }
        
        $user=User::where('id',Auth::user()->id)->with('trainee')->first();
        // return $user;
        return view('frontend.pages.user.change-pass')
                    ->with('user',$user);
    }
    public function change_pass_save(Request $request)
    {
        DB::beginTransaction();

        try {
            $id=Auth::user()->id;
            
            $custom = [
                'current_password.required' => 'Old Password Cannot be Blank',
                'new_password.required' => 'New Password Cannot be Blank',
                'new_confirm_password.same' => 'Confirm Password Not Match'
            ];

            $request->validate([
                'current_password' => ['required', new MatchOldPassword],
                'new_password' => ['required'],
                'new_confirm_password' => ['same:new_password'],
            ],$custom);
            
            User::find($id)->update(['password'=> Hash::make($request->new_password)]);

            DB::commit();
            Session::flash('success', 'Change Password Successfull'); 
            
        }
        catch (Exception $e) {
            DB::rollback();
            Session::flash('fail', 'Opss something Wrong');
        }

        return redirect()->route('user-change-pass');
    }

    public function user_cek_nik($nik)
    {
        $user=User::where('email',$nik)->first();
        if($user)
            return 1;
        else
            return 0;
    }
    
    public function trainee_form()
    {
        $user=array();
        if(!Auth::check()){
            Session::flash('fail', 'Please Login/Register First');
            return redirect('user-login'); 
        }
        
        $user=User::where('id',Auth::user()->id)->first();
        $organization = Organization::orderBy('organization_name')->get();
        $edu_bg = FunctionHelper::education_background();
        $interested = FunctionHelper::interested_area();
        $get = Trainee::find($user->trainee->id);
    
        
        return view('frontend.pages.user.trainee-form')
                    ->with('user',$user)
                    ->with('organization',$organization)
                    ->with('edu_bg',$edu_bg)
                    ->with('interested',$interested)
                    ->with('get',$get);
    }
    public function trainee_form_update(Request $request)
    {
        $id = $request->id_trainee;
        // dd($request->all());
       $rules = [
            'name' => 'required',
            'organization_id' => 'required',
            'gender' => 'required',
            'birthday_date' => 'required',
            'cv_attachment' => 'mimes:pdf,docx,doc',
            'spv_attachment' => 'mimes:pdf,docx,doc',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $error = $validator->messages()->get('*');
            Session::flash('error', $error);  
            return redirect()->route('trainee-form');
        }

        
        DB::beginTransaction();
        try {
            $trainee = Trainee::find($id);
            $trainee->name = $request->name;
            $trainee->nick_name = $request->nick_name;
            $trainee->organization_id = $request->organization_id;
            $trainee->gender = $request->gender;
            $trainee->birthday_place = $request->birthday_place;
            $trainee->birthday_date = $request->birthday_date;
            $trainee->fixed_number = $request->fixed_phone;
            $trainee->mobile_phone = $request->mobile_phone;
            $trainee->email1 = $request->email1;
            $trainee->email2 = $request->email2;
            $trainee->address = $request->address;
            $trainee->comment = $request->comment;

            if(isset($request->education_background))
                $trainee->educational_background = FunctionHelper::arrayToText($request->education_background);
            
            if(isset($request->interested_area))
                $trainee->interested_area = implode(',',$request->interested_area);
            

            if($request->has('cv_attachment'))
            {
                $file = $request->file('cv_attachment');
                $name = time() . '.' . $file->getClientOriginalExtension();
                $cv_attachment = $file->storeAs('cv_attachment', $name);  
                $trainee->cv_attachment=$cv_attachment;
            }
            
            if($request->has('spv_attachment'))
            {
                $file = $request->file('spv_attachment');
                $name = time() . '.' . $file->getClientOriginalExtension();
                $spv_permission_attachment = $file->storeAs('spv_attachment', $name);  
                $trainee->spv_permission_attachment=$spv_permission_attachment;
            }
            $trainee->save();

            Session::flash('success', 'Save Update Data Successfull');
            
            DB::commit();
        }
        catch (Exception $e) {
            DB::rollback();
            Session::flash('fail', 'Save Update Data Unsuccessfull');
        }

        return redirect()->route('trainee-form');

    }

    public function user_pengajuan_hapus(Request $request)
    {
        $id=$request->id_pengajuan;

        DB::beginTransaction();

        try {
            $get = PengajuanDokumen::where('pengajuan_id',$id)->get();
            foreach($get as $index=>$value)
            {
                $value->delete();
            }
            
            $get = PengajuanKolomNilai::where('pengajuan_id',$id)->get();
            foreach($get as $index=>$value)
            {
                $value->delete();
            }

            $pengajuan = PengajuanBaru::find($id);
            $pengajuan->delete();

            DB::commit();
            Session::flash('success', 'Data Pengajuan Berhasil Di Hapus');
        }
        catch (Exception $e) {
            DB::rollback();
            Session::flash('error', 'Opss terjadi kesalahan');
        }

        return redirect()->route('user-profil');
    }

    public function user_pengajuan_detail($slug)
    {
        $user=array();
        if(!Auth::check()){
            Session::flash('fail', 'Silahkan Login/Register Terlebih Dahulu');
            return redirect('user-login'); 
        }
        
        $user=User::where('id',Auth::user()->id)->with('identitas')->first();
        $pengajuan = PengajuanBaru::where('register_id',$user->identitas->id)
                        ->with('skema')
                        ->with('nilai_kolom')
                        ->with('kolom_skema')
                        ->with('dokumen')
                        ->with('syarat')
                        ->get();

        $syarats = array();
        $dokumens = array();
        $koloms = array();
        $nilais = array();

        foreach($pengajuan as $index => $value)
        {
            if(isset($value->syarat))
            {
                foreach($value->syarat as $key => $item)
                {
                    $syarats[$item->id]=$item;
                }
            }
            
            if(isset($value->dokumen))
            {
                foreach($value->dokumen as $key => $item)
                {
                    $dokumens[$item->persyaratan_id]=$item;
                }
            }
            
            if(isset($value->kolom_skema))
            {
                foreach($value->kolom_skema as $key => $item)
                {
                    $koloms[$item->id]=$item;
                }
            }
            
            if(isset($value->nilai_kolom))
            {
                foreach($value->nilai_kolom as $key => $item)
                {
                    $nilais[$item->kolom_id]=$item;
                }
            }
        }
        
        // return $nilais;
        
        return view('frontend.pages.user.pengajuan-detail')
                    ->with('user',$user)
                    ->with('syarats',$syarats)
                    ->with('dokumens',$dokumens)
                    ->with('koloms',$koloms)
                    ->with('nilais',$nilais)
                    ->with('pengajuan',$pengajuan);
    }

    public function login_sso()
    {
        if(!SSO::check())
        {
            SSO::authenticate();
        }

        $user = SSO::getUser();
        $data['user'] = $user;
        return $data;

        // Staff
        // username: "tri.nuraeni",
        // name: "Tri Nuraeni Andayani",
        // role: "staff",
        // nip: "100220310291802891"
        
        // Mahasiswa
        // "username": "fachran.nazarullah",
        // "name": "Fachran Nazarullah",
        // "role": "mahasiswa",
        // "npm": "2006494294",
        // "org_code": "05.03.04.01",
        // "faculty": "TEKNIK",
        // "study_program": "Teknik Elektro (Electrical Engineering)",
        // "educational_program": "S2 (Graduate Program)"

    }

    public function logout_sso()
    {
        return SSO::logout(url('user-login'));
    }
}
