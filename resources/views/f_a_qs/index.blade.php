@extends('dashboard', ['pageTitle' => '_camelUpper_casePlural_ &raquo; Index'])

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="pull-right raw-margin-top-24 raw-margin-left-24">
                {!! Form::open(['route' => 'f_a_qs.search']) !!}
                <input class="form-control form-inline pull-right" name="search" placeholder="Search">
                {!! Form::close() !!}
            </div>
            <h1 class="pull-left">FAQs</h1>
            <a class="btn btn-primary pull-right raw-margin-top-24 raw-margin-right-8" href="{!! route('f_a_qs.create') !!}">Add New</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if ($f_a_qs->isEmpty())
                <div class="well text-center">No fAQs found.</div>
            @else
                <table class="table table-striped">
                    <thead>
                        <th>Name</th>
                        <th class="text-right" width="200px">Action</th>
                    </thead>
                    <tbody>
                        @foreach($f_a_qs as $f_a_q)
                            <tr>
                                <td>
                                    <a href="{!! route('f_a_qs.edit', [$f_a_q->id]) !!}">{{ $f_a_q->name }}</a>
                                </td>
                                <td class="text-right">
                                    <form method="post" action="{!! route('f_a_qs.destroy', [$f_a_q->id]) !!}">
                                        {!! csrf_field() !!}
                                        {!! method_field('DELETE') !!}
                                        <button class="btn btn-danger btn-xs pull-right" type="submit" onclick="return confirm('Are you sure you want to delete this f_a_q?')"><i class="fa fa-trash"></i> Delete</button>
                                    </form>
                                    <a class="btn btn-default btn-xs pull-right raw-margin-right-16" href="{!! route('f_a_qs.edit', [$f_a_q->id]) !!}"><i class="fa fa-pencil"></i> Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 text-center">
            {!! $f_a_qs; !!}
        </div>
    </div>

@stop