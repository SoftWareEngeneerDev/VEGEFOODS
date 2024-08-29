@extends('layouts.appadmin')
@section('titre')
    Editer Slider
@endsection

@section('AdminContent')
        <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Editer Slider</h4>
                    {!! Form::open(['action'=>['SliderController@sauvermodifslider',$slider->id],'method'=>'POST', 'class'=>'cmxform',
                    'id'=>'commentForm','enctype'=>'multipart/form-data' ]) !!}
                      {{ csrf_field() }}
                        {{ Form::hidden('id',$slider->id) }}
                      <div class="form-group">
                        {{ Form::label('','Description One',['for'=>'cname']) }}
                        {{ Form::text('description2',$slider->description1,['class'=>'form-control', 'id'=>'cname']) }}
                      </div>

                      <div class="form-group">
                        {{ Form::label('','Description Two',['for'=>'cname']) }}
                        {{ Form::text('description1',$slider->description1,['class'=>'form-control', 'id'=>'cname']) }}
                      </div>


                      <div class="form-group">
                        {{ Form::label('','Image',['for'=>'cname']) }}
                        {{ Form::file('slider_image',['class'=>'form-control', 'id'=>'cname']) }}
                      </div>

                    {{ Form::submit('Modifier',['class'=>'btn btn-primary']) }}
                {!! Form::close() !!}
                </div>
              </div>
            </div>
        </div>
@endsection

@section('scripts')
    {{--  <script src="backend/js/form-validation.js"></script>
    <script src="backend/js/bt-maxLength.js"></script>  --}}
@endsection
