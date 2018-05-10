@extends('dashboard', ['pageTitle' => '_camelUpper_casePlural_ &raquo; Edit'])

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="pull-right raw-margin-top-24 raw-margin-left-24">
                {!! Form::open(['route' => 'workshops.search']) !!}
                <input class="form-control form-inline pull-right" name="search" placeholder="Search">
                {!! Form::close() !!}
            </div>
            <h1 class="pull-left">Workshops: Edit</h1>
            <a class="btn btn-primary pull-right raw-margin-top-24 raw-margin-right-8" href="{!! route('workshops.create') !!}">Add New</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            {!! Form::model($workshop, ['route' => ['workshops.update', $workshop->id], 'method' => 'patch']) !!}

            @form_maker_object($workshop, FormMaker::getTableColumns('workshops'))

            {!! Form::submit('Update', ['class' => 'btn btn-primary pull-right']) !!}

            {!! Form::close() !!}

        </div>
    </div>

@stop
