@extends('layouts.appadmin')
@section('titre')
    Slider
@endsection
{{  Form::hidden('', $increment=1) }}

@section('AdminContent')
        <div class="card">
            <div class="card-body">
            <h4 class="card-title">Sliders</h4>
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
                                <th>Description One</th>
                                <th>Description Two</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sliders as $slider)
                                <tr>
                                    <td>{{ $increment }}</td>
                                    <td><img src="{{ asset('/storage/Slider_images/'.$slider->slider_image) }}" alt=""></td>
                                    <td>{{ $slider->description1 }}</td>
                                    <td>{{ $slider->description2 }}</td>
                                    <td>
                                        @if( $slider->status == 1 )
                                            <label class="badge badge-success">Activé</label>
                                        @else
                                            <label class="badge badge-danger">Désactivé</label>
                                        @endif
                                    </td>
                                    <td>
                                        <button onclick="window.location='{{ url('/edit_slider/'.$slider->id) }}'" class="btn btn-outline-primary">View</button>
                                        <a href="{{ url('/supprimerslider/'.$slider->id) }}" class="btn btn-outline-danger" id="delete">Delete</a>
                                        {{--  <button class="btn btn-outline-danger">Delete</button>  --}}
                                    @if($slider->status == 1)
                                        <button onclick="window.location='{{ url('/desactiver_slider/'.$slider->id) }}'" class="btn btn-outline-warning">Désactivé</button>
                                    @else
                                        <button onclick="window.location='{{ url('/activer_slider/'.$slider->id) }}'" class="btn btn-outline-success">Activé</button>
                                    @endif
                                    </td>

                                </tr>
                                {{  Form::hidden('', $increment=$increment+1) }}
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
