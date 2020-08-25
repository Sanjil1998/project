@extends('layouts.layout')

@section('content')
        <div class="container content-lg">
            <div class="row">
                <h3>Experiences</h3>
                <div class="col-md-12">
                     <div class="row row-space-2 margin-b-4">
                        @foreach($experience as $experiences)
                        <div class="col-md-3 md-margin-b-4">
                            <div class="service" data-height="height">
                                <div class="service-element">
                                    <i class="service-icon icon-badge"></i>
                                </div>
                                <div class="service-info">
                                    <h3>{{$experiences->experience_title}}</h3>
                                    <p class="margin-b-5">{{$experiences->experience_description}}</p>
                                </div>
                                <a href="#" class="content-wrapper-link" data-toggle="modal" data-target="#modal_{{$experiences->id}}"></a>
                                <div class="modal fade" id="modal_{{$experiences->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h3 class="modal-title" id="exampleModalLongTitle">{{$experiences->experience_title}}</h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <p>{!!$experiences->experience_description!!}</p>
                                        <p>{!!$experiences->experience_duties!!}</p>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hide</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>



        </div>



@endsection


