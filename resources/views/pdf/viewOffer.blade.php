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
                                <a href="{{ url('createOffer') }}" style=""
                                    class="btn text-white btn-space btn-primary float-right"><i
                                        class="icon icon-left mdi mdi-plus"></i> Create New Offer</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card card-border-color card-border-color-primary">
                    <table class="row-clickable table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>OID</th>
                                <th>Offer_Name</th>
                                <th>Offer Description</th>
                                <th>CVR</th>
                                <th>Link</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($offers as $offer)
                            <tr>
                                <td>{{ $offer->OID }}</td>
                                <td>{{ $offer->Offer_Name}}</td>
                                <td>{{ $offer->Offer_Description}}</td>
                                <td>{{ $offer->CVR }}</td>
                                <td><a href="{{ route('viewTask', $offer->OID) }}" style=""
                                    class="btn text-white btn-space btn-primary float-right"><i
                                        class="icon icon-left mdi mdi-plus"></i> Tasks</a></td>

                                @if (count($offers) <= 0) <tr class='clickable-row' data-href='url://'>
                                    <td colspan="3" style="text-align: center;">No results</td>
                                @endif
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
