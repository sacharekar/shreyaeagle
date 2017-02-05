@extends('app')
@section('content')
    <h1>Update Mutual Funds</h1>
    {!! Form::model($mutualfund,['method' => 'PATCH','route'=>['mutualfunds.update',$mutualfund->id]]) !!}
    <div class="form-group">
        {!! Form::label('beneficiary', 'Beneficiary:') !!}
        {!! Form::text('beneficiary',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('type_of_fund', 'Type of Fund:') !!}
        {!! Form::text('type_of_fund',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('number_of_funds', 'Number of Funds:') !!}
        {!! Form::text('number_of_funds',null,['class'=>'form-control']) !!}
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
        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@stop
