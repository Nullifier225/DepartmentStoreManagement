@extends('layouts.app')

    <script>    
    function onEditClicked(e)
        {
            var productId = $(e).attr('data-id');
            var productName = $(e).attr('data-name');
            $("#productId").val(productId);
            $("#productName").val(productName);
        }
    </script>


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}
                    <div class = "float-right">
                    <a href="{{ route('categories')}}">
                <button type="submit" class="btn btn-primary mb-2 ">Add Category</button>
                    </a>
                    <a href="#">
                <button type="submit" onclick="alert('start adding');" class="btn btn-primary mb-2 ">Add Product</button>
                    </a>
                    </div>
            </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <div name="inserter" id="inserter">
                        <form class="form-inline" action="{{ route('addProduct')}}" method="POST">

                            @csrf

                            <input type="hidden" name="productId" id="productId" />

                            <div class="form-group mx-sm-3 mb-2" >
                              <input type="text" class="form-control" name="productName" id="productName" aria-describedby="productHelp" placeholder="Enter Product Name">
                            </div>
                            <button type="submit" class="btn btn-success mx-sm-3 mb-2">Save</button>
                          </form>
                        </div>
                    
                    @if (count($products)>0)
                        

                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                       <thead>
                           <tr>
                               <th>Name</th>
                               <th>Action</th>
                           </tr>
                       </thead>
                       <tbody>

                       @foreach ($products as $product)
                           <tr>
                               <td>{{$product->name}}</td>
                               <td>
                                  
                                   <a href="#">
                                   <button type="button" class="btn btn-primary" onclick="onEditClicked(this);" data-name ="{{$product->name}}" data-id="{{ $product->id }}">Edit</button>
                                   </a>

                                   <a href="{{route('deleteProduct',$product->id)}}">
                                        <button type="button" class="btn btn-primary">Delete</button>
                                   </a>
                               </td>
                           </tr>
                       @endforeach

                       @else
                           
                       {{ 'No Product found' }}

                       @endif
                         
                       </tbody>
                       </table>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
