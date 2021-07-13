@extends('layouts.app')


    <script type="text/javascript">
        function onEditClicked(e)
        {
            var categoryId = $(e).attr('data-id');
            var categoryName = $(e).attr('data-name');
            $("#categoryId").val(categoryId);
            $("#categoryName").val(categoryName);
        }
    </script>



@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Categories') }}
                    <div class = "float-right">
                        <a href="{{ route('home')}}">
                    <button type="submit" class="btn btn-primary mb-2 "> <- Return</button>
                        </a>
                    </div>
            </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class = 'row pl-3 pb-3'>
                        <form class="form-inline" action="{{route('addCategory')}}" method="POST">

                            @csrf

                            <input type="hidden" name="categoryId" id="categoryId" />

                            <div class="form-group mx-sm-3 mb-2">
                              <input type="text" class="form-control" name="categoryName" id="categoryName" aria-describedby="categoryHelp" placeholder="Enter Category Name">
                            </div>
                            <button type="submit" class="btn btn-success mx-sm-3 mb-2">Save</button>
                          </form>
                    </div>

                    

                    @if (count($categories)>0)
                        

                     <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach ($categories as $category)
                            <tr>
                                <td>{{$category->name}}</td>
                                <td>
                                   
                                    <a href="#">
                                    <button type="button" class="btn btn-primary" onclick="onEditClicked(this);" data-name ="{{$category->name}}" data-id="{{ $category->id }}">Edit</button>
                                    </a>

                                    <a href="{{route('deleteCategory',$category->id)}}">
                                         <button type="button" class="btn btn-primary">Delete</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                        @else
                            
                        {{ 'No Category found' }}

                        @endif
                          
                        </tbody>
                        </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
