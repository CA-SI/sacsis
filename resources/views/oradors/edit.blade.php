@extends('dashboard', ['pageTitle' => '_camelUpper_casePlural_ &raquo; Edit'])

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="pull-right raw-margin-top-24 raw-margin-left-24">
                {!! Form::open(['route' => 'oradors.search']) !!}
                <input class="form-control form-inline pull-right" name="search" placeholder="Search">
                {!! Form::close() !!}
            </div>
            <h1 class="pull-left">Oradors: Edit</h1>
            <a class="btn btn-primary pull-right raw-margin-top-24 raw-margin-right-8" href="{!! route('oradors.create') !!}">Add New</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            {!! Form::model($orador, ['route' => ['oradors.update', $orador->id], 'method' => 'patch']) !!}

            @form_maker_object($orador, FormMaker::getTableColumns('oradors'))

            {!! Form::submit('Update', ['class' => 'btn btn-primary pull-right']) !!}

            {!! Form::close() !!}

        </div>
    </div>

@stop
