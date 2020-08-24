@extends('layouts.frontend')

@section('title')
   Profile Page
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
                                            @if (Session::has('error'))
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="notification danger fl-wrap text-center text-white">
                                                            <b class="text-putih">There {{ count($error) }} Error, Please Check Carefully</b>
                                                            <a class="notification-close" href="#"><i class="fa fa-times"></i></a>
                                                        </div>  
                                                    </div>
                                                </div>
                                            @endif
                                                <div class="dashboard-list-box fl-wrap activities">
                                                   
                                                    <div class="pdrl-15">
                                                        <form method="post" id="form-pengajuan" data-parsley-validate="" action="{{ route('user-update') }}" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="row">
                                                                
                                                                <div class="col-md-12">
                                                                    <div class="custom-form">
                                                                        <div class="mb-20 f-left w-100 mt-20">
                                                                            <label>Name</label>
                                                                            <input type="text" name="nama_lengkap"  data-parsley-error-message="Nama Pengaju Wajib Diisi" value="{{ $user->name }}">
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="mb-20 w-100 f-left">
                                                                                    <label>Email 1</label>
                                                                                    <input type="text" name="email" id="email" value="{{ $user->email }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="mb-20 w-100 f-left">
                                                                                    <label>Email 2</label>
                                                                                    <input type="text" name="email2" id="email2" value="{{ $user->trainee->email2 }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="mb-20 w-100 f-left">
                                                                                    <label>Mobile Phone</label>
                                                                                    <input type="text" name="phone" id="phone" value="{{ $user->phone }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="mb-20 w-100 f-left">
                                                                                    <label>Fixed Phone</label>
                                                                                    <input type="text" name="fixed_phone" id="fixed_phone" value="{{ $user->trainee->fixed_phone }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        
                                                                        <div class="mb-20 w-100 f-left">
                                                                            <label> Address</label>
                                                                            <textarea cols="20" rows="1" name="address" class="hg-80">{{ $user->trainee->address }}</textarea>
                                                                        </div>
                                                                        
                                                                       <div class="mb-20 f-left w-100">
                                                                            <label> Gender</label>
                                                                            <select name="jenis_kelamin" class="select2">
                                                                                <option value="">Choose</option>
                                                                                <option value="M" {{ $user->trainee->gender == 'M' ? 'selected="selected"' : '' }}>Male</option>
                                                                                <option value="F" {{ $user->trainee->gender == 'F' ? 'selected="selected"' : '' }}>Female</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="mb-20 w-100 f-left">
                                                                                    <label>Birthday Place</label>
                                                                                    <input type="text" name="birthday_place" value="{{ $user->trainee->birthday_place }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="mb-20 w-100 f-left">
                                                                                    <label>Birthday Date</label>
                                                                                    <input type="date" name="birthday_date" value="{{ $user->trainee->birthday_date }}">  
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                      
                                                                        <div class="mb-20 f-left w-100 mt-20">
                                                                            <label>ID Card <small>(.png, .jpg)&nbsp;<span class="f-italic fz-11">*Leave Blank if not change ID Card (Max 2 MB)</span></label>
                                                                            <input type="file" onchange="loadFile(event,'output-ktp')" name="ktp" accept=".png,.jpg">
                                                                            <span class="error-text {{ isset($error['ktp']) ? 'show' : 'hidden' }}">{{ isset($error['ktp']) ? $error['ktp'][0] : '' }}</span>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                    <div class="col-md-12">
                                                                        <div class="mb-20 f-left w-100 pointer">
                                                                            <button type="submit" class="btn big-btn  color-bg flat-btn pull-right">Save Profile<i class="fa fa-save"></i></button>
                                                                        </div>
                                                                    </div>
                                                            </div>  
                                                            
                                                        </form>
                                                    </div>
                                                </div>
                                                                               
                                                                              
                                    </div>
                                    <div class="col-md-3">
                                        <div class="edit-profile-photo fl-wrap">
                                           <h2>KTP</h2>
                                           @if($user->id_card!='')
                                                <img src="{{ url('show-file/'.$user->id_card) }}" class="respimg" alt="" id="output-ktp">
                                           @else
                                                <img src="{{ URL::asset('1.jpg') }}" class="respimg" alt="" id="output-ktp">
                                           @endif
                                        </div>
                                        <span class="section-separator"></span>
                                      
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
            $('.select2').select2({
                width:'100%'
            })
            $('#nomor_kk').mask('0000000000000000');
            $('#nik').mask('0000000000000000');
            
        } );
        var loadFile = function(event,selector) {
            var output = document.getElementById(selector);
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
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