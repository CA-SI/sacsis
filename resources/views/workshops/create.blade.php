@extends('dashboard', ['pageTitle' => '_camelUpper_casePlural_ &raquo; Create'])

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="pull-right raw-margin-top-24 raw-margin-left-24">
                {!! Form::open(['route' => 'workshops.search']) !!}
                <input class="form-control form-inline pull-right" name="search" placeholder="Search">
                {!! Form::close() !!}
            </div>
            <h1 class="pull-left">Workshops: Create</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">

            {!! Form::open(['route' => 'workshops.store']) !!}

            @form_maker_table("workshops")

            {!! Form::submit('Save', ['class' => 'btn btn-primary pull-right']) !!}

            {!! Form::close() !!}

        </div>
    </div>

@stop