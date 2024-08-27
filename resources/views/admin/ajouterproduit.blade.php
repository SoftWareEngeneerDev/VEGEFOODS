@extends('layouts.appadmin')
@section('titre')
    Ajouter Produit
@endsection

@section('AdminContent')
    <div class="row grid-margin">
        <div class="col-lg-12">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ajouter Produit</h4>
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
            {!! Form::open(['action'=>'ProductController@sauverproduit','method'=>'POST', 'class'=>'cmxform',
                'id'=>'commentForm','enctype'=>'multipart/form-data']) !!}
                    {{ csrf_field() }}

                    <div class="form-group">
                        {{ Form::label('','Nom du Produit',['for'=>'cname']) }}
                        {{ Form::text('product_name','',['class'=>'form-control', 'id'=>'cname']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('','Prix du Produit',['for'=>'cname']) }}
                        {{ Form::number('product_price','',['class'=>'form-control', 'id'=>'cname']) }}
                    </div>

                    <div class="form-group">
                            {{ Form::label('','Catégorie du Produit',['for'=>'cname']) }}
                            {{ Form::select('product_category',$categorie,null,
                                ['class'=>'form-control', 'id'=>'cname']) }}
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
@endsection

@section('scripts')
    {{--  <script src="backend/js/form-validation.js"></script>
    <script src="backend/js/bt-maxLength.js"></script>  --}}
@endsection
