@extends('product.layout')

@section('content')
    <div class="row">

        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Show Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('product.index')}}">Back</a>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-xs-12 col-md-12">
            <div class="form-group">
                <strong>Product name</strong>
                {{ $data->product_name}}
            </div>
        </div>
        <div class="col-xs-12 col-md-12">
            <div class="form-group">
                <strong>Product code</strong>
                {{ $data->product_code}}
            </div>
        </div>
        <div class="col-xs-12 col-md-12">
            <div class="form-group">
                <strong>Product details</strong>
                {{ $data->details}}
            </div>
        </div>
        <div class="col-xs-12 col-md-12">
            <div class="form-group">
                <strong>Product logo</strong>
                <img src="{{ URL::to($data->logo)}}" height="80" width="70"/>
            </div>
        </div>
    </div>
@endsection