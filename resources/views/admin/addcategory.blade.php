@extends('admin.maindesing')

@section('addcategory')
@if(session('category_message'))
    <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-relative"  role="alert">
               {{ session('category_message') }}
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

     <div class="container-fluid">
    
       <form action="{{route('admin.postaddcategory')}}" method="POST">
            @csrf
            <input type="text" name="category" placeholder="Enter Category Name">
            <input type="submit" name="submit" value="Add category">
            
        </form>
    </div>

@endsection 