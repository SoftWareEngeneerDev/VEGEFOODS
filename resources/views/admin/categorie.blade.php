@extends('layouts.appadmin')
@section('titre')
    Catégorie
@endsection
{{ Form::hidden('',$increment=1) }}
@section('AdminContent')
        <div class="card">
            <div class="card-body">
            <h4 class="card-title">Catégories</h4>
            <div class="row">
                <div class="col-12">
                <div class="table-responsive">
                    <table id="order-listing" class="table">
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
                    <thead>
                        <tr>
                            <th>Order </th>
                            <th>Nom de la Catégorie</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $categorie )
                            <tr>
                                <td>{{ $increment }}</td>
                                <td>{{ $categorie->Category_name }}</td>
                                {{--  <td>
                                <label class="badge badge-info">On hold</label>
                                </td>  --}}
                                <td>
                                    <button onclick="window.location='{{ url('/edit_categorie/'.$categorie->id) }}'" class="btn btn-outline-primary">View</button>
                                    <a class="btn btn-outline-danger" id="delete" href="{{ url('/supprimercategorie/'.$categorie->id) }}">Delete</a>
                                </td>
                            </tr>
                            {{ Form::hidden('',$increment=$increment+1) }}
                        @endforeach
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
            </div>
        </div>
@endsection

@section('scripts')
    <script src="backend/js/data-table.js"></script>
@endsection
