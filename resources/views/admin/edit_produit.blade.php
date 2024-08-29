@extends('layouts.appadmin')
@section('titre')
    Editer Produit
@endsection

@section('AdminContent')
    <div class="row grid-margin">
        <div class="col-lg-12">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">Editer Produit</h4>
                    @if(Session::has('status'))
                        <div class="alert alert-success">
                            {{Session::get('status')}}
                        </div>
                    @endif

                    {!! Form::open(['action'=>['ProductController@sauvermodifproduit',$product->id],
                        'method'=>'POST', 'class'=>'cmxform','id'=>'commentForm', 'enctype'=>'multipart/form-data' ]) !!}
                            {{ csrf_field() }}
                                {{ Form::hidden('id',$product->id) }}
                            <div class="form-group">
                                {{ Form::label('','Nom du Produit',['for'=>'cname']) }}
                                {{ Form::text('product_name',$product->Product_name,['class'=>'form-control', 'id'=>'cname']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('','Prix du Produit',['for'=>'cname']) }}
                                {{ Form::number('product_number',$product->Product_price,['class'=>'form-control', 'id'=>'cname']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('','Catégorie du Produit',['for'=>'cname']) }}
                                {{ Form::select('category_name',$categorie,$product->Product_category,['class'=>'form-control', 'id'=>'cname']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('','Image',['for'=>'cname']) }}
                                {{ Form::file('product_image',['class'=>'form-control', 'id'=>'cname']) }}
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
