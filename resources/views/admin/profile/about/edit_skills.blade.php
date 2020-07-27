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
            <!-- OVERVIEW -->
            <div class="panel panel-headline">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Skillsets</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            {!! Form::open(['class' => '', 'enctype' => 'multipart/form-data', 'action' => ['ProfileController@update_skills', $skill->id], 'method' => 'POST']) !!}
                                 @csrf
                                 @method('PUT')
                                <div class="form-group">
                                    <label for="skill">Type of skill</label>
                                    <input type="text" name="skill_name" class="form-control" value="{{ $skill->skill_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="skill_level">Skill Level in percentage</label>
                                    <input type="number" name="skill_level" class="form-control" placeholder="0-100" value="{{ $skill->skill_level }}">
                                </div>
                                <input type="submit" value="Save" class="btn btn-primary pull-right p-5">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END OVERVIEW -->

        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->

@endsection

@section('footer')
@include('layouts.admin.footer')
@endsection





