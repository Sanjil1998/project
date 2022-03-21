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
                <div class="panel-heading">
                    <h3 class="panel-title">Overview</h3>
                    <p class="panel-subtitle">Today: {{ date('D, d M Y') }}</p>
                </div>
            </div>
            <!-- END OVERVIEW -->

            {{-- BODY CONTENT --}}
                        
            <div class="panel panel-content">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                {{-- counting number blogs --}}
                                @if (count($blogList)>0)

                                    <div class="col-md-12 col-xl-12">
                                        <article class="post">
                                            <div class="table-responsive">
                                                <table id="blog-table" class="table table-bordered" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Title</th>
                                                            <th>Author</th>
                                                            <th>Date</th>
                                                            <th>Status</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($blogList as $blogLists)
                                                        <tr>
                                                            <td class="col-md-3 col-sm-3"><a href="{{route('admin.blogs.show', $blogLists->id)}}"  style="color: #676a6d;">{{$blogLists->blog_title}}</a></td>
                                                            <td class="text-capitalize col-md-2 col-sm-2">{{$blogLists->user->name}}</td>
                                                            <td class="col-md-2 col-sm-2">{{$blogLists->created_at->format('Y-m-d')}}</td>
                                                            <td class="col-md-2 col-sm-2">
                                                                @if($blogLists->publish_status == 0)
                                                                <span>Unpublished</span>
                                                                @else
                                                                <span>Published</span>
                                                                @endif
                                                            </td>
                                                            <td class="col-md-3 col-sm-3">
                                                                <div class="col-md-2 col-sm-1 action-btn">
                                                                    <a type="button" class="btn btn-primary" href="{{route('admin.blogs.show', $blogLists->id)}}"><i class="fa fa-eye"></i></a>
                                                                </div>
                                                                <div class="col-md-2 col-sm-1 action-btn">
                                                                    <a type="button" class="btn btn-success" href="{{route('admin.blogs.edit', $blogLists->id)}}"><i class="fa fa-edit"></i></a>
                                                                </div>
                                                                <div class="col-md-2 col-sm-1 action-btn">
                                                                    {!! Form::open(['action' => ['BlogController@destroy', $blogLists->id], 'method'=>'POST', 'class' => 'pl-0 pr-0' ]) !!}
                                                                    {{Form::hidden('_method', 'DELETE')}}
                                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Confirm to delete')"><i class="fa fa-trash"></i></button>
                                                                    {!! Form::close() !!}
                                                                </div>
                                                                
                                                                
                                                                
                                                                {{-- <a type="button" class="btn btn-danger" href="{{route('admin.blogs.delete'), $blogLists->id}}"><i class="fa fa-trash"></i></a> --}}
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th colspan="5">Total Blogs: {{$totalBlogs}}</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <!--  /.article-v2 -->
                                        </article>
                                        <!--  /.post -->
                                    </div>
                                
                                @else

                                    <div class="alert">
                                        <p>Oops!! No blogs found. Write something amazing <a href="{{route('admin.blogs.create')}}" class="text-uppercase">here</a></p>
                                    </div>
                                    
                                @endif
                                
                                
                            </div>
                            <!--  /.blog-carousel -->
                        </div>
                        <!--  /.col-12 -->
                    </div>
                    <!--/.row-->
                </div>
            </div>
            
            {{-- END BODY CONTENT --}}

        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
@endsection

@section('footer')
@include('layouts.admin.footer')
@endsection
