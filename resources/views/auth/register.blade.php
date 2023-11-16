@extends('layouts.master-without-nav')
@section('title')
    @lang('translation.Register')
@endsection

<?php
use App\Models\Country;
$country = Country::all();
?>

<body>
    <style>
        .custom-control-label {
            /* padding-top: 4px; */
        }
    </style>
    @section('content')
    {{-- <div class="home-btn d-none d-sm-block">
        <a href="{{ url('index') }}" class="text-dark"><i class="fas fa-home h2"></i></a>
    </div>
    <div class="account-pages mt-20">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="col-12">
                        <a href="{{url('/')}}"><img src="{{asset('assets/images/valyou_x_black_logo.svg')}}" alt="" class="img-fluid logo-img"></a>
                        </div>
                        <div class="card-body pt-0">
                            <div class="p-2">
                                <form method="POST" class="form-horizontal mt-4" action="{{ route('register') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" id="timezone" name="timezone" value="">
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" required name="first_name" id="first_name" placeholder="{{ ucwords(str_replace('_',' ','first_name')) }}">
                                        @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" required name="last_name" id="last_name" placeholder="{{ ucwords(str_replace('_',' ','last_name')) }}">
                                        @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="useremail" name="email" required placeholder="E-mail">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number') }}" id="phone_number" name="phone_number" required placeholder="Phone number">
                                        @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required id="userpassword" placeholder="Choose Password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input id="password-confirm" type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" required placeholder="Confirm Password">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" max="{{ date('m/d/Y') }}" class="form-control @error('dob') is-invalid @enderror" name="dob" required id="datepicker" placeholder="Date of Birth" value="{{ old('dob') }}" onmouseenter="(this.type='date')" onblur="if(this.value==''){this.type='text'}" >
                                        <!-- <input type="text" max="{{ date('m/d/Y') }}" class="form-control @error('dob') is-invalid @enderror" name="dob" required id="datepicker1" placeholder="Date of Birth" value="{{ old('dob') }}" readonly="true" onfocus="this.removeAttribute('readonly'); this.type='date';this.setAttribute('onfocus','');this.blur();this.focus();" onblur="if(this.value==''){this.type='text'}" > -->
                                        @error('dob')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-file">
                                            <select class="form-control" name="country">
                                                <option value="">Select country</option>
                                                @foreach($country as $row)
                                                <option value="{{ $row->cnt_code }}">{{ $row->cnt_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('avatar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" class="form-control custom-file-input @error('avatar') is-invalid @enderror" name="avatar" required id="avatar">
                                            <label class="custom-file-label" for="avatar">Profile Image</label>
                                            @error('avatar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div> -->

                                    <!-- <input type="file" class="dropify" accept=".png,.jpeg,.jpg" data-default-file="" data-allowed-file-extensions='["png", "jpg", "jpeg"]' /> -->

                                    <div class="card">
                                        <div class="body">
                                            <input type="file" id="name" class="dropify" name="avatar" required accept=".png,.jpeg,.jpg" data-default-file="" data-allowed-file-extensions='["png", "jpg", "jpeg"]' />
                                            @error('avatar')
                                            <span class="text-red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" value="1" class="custom-control-input" name="customControlInline" id="customControlInline" required>
                                        <label class="custom-control-label register" for="customControlInline">By registering I agree to the Valyou X. <a href="#" class="text-primary">Terms of Use</a></label>
                                    </div>

                                    <div class="mt-4">
                                        <button class="btn-block waves-effect waves-light btn-right" type="submit"><img width="120" src="{{ asset('assets/images/register-btn.svg') }}" alt="">
                                        </button>
                                    </div>

                                    <div class="mt-4 text-center">
                                        <h5 class="font-size-14 mb-3">Sign up with</h5>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a href="#" class="social-list-item bg-primary text-white border-primary">
                                                    <i class="mdi mdi-facebook"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#" class="social-list-item bg-info text-white border-info">
                                                    <i class="mdi mdi-twitter"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#" class="social-list-item bg-danger text-white border-danger">
                                                    <i class="mdi mdi-google"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    <!-- <div class="mt-5 text-center">
                        <p>Already have an account ? <a href="{{ url('login') }}" class="font-weight-medium text-primary"> Login </a></p>
                        <p>©
                            <script>
                                document.write(new Date().getFullYear())

                                var timezone_offset_minutes = new Date().getTimezoneOffset();
                                timezone_offset_minutes = timezone_offset_minutes == 0 ? 0 : -timezone_offset_minutes;
                                document.getElementById("timezone").value = timezone_offset_minutes;
                            </script>
                            Valyou X <i class="mdi mdi-heart text-danger"></i> Powered by Blockchain Technology
                        </p>
                    </div> -->
                    <div class="mt-5 text-center">
                        <p>Already have an account ? <a href="{{ url('login') }}" class="font-weight-medium text-primary"> Login </a></p>
                        <p>© {{ date('Y') }} Valyou X <i class="mdi mdi-heart text-danger"></i> Powered by Blockchain Technology
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="row logo-div">
        <div class="col-md-5 col-lg-3">
            <a href="{{url('/')}}"> <img src="{{asset('assets/images/valyou_x_black_logo.svg')}}" alt="" class="img-fluid logo-img"></a>
        </div>
    </div>
    <div class="flex h-min80">
        <div class="container m-auto w-min80">
            <div class="row mx-auto">
                <div class="col-md-6 col-sm-12 col-xs-12 flex">
                    <div class="pl-3 m-auto">
                        <p class="font-weight-bold intro-text">Welcome to <span class="financial_stk">Valyou X</span></p>
                        <p class="lead font-weight-bold text-darkred" >Be the first to know when we launch!</p>
                        <div class="lead ms_desc">If you’re interested in participating as an early adopter, you can fill out the survey and apply to get exclusive access. We have over 50,000+ in our email list would you like to skip the queue?</div>
                        <br>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 ">
                    <div class="p-4">
                        <form method="POST" class="form-horizontal mt-4" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="timezone" name="timezone" value="">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" required name="first_name" id="first_name" placeholder="{{ ucwords(str_replace('_',' ','first_name')) }}">
                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" required name="last_name" id="last_name" placeholder="{{ ucwords(str_replace('_',' ','last_name')) }}">
                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="useremail" name="email" required placeholder="Email Address">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required id="userpassword" placeholder="Choose Password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <input id="password-confirm" type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" required placeholder="Confirm Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="tel" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number') }}" id="phone_number" name="phone_number" required placeholder="Phone number">
                                @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="text" max="{{ date('m/d/Y') }}" class="form-control @error('dob') is-invalid @enderror" name="dob" required id="datepicker" placeholder="Date of Birth" value="{{ old('dob') }}" onmouseenter="(this.type='date')" onblur="if(this.value==''){this.type='text'}" >
                                <!-- <input type="text" max="{{ date('m/d/Y') }}" class="form-control @error('dob') is-invalid @enderror" name="dob" required id="datepicker1" placeholder="Date of Birth" value="{{ old('dob') }}" readonly="true" onfocus="this.removeAttribute('readonly'); this.type='date';this.setAttribute('onfocus','');this.blur();this.focus();" onblur="if(this.value==''){this.type='text'}" > -->
                                @error('dob')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="custom-file">
                                    <select class="form-control" name="country">
                                        <option value="">Select country</option>
                                        @foreach($country as $row)
                                        <option value="{{ $row->cnt_code }}">{{ $row->cnt_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('avatar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="card upload-avatar">
                                <div class="body ">
                                    <input type="file" id="name" class="dropify" name="avatar" required accept=".png,.jpeg,.jpg" data-default-file="" data-allowed-file-extensions='["png", "jpg", "jpeg"]' />
                                    @error('avatar')
                                    <span class="text-red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" value="1" class="custom-control-input" name="customControlInline" id="customControlInline" required>
                                <label class="custom-control-label register" for="customControlInline">By registering I agree to the Valyou X. <a href="#" class="text-primary">Terms of Use</a></label>
                            </div>

                            <div class="mt-4">
                                <button type="submit" width="100%" class="btn btn-primary w-full b-shadow font-weight-bold mt-2 mb-5">SIGN UP</button>
                            </div>

                        </form>
                        <p class="lead text-center font-weight-bold">Already have an account ?<a href="{{ url('login') }}"
                            class="font-weight-bold text-primary"> Login now </a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('script')
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <!-- file upload -->
    <script src="{{ URL::asset('assets/libs/dropify/js/dropify.js') }}"></script>
    <script>
         $(function () {
            $('.dropify').dropify({
                messages: {
                    'default': 'Upload your profile image',
                    'replace': 'Drag and drop or click to replace',
                    'remove':  'Remove',
                    'error':   'Ooops, something wrong happended.'
                }
            });
        })
    </script>
    @endsection
