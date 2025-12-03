@extends('admin.maindesing')
<base href="/public">
@section('categoryupdate')
@if(session('category_upadated_message'))
    <div class="mb-4 bg-green-100 border border-green-400 text-orange-600-700 px-4 py-3 rounded-relative"  role="alert">
               {{ session('category_upadated_message') }}
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

     <div class="container-fluid">
       <form action="{{ route('admin.postupdatecategory', $category->id) }}" method="POST">
            @csrf
            <input type="text" name="category" value="{{$category->category}}">
            <input type="submit" name="submit" value="Update category">
            
        </form>
    </div>

@endsection 