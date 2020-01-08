@extends('layouts.app')

@section('title', 'Clients')
{{-- @section('title') --}}

@section('content')
<div class="row">
    <div class="col-lg-12"></div>
    <div class="col-md-12">
        <div class="card card-table">
            <div class="card-body">
                <div class="card card-border-color card-border-color-primary">
                    <table class="row-clickable table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>TempID</th>
                                <th>Template Name</th>
                                <th>Template Description</th>
                                <th>Estimate</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($templates as $template)
                            <tr>
                                <td>{{ $template->TempID }}</td>
                                <td>{{ $template->Template_Name}}</td>
                                <td>{{ $template->Template_Description}}</td>
                                <td>{{ $template->Estimate }}</td>
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
