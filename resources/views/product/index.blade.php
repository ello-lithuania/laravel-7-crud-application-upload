@extends('product.layout')

@section('content')
    <div class="row">

        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel Product List</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('product.create')}}">Create New Product</a>
            </div>
        </div>
    </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered">
            <tr>
                <th>Product Name</th>
                <th>Product Code</th>
                <th>Details</th>
                <th>Product Logo</th>
                <th>Action</th>
            </tr>
            
                @foreach ($product as $pro)
                <tr>
                    <td>{{$pro->product_name}}</td>
                    <td>{{$pro->product_code}}</td>
                    <td>{{$pro->details}}</td>
                    
                    <td><img src="{{ URL::to($pro->logo)}}" height="80" width="70"/></td>
                    <td>
                        <a href="{{ URL::to('show/product/'.$pro->id)}}" class="btn btn-info">Show</a>
                        <a href="{{ URL::to('edit/product/'.$pro->id)}}" class="btn btn-primary">Edit</a>
                        <a href="{{ URL::to('delete/product/'.$pro->id)}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            
        </table>
        
        {!! $product->links() !!}



@endsection