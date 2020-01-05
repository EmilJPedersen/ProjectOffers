@extends('layouts.app')

@section('title', 'Dashboard')

@section('content-top')
@endsection

@section('content')
{{-- {{Form::open(array('action' => 'OfferController@store'))}}
    <offer-create></offer-create>
{{ Form::close() }} --}}
<offer-create></offer-create>
@endsection
