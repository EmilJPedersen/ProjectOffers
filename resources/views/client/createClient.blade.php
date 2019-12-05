@extends('layouts.app')

@section('title', 'Clients')

@section('content')

<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <div class="card card-border-color card-border-color-primary">
            <div class="card-header card-header-divider">Create New Client
            </div>
            {{-- ERRORS --}}
            @if ($errors->any())
            <div class="col-lg-12">
                <div role="alert" class="alert alert-danger alert-icon alert-icon-border alert-dismissible">
                    <div class="icon">
                        <span class="mdi mdi-close-circle-o"></span>
                    </div>
                    <div class="message">
                        <button type="button" data-dismiss="alert" aria-label="Close" class="close">
                            <span aria-hidden="true" class="mdi mdi-close"></span>
                        </button>
                        <strong>Errors: </strong> <br>
                            @foreach ($errors->all() as $error)
                                <p class="mt-0">{{$error}}</p>
                            @endforeach
                    </div>
                </div>
            </div>
            @endif
                @if(isset($error))
                <div class="col-lg-12">
                <div role="alert" class="alert alert-danger alert-icon alert-icon-border alert-dismissible">
                    <div class="icon">
                        <span class="mdi mdi-close-circle-o"></span>
                    </div>
                    <div class="message">
                        <button type="button" data-dismiss="alert" aria-label="Close" class="close">
                            <span aria-hidden="true" class="mdi mdi-close"></span>
                        </button>
                        <strong>Error: </strong> <br>
                          {{$error}}
                    </div>
                </div>
            </div>
                @endif

            <div class="card-body">
                @if(isset($message))
                    <div role="alert" class="alert alert-{{$status}} alert-icon alert-icon-border alert-dismissible">
                        <div class="icon">
                            <span class="mdi mdi-check"></span>
                        </div>
                        <div class="message">
                            <button type="button" data-dismiss="alert" aria-label="Close" class="close">
                                <span aria-hidden="true" class="mdi mdi-close"></span>
                            </button>
                            {{$message}}
                        </div>
                    </div>
                @endif

                {{Form::open(array('action' => 'ClientController@store'))}}
						 <client-create></client-create>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection
