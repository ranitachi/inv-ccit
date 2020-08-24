@extends('layouts.frontend')

@section('title')
   Ganti Password
@endsection

@section('content')
    <!--section --> 
        <div class="content" class="mt-20">
                    <section id="sec1">
                        <!-- container -->
                        <div class="container">
                            <!-- profile-edit-wrap -->
                            <div class="profile-edit-wrap">
                                <div class="profile-edit-page-header">
                                    <h2>Profil Pengguna</h2>
                                    <div class="breadcrumbs">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        @include('frontend.pages.user.sidebar')
                                    </div>
                                    <div class="col-md-6">
                                            @if (Session::has('success'))
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="notification success fl-wrap text-left">
                                                            {{ Session::get('success') }}
                                                            <a class="notification-close" href="#"><i class="fa fa-times"></i></a>
                                                        </div>  
                                                    </div>
                                                </div>
                                            @endif
                                            @if (Session::has('fail'))
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="notification danger fl-wrap text-left">
                                                            {{ Session::get('fail') }}
                                                            <a class="notification-close" href="#"><i class="fa fa-times"></i></a>
                                                        </div>  
                                                    </div>
                                                </div>
                                            @endif
                                            {{-- @if ($user->flag_active==0)
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="notification warning fl-wrap">
                                                            <b><i class="fa fa-exclamation-triangle"></i> Akun Anda Belum Di Verifikasi Oleh Admin</b>
                                                        </div>  
                                                    </div>
                                                </div>
                                            @endif --}}
                                           
                                            @if ($errors->any())
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="notification danger fl-wrap text-left text-white">
                                                            @foreach ($errors->all() as $error)
                                                                <p class="text-danger">{{ $error }}</p>
                                                            @endforeach 
                                                            <a class="notification-close" href="#"><i class="fa fa-times"></i></a>
                                                        </div>  
                                                    </div>
                                                </div>
                                            @endif
                                                <div class="dashboard-list-box fl-wrap activities">
                                                   
                                                    <div class="pdrl-15">
                                                        <form method="post" id="form-pengajuan" data-parsley-validate="" action="{{ route('user-change-pass-save') }}" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="row">
                                                                
                                                                <div class="col-md-12">
                                                                    <div class="custom-form">
                                                                        <div class="mb-20 f-left w-100 mt-20">
                                                                            <label>Old Password</label>
                                                                            <input type="text" name="current_password" required data-parsley-error-message="Password Lama Wajib Diisi">
                                                                        </div>
                                                                        <div class="mb-20 w-100 f-left">
                                                                            <label>New Password</label>
                                                                            <input type="text" name="new_password" required data-parsley-error-message="Password Baru Wajib Diisi">
                                                                        </div>
                                                                        
                                                                        <div class="mb-20 w-100 f-left">
                                                                            <label>Confirm New Password</label>
                                                                            <input type="text" name="new_confirm_password" required data-parsley-error-message="Konfrimasi Password Baru Wajib Diisi">
                                                                        </div>
                                                                        
                                                                      
                                                                        
                                                                       
                                                                    </div>
                                                                </div>
                                                                    <div class="col-md-12">
                                                                        <div class="mb-20 f-left w-100 pointer">
                                                                            <button type="submit" class="btn big-btn  color-bg flat-btn pull-right">Save Password<i class="fa fa-save"></i></button>
                                                                        </div>
                                                                    </div>
                                                            </div>  
                                                            
                                                        </form>
                                                    </div>
                                                </div>
                                                                               
                                                                              
                                    </div>
                                    <div class="col-md-3">
                                        
                                    </div>
                                </div>
                            </div>
                            <!--profile-edit-wrap end -->
                        </div>
                        <!--container end -->
                    </section>
                    <!-- section end -->
        </div>                    
@endsection
                    
@section('csslink')
   <link href="{{ asset('css') }}/select2.min.css" rel="stylesheet" />

@endsection
@section('script')
    <script type="text/javascript" src="{{ asset('js') }}/parsley.min.js"></script>   
    <script type="text/javascript" src="{{ asset('js') }}/select2.min.js"></script>
    <script type="text/javascript" src="{{ asset('js') }}/jquery.mask.min.js"></script>
    <script >
        $(document).ready( function () {
            $('#form-pengajuan').parsley();
            
        } );
        
    </script>
    <style >
            .parsley-required,
            .parsley-custom-error-message{
                color:#ff0000;
            }
            .custom-form input
            {
                margin-bottom:0px !important;
                padding-left:15px !important;
                width:100%
            }
            .select2-selection
            {
                text-align: left !important;
                border:1px #ccc solid !important;
                height:30px !important;
            }
            .select2-results__group{
                font-weight: bold !important;
                color:#2F3B59 !important;
            }
            .select2-results__option
            {
                text-align: left !important;
                padding-left:2em !important;
                color:blue !important;
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