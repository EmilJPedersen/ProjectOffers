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
                            {{-- <div class="col-12 col-lg-3 table-filters pb-xl-4">
                                <span class="table-filter-title">Account Type</span>
                                <label class="custom-control custom-checkbox custom-control-inline">
                                    <input onchange="this.form.submit()" type="radio" name="accountType" value='0'
                                        class="custom-control-input" {{ $accountType ==0 ? 'checked' : '' }}>
                                    <span class="custom-control-label">Lead</span>
                                </label>

                                <label class="custom-control custom-checkbox custom-control-inline">
                                    <input onchange="this.form.submit()" type="radio" name="accountType" value='1'
                                        class="custom-control-input" {{ $accountType ==1 ? 'checked' : '' }}>
                                    <span class="custom-control-label">Client</span>
                                </label>

                                <label class="custom-control custom-checkbox custom-control-inline">
                                    <input onchange="this.form.submit()" type="radio" name="accountType" value='2'
                                        class="custom-control-input" {{ $accountType ==2 ? 'checked' : '' }}>
                                    <span class="custom-control-label">Partner</span>
                                </label>

                                <label class="custom-control custom-checkbox custom-control-inline">
                                    <input onchange="this.form.submit()" type="radio" name="accountType" value='3'
                                        class="custom-control-input" {{ $accountType ==3 ? 'checked' : '' }}>
                                    <span class="custom-control-label">Supplier</span>
                                </label>
                            </div> --}}

                            {{-- <div class="col-12 col-lg-3 table-filters pb-xl-4">
                                <span class="table-filter-title">Inactive</span>
                                <label class="custom-control custom-checkbox custom-control-inline">
                                    <input onchange="this.form.submit()" type="checkbox" name="showInactiveClients"
                                        value='1' class="custom-control-input"
                                        {{ $showInactiveClients ? 'checked' : '' }}>
                                    <span class="custom-control-label">Show inactive acounts</span>
                                </label>
                            </div> --}}

                            <div class="card-header mb-1">
                                <a href="{{ url('createClient') }}" style=""
                                    class="btn text-white btn-space btn-primary float-right"><i
                                        class="icon icon-left mdi mdi-plus"></i> Create New Account</a>
                            </div>
                        </div>

                    </form>
                </div>

                <div class="table-responsive noSwipe">
                    <table class="row-clickable table table-striped table-hover">
                        <thead>
                            <tr>
                                <th style="width:5%;">#</th>
                                <th style="width:50%;">Name</th>
                                <th style="width:25%;">Default rate</th>
                                <th style="width:25%;">Account Type</th>
                                <th style="width:25%;">Active Projects</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clients as $client)
                            <tr>
                                <td>{{ $client->id }}</td>
                                <td class="user-avatar cell-detail user-info"><a
                                        href="{{ route("client.show", "$client->id") }}">{{ strip_tags($client->name) }}</a>
                                </td>
                                <td>{{$client->default_price}}</td>
                                <td>{{$client->accountTypeName}}</td>
                                <td>{{$client->activeProjects->count()}}</td>
                            </tr>
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
</div>

@endsection
