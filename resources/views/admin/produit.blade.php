@extends('layouts.appadmin')
@section('titre')
    Produit
@endsection
{{ Form::hidden('',$increment=1) }}
@section('AdminContent')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Produits</h4>
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
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>Order </th>
                                    <th>Image</th>
                                    <th>Nom du produit</th>
                                    <th>Catégorie du produit</th>
                                    <th>Prix</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produits as $produit)
                                    <tr>
                                        <td>{{ $increment }}</td>
                                        <td><img src="{{ asset('/storage/Product_images/'.$produit->Product_image ) }}" alt=""></td>
                                        <td>{{ $produit->Product_name }}</td>
                                        <td>{{ $produit->Product_category }}</td>
                                        <td>{{ $produit->Product_price }}</td>
                                        <td>
                                            @if($produit->status == 1)
                                                <label class="badge badge-success">Activé</label>
                                            @else
                                                <label class="badge badge-danger">Désactivé</label>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('/edit_produit/'.$produit->id) }}" class="btn btn-outline-primary">View</a>
                                            {{--  <button onclick="window.location='{{ url('/edit_produit/'.$produit->id) }}'" class="btn btn-outline-primary">View</button>  --}}
                                            {{--  <button class="btn btn-outline-danger">Delete</button>  --}}
                                            <a href="{{ url('/supprimer_produit/'.$produit->id) }}" class="btn btn-outline-danger" id="delete">Delete</a>
                                        </td>
                                    </tr>
                                    {{ Form::hidden('',$increment=$increment +1) }}
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
