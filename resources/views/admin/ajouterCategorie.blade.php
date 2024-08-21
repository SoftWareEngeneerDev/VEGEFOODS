@extends('layouts.appadmin')
@section('titre')
    Ajouter Catégorie
@endsection

@section('AdminContent')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ajouter Catégorie</h4>
                    {!! Form::open(['action'=>'CategoryController@sauvercategorie','method'=>'POST', 'class'=>'cmxform',
                    'id'=>'commentForm' ]) !!}
                      {{ csrf_field() }}
                      <div class="form-group">
                        {!! Form::label('','Nom de la Catégorie',['for'=>'cname']) !!}
                        {!! Form::text('category_Name','',['class'=>'form-control', 'id'=>'cname']) !!}
                      </div>
                      {{--  <div class="form-group">
                        <label for="cemail">E-Mail (required)</label>
                        <input id="cemail" class="form-control" type="email" name="email" required>
                      </div>
                      <div class="form-group">
                        <label for="curl">URL (optional)</label>
                        <input id="curl" class="form-control" type="url" name="url">
                      </div>
                      <div class="form-group">
                        <label for="ccomment">Your comment (required)</label>
                        <textarea id="ccomment" class="form-control" name="comment" required></textarea>
                      </div>  --}}
                      {{--  <input class="btn btn-primary" type="submit" value="Submit">  --}}
                    {!! Form::submit('Ajouter',['class'=>'btn btn-primary']) !!}
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
