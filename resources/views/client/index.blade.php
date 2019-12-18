@extends('layouts.app')

@section('title', 'Clients')

@section('content')
<div class="row">
    <div class="col-lg-12"></div>
    <div class="col-md-12">
        <div class="card card-table">
            <div class="card-body">
                <div class="col-lg-12 ">
                    <form>
                        <div class="row">
                            <div class="card-header mb-1">
                                <a href="{{ url('createClient') }}" style=""
                                    class="btn text-white btn-space btn-primary float-right"><i
                                        class="icon icon-left mdi mdi-plus"></i> Create New Account</a>
                            </div>
                        </div>
                    </form>
                </div>
                <table class="row-clickable table table-striped table-hover">
                    <thead>
                        <tr>
                            <th style="width:5%;">ID</th>
                            <th style="width:25%;">Name</th>
                            <th style="width:25%;">Default rate</th>
                            <th style="width:25%;">Offers</th>
                            {{-- <th style="width:25%;">Active Projects</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clients as $client)
                        <tr>
                            <td>{{ $client->id }}</td>
                            <td>{{ $client->name}}</td>
                            <td>{{$client->default_price}}</td>
                            {{-- <td>{{$client->offers->count()}}</td> --}}
                            @endforeach
                            @if (count($clients) <= 0) <tr class='clickable-row' data-href='url://'>
                                <td colspan="3" style="text-align: center;">No results</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
