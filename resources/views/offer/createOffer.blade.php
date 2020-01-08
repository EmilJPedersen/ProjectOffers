@extends('layouts.app')

@section('content')
{{Form::open(array('action' => 'OfferController@store'))}}
    <offer-create></offer-create>
{{ Form::close() }}
@endsection
