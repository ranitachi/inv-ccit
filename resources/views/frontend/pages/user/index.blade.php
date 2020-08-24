@extends('layouts.frontend')

@section('title')
   Login Page
@endsection

@section('content')
    <div class="content">
         <section class="parallax-section" data-scrollax-parent="true">
            <div class="bg par-elem bg-ps" data-bg="{{ asset('images/kab-tng.jpg') }}" data-scrollax="properties: { translateY: '30%' }" ></div>
            <div class="overlay"></div>
            <div class="container">
                <div class="section-title center-align">
                    <h2>Login Page</h2>
                    <div class="breadcrumbs fl-wrap"><a href="{{ url('/') }}">Beranda</a><span>Login</span></div>
                    <span class="section-separator"></span>
                </div>
            </div>
        </section>
        <section class="" id="sec1">
            <div class="container unset-max-width">
                            <div class="row">
                                <div class="col-md-4">&nbsp;</div>
                                <div class="col-md-4">
                                    <div class="list-single-main-item">
                                        @if (Session::has('fail'))
                                            <div class="row mb-20">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="notification danger fl-wrap text-center text-white">
                                                                <b class="text-putih">{{ Session::get('fail') }}</b>
                                                                <a class="notification-close" href="#"><i class="fa fa-times"></i></a>
                                                            </div>  
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        
                                        <div id="">
                                            {{-- <ul class="tabs">
                                                <li class="{{ $tab=='login' ? 'current' : '' }}"><a href="{{ url('user-login') }}">Login</a></li>
                                                <li class="{{ $tab=='register' ? 'current' : '' }}"><a href="{{ url('user-login?tab=register') }}">Register</a></li>
                                            </ul> --}}
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                    <a href="{{ url('user-login') }}" class="btn big-btn color-bg flat-btn  mrl-5">Login</a>
                                                </div>
                                                {{-- <div class="col-md-6 col-sm-6 col-xs-6">
                                                    <a href="{{ url('user-login?tab=register') }}" class="btn big-btn  color-bg flat-btn  mrl-5">Register</a>
                                                </div> --}}
                                            </div>
                                        </div>
                                     </div>
                                            <div class="list-single-main-item {{ $tab=='login' ? 'show' : 'hidden' }}">
                                                <div id="tab-1" class="row">
                                                    <p>Please Input Email dan Password</p>
                                                    <div class="custom-form">
                                                        <form method="post" name="login-form" id="login-form" data-parsley-validate="" action="{{ route('login-proses') }}">
                                                            @csrf
                                                            <div class="mb-10 f-left w-100">
                                                                <label>Email * </label>

                                                                <input name="email" type="text" required data-parsley-error-message="Email Field Required"> 
                                                                @error('email')
                                                                    <span class="parsley-custom-error-message" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="pt-10 f-left w-100">
                                                                <label>Password * </label>

                                                                <input name="password" type="password" required data-parsley-error-message="Password Field Required"> 
                                                                @error('password')
                                                                    <span class="parsley-custom-error-message" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            {{-- <button type="submit" class="log-submit-btn pull-right"><span>Masuk</span></button>  --}}
                                                            <button type="submit" class="btn big-btn  color-bg flat-btn pull-right"><span>Log In</span></button> 
                                                            <div class="clearfix"></div>
                                                            <span class="fw-separator"></span>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list-single-main-item {{ $tab=='register' ? 'show' : 'hidden' }}">    
                                                    <div id="tab-2" class="row">
                                                        <div class="custom-form">
                                                            <form method="post"  action="{{ url('user-register') }}" name="registerform" class="main-register-form" id="form-register" enctype="multipart/form-data">
                                                                @csrf
                                                                @php
                                                                    if (Session::has('error'))
                                                                    {
                                                                        $error=array();
                                                                        $errors=Session::get('error');
                                                                        foreach ($errors as $idx=> $err)
                                                                        {
                                                                            $error[$idx]=$err;
                                                                        }
                                                                        // dd($error);
                                                                    }
                                                                @endphp

                                                                    
                                                                <div class="mb-10 f-left w-100">
                                                                    <label>Email * </label>
                                                                    <input name="email" id="email" type="text" required 
                                                                        data-parsley-error-message="Email Field Required"
                                                                        class="{{ isset($error['email']) ? 'error-line' : '' }}" 
                                                                        value="{{ old('email') }}">
                                                                    <span id="error-email" class="error-text {{ isset($error['email']) ? 'show' : 'hidden' }}">{{ isset($error['email']) ? $error['email'][0] : '' }}</span>
                                                                </div>
                                                                <div class="mb-10 f-left w-100">
                                                                    <label>Passsword *</label>
                                                                    <input name="password" type="text" required data-parsley-error-message="Password Wajib Diisi" class="{{ isset($error['nama']) ? 'error-line' : '' }}">
                                                                    <span class="error-text {{ isset($error['nama']) ? 'show' : 'hidden' }}">Password Filed Required</span>
                                                                </div>
                                                                <div class="mb-10 f-left w-100">
                                                                    <label>Name *</label>
                                                                    <input name="nama" type="text" required data-parsley-error-message="Nama Wajib Diisi" class="{{ isset($error['nama']) ? 'error-line' : '' }}" value="{{ old('nama') }}">
                                                                    <span class="error-text {{ isset($error['nama']) ? 'show' : 'hidden' }}" >Name Field Required</span>
                                                                </div>
                                                                <div class="mb-10 f-left w-100">
                                                                    <label>Mobile Number *</label>
                                                                    <input name="nomor_hp" type="text" maxlength="14" required data-parsley-error-message="Mobile Number is Required" class="{{ isset($error['nomor_hp']) ? 'error-line' : '' }}" value="{{ old('nomor_hp') }}">
                                                                    <span class="error-text {{ isset($error['nomor_hp']) ? 'show' : 'hidden' }}">Mobile Number is Required</span>
                                                                </div>
                                                                <div class="mb-10 f-left w-100">
                                                                    <label>Upload ID * (Max. 2 MB)</label>
                                                                    <input name="ktp" type="file" accept=".jpg,.png"  required data-parsley-error-message="ID Field is Required" onchange="loadFile(event,'output-ktp')" class="{{ isset($error['ktp']) ? 'error-line' : '' }}">
                                                                    <span class="error-text {{ isset($error['ktp']) ? 'show' : 'hidden' }}">{{ isset($error['ktp']) ? $error['ktp'][0] : '' }}</span>
                                                                    <img id="output-ktp" class="w-100">
                                                                </div>
                                                               
                                                                <div class="mb-10 f-left w-100">
                                                                    <label>Kode Keamanan *</label>
                                                                    <div class="row">
                                                                        <div class="col-md-5">{!! captcha_img() !!}</div>
                                                                        <div class="col-md-7">
                                                                            <input name="captcha" type="text" required data-parsley-error-message="Security Code Field is Required" class="{{ isset($error['captcha']) ? 'error-line' : '' }}">
                                                                            <span class="error-text {{ isset($error['captcha']) ? 'show' : 'hidden' }}">
                                                                                {{ isset($error['captcha']) ? $error['captcha'][0] : '' }}
                                                                            </span>
                                                                        </div>
                                                                   </div>
                                                                    
                                                                    
                                                                </div>
                                                                
                                                                {{-- <button type="submit"  class="log-submit-btn pull-right"><span>Kirim</span></button> --}}
                                                                <button type="submit" id="submit-btn"  class="btn big-btn  color-bg flat-btn pull-right"><span>Submit</span></button>
                                                                <div class="clearfix"></div>
                                                                <span class="fw-separator"></span>
                                                            </form>
                                                        </div>
                                                    </div>
                                            </div>
                                </div>
                                <div class="col-md-4">&nbsp;</div>
                            </div>
                            
                        </div>               
        </section>
    </div>
