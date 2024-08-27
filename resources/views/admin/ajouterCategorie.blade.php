@extends('layouts.appadmin')
@section('titre')
    Ajouter Catégorie
@endsection

@section('AdminContent')
        <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ajouter Catégorie</h4>
                  @if(Session::has('status'))
                    <div class="alert alert-success">
                        {{Session::get('status')}} 
                    </div>
                  @endif
                  @if(count($errors)>0)
                    <ul>
                        @foreach ($errors->all() as $error )
                            <div class="alert alert-danger">
                                <li>{{ $error }}</li>
                            </div>
                        @endforeach
                    </ul>
                  @endif
                    {!! Form::open(['action'=>'CategoryController@sauvercategorie','method'=>'POST', 'class'=>'cmxform',
                    'id'=>'commentForm' ]) !!}
                      {{ csrf_field() }}
                      <div class="form-group">
                       {{  Form::label('','Nom de la Catégorie',['for'=>'cname'])  }}
                       {{  Form::text('category_name','',['class'=>'form-control', 'id'=>'cname']) }}
                      </div>
                   {{  Form::submit('Ajouter',['class'=>'btn btn-primary']) }}
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
