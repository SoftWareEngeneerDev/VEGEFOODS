@extends('layouts.appadmin')
@section('titre')
    Catégorie
@endsection

@section('AdminContent')
        <div class="card">
            <div class="card-body">
            <h4 class="card-title">Catégories</h4>
            <div class="row">
                <div class="col-12">
                <div class="table-responsive">
                    <table id="order-listing" class="table">
                    <thead>
                        <tr>
                            <th>Order </th>
                            <th>Nom de la Catégorie On</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Nom</td>
                            {{--  <td>
                            <label class="badge badge-info">On hold</label>
                            </td>  --}}
                            <td>
                                <button class="btn btn-outline-primary">View</button>
                            </td>
                        </tr>
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
