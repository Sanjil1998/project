@extends('layouts.admin.admin-layout')

@section('header')
@include('layouts.admin.header')
@endsection

@section('content')

<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Profile Section</h3>
                    <p class="panel-subtitle">Today: {{ date('yy-m-d') }}</p>
                </div>
                <div class="panel-body">
                    <form action="{{route('admin.profile.store_profile')}}" method="POST" enctype="multipart/form-data" class="md-form">
                        @csrf
                        <div class="row">
                            <h3>Basic Information Section</h3>

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" placeholder="Your Name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"autofocus required="">
                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif

                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" placeholder="Your address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"autofocus required="">
                                @if ($errors->has('address'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                                @endif

                            </div>

                            <div class="form-group">
                                <label for="mailing-address">Mailing Address</label>
                                <input type="mail" name="gmail" placeholder="Your Gmail Id" class="form-control{{ $errors->has('gmail') ? ' is-invalid' : '' }}"autofocus required="">
                                @if ($errors->has('gmail'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('gmail') }}</strong>
                                </span>
                                @endif

                            </div>

                            <div class="form-group">
                                <label for="Phone">Mobile Number</label>
                                <input type="number" name="phone" placeholder="Your Mobile Number" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"autofocus required="">
                                @if ($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                                @endif

                            </div>

                            <div class="form-group">
                                <label for="dob">Date of Birth</label>
                                <input type="date" name="dob" placeholder="Your Date of Birth" class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}"autofocus>
                                @if ($errors->has('dob'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('dob') }}</strong>
                                </span>
                                @endif

                            </div>

                            <div class="form-group">
                                <label for="profile-image">Profile Image</label>
                                <input type="file" name="image" placeholder="profile image" class="form-control-file {{ $errors->has('image') ? ' is-invalid' : '' }}"autofocus>
                                @if ($errors->has('image'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </span>
                                @endif

                            </div>

                            <h3>Social Media Section</h3>

                            <div class="form-group">
                                <label for="facebook">Facebook</label>
                                <input type="text" name="facebook" placeholder="Your Facebook Id" class="form-control{{ $errors->has('facebook') ? ' is-invalid' : '' }}" autofocus>
                                @if ($errors->has('facebook'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('facebook') }}</strong>
                                </span>
                                @endif

                            </div>

                            <div class="form-group">
                                <label for="instagram">Instagram</label>
                                <input type="text" name="instagram" placeholder="Your Instagram Id" class="form-control{{ $errors->has('instagram') ? ' is-invalid' : '' }}" autofocus>
                                @if ($errors->has('instagram'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('instagram') }}</strong>
                                </span>
                                @endif

                            </div>

                            <div class="form-group">
                                <label for="twitter">Twitter</label>
                                <input type="text" name="twitter" placeholder="Your Twitter Id" class="form-control{{ $errors->has('twitter') ? ' is-invalid' : '' }}" autofocus>
                                @if ($errors->has('twitter'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('twitter') }}</strong>
                                </span>
                                @endif

                            </div>

                            <div class="form-group">
                                <label for="linkedin">LinkedIn</label>
                                <input type="text" name="linkedin" placeholder="Your LinkedIn Id" class="form-control{{ $errors->has('linkedin') ? ' is-invalid' : '' }}" autofocus>
                                @if ($errors->has('linkedin'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('linkedin') }}</strong>
                                </span>
                                @endif

                            </div>

                            <div class="pull-right pt-4">
                                <button class="btn btn-primary">Save Profile</button>
                                <input type="reset" class=" btn btn-danger">
                            </div>

                        </div>




                    </form>

                </div>
            </div>

        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->

@endsection

@section('footer')
@include('layouts.admin.footer')
@endsection
