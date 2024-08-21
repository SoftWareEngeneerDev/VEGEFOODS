@extends('layouts.appadmin')
@section('titre')
    Ajouter Produit
@endsection

@section('AdminContent')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ajouter Produit</h4>
                    {!! Form::open(['action'=>'ProductController@sauverproduit','method'=>'POST', 'class'=>'cmxform',
                    'id'=>'commentForm' ]) !!}
                      {{ csrf_field() }}

                      <div class="form-group">
                        {{ Form::label('','Nom du Produit',['for'=>'cname']) }}
                        {{ Form::text('product_name','',['class'=>'form-control', 'id'=>'cname']) }}
                      </div>

                      <div class="form-group">
                        {{ Form::label('','Prix du Produit',['for'=>'cname']) }}
                        {{ Form::number('product_number','',['class'=>'form-control', 'id'=>'cname']) }}
                      </div>

                      <div class="form-group">
                        {{ Form::label('','Catégorie du Produit',['for'=>'cname']) }}
                        {{--  { Form::select('category_name',$categorie,['class'=>'form-control', 'id'=>'cname']) }  --}}
                      </div>

                      <div class="form-group">
                        {{ Form::label('','Image',['for'=>'cname']) }}
                        {{ Form::file('product_image',['class'=>'form-control', 'id'=>'cname']) }}
                      </div>

                    {{ Form::submit('Ajouter',['class'=>'btn btn-primary']) }}
                {!! Form::close() !!}
                </div>
              </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('scripts')
    <script src="backend/js/form-validation.js"></script>
    <script src="backend/js/bt-maxLength.js"></script>
@endsection
