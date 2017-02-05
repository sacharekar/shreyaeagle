@extends('app')
@section('content')
    <h1>Create New Fund</h1>
    {!! Form::open(['url' => 'mutualfunds']) !!}

    <div class="form-group">
        {!! Form::select('customer_id', $customers) !!}
    </div>

    <div class="form-group">
        {!! Form::label('beneficiary', 'Beneficiary:') !!}
        {!! Form::text('beneficiary',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('type of fund', 'Type of Fund:') !!}
        {!! Form::text('type of fund',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('number of funds', 'Number of Funds:') !!}
        {!! Form::text('number of funds',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('purchase_price', 'Purchase Price:') !!}
        {!! Form::text('purchase_price',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('purchased_date', 'Purchase Date:') !!}
        {!! Form::text('purchased_date',null,['class'=>'form-control']) !!}
    </div>


    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
@stop