@endsection

@section('csslink')
    <style >
        section.parallax-section {
            padding: 150px 0 0px 0px !important;
        }   
        .hidden{
            display: none !important;
        }
        .show{
            display: block !important;
        }
        .error-line{
            border:1px solid red !important;
        }
        .error-text{
            color:red !important;
        }
    </style>
@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('js') }}/parsley.min.js"></script>  
    <script type="text/javascript" src="{{ asset('js') }}/jquery.mask.min.js"></script>
    <script >
        $(document).ready( function () {
            
            $('#form-register').parsley();
            $('#nik').mask('0000000000000000');
            $('#nik').on('focusout',function(){
                fn_ceknik($('#nik').val())
            });
            setTimeout(function(){
                $('.error-line').removeClass('error-line');
                $('.error-text').removeClass('show').addClass('hidden');
            },5000);

            // document.getElementById("myButton").addEventListener("click", myFunction);
        });
        var loadFile = function(event,selector) {
            var output = document.getElementById(selector);
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };

        function fn_ceknik(nik)
        {
            var isvalid=true;
            $.ajax({
                url : '{{ url("/") }}/user-cek-nik/'+$('#nik').val(),
                success:function(res){
                    if(res==1)
                    {
                        $('#error-nik').text('NIK yang anda input Sudah Terdaftar Sebelumnya');
                        $('#error-nik').removeClass('hidden').addClass('show');
                        setTimeout(function(){
                            $('#error-nik').removeClass('show').addClass('hidden');
                        },4000);

                        isvalid=false;
                    }
                    
                }
            });
            return isvalid;
        }
    </script>
@endsection