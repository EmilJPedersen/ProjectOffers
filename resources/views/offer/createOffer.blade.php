@extends('layouts.app')

@section('content')
{{Form::open(array('action' => 'OfferController@store'))}}
    <offer-create
        templates="{{$templates}}"
        clients="{{$clients}}"
        {{-- templates.title="{{$templates->Template_Name}}"
        templates.description="{{$templates->Template_Description}}"
        templates.estimate="{{$templates->Estimate}}"
        clients.cvr="{{$clients->CVR}}"
        clients.default_price="{{$clients->default_price}}" --}}
    ></offer-create>
{{ Form::close() }}
@endsection
