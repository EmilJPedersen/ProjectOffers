@extends('layouts.app')

@section('title', 'Clients')
{{-- @section('title') --}}

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
                                        class="icon icon-left mdi mdi-plus"></i> Create New Client</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card card-border-color card-border-color-primary">
                    <table class="row-clickable table table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="col-md-2">CVR test</th>
                                <th class="col-md-4">Name</th>
                                <th class="col-md-1">Default rate</th>
                                <th class="col-md-1">Offers</th>
                                {{-- <th class="col-md-1"></th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clients as $client)
                            <tr>
                                <td>{{ $client->CVR }}</td>
                                <td>{{ $client->Client_Name}}</td>
                                <td>{{ $client->Default_Price}}</td>
                                <td><a href="{{ route('viewOffer', $client->CVR) }}"
                                    class="btn text-white btn-space btn-primary float-right"><i
                                        class="icon icon-left mdi mdi-plus"></i>Offers</a></td>
                                {{-- <td><a href="{{ route('client',$client->CVR) }}"
                                    class="btn text-white btn-space btn-primary float-right"><i
                                        class="fa fa-trash"></i> delete</a></td> --}}
                                {{-- @if (count($clients) <= 0) <tr class='clickable-row' data-href='url://'>
                                    <td colspan="3" style="text-align: center;">No results</td>
                                @endif --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
