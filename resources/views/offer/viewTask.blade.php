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
                                        class="icon icon-left mdi mdi-plus"></i> Edit Offer</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card card-border-color card-border-color-primary">
                    <table class="row-clickable table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>TID test</th>
                                <th>Task Name</th>
                                <th>Task Description</th>
                                <th>Estimate</th>
                                <th>OID</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                            <tr>
                                <td>{{ $task->TID }}</td>
                                <td>{{ $task->Task_Name}}</td>
                                <td>{{ $task->Task_Description}}</td>
                                <td>{{ $task->Estimate }}</td>
                                <td>{{ $task->OID }}</td>
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
