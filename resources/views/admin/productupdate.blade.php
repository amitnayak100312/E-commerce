@extends('admin.maindesing')
<base href="/public">
@section('updateproduct')
@if(session('productUpdateMsg'))
    <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-relative"  role="alert">
               {{ session('productUpdateMsg') }}
    </div>
    @endif

     <div class="container-fluid">
    
       <form action="{{route('admin.postupdateproduct',$product->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="product_titel" value="{{$product->product_title}}"><br><br>
            <textarea name="product_description" id=" " value="">
            {{$product->product_description}}
            </textarea><br><br>
            <input type="number" name="product_quantity" value="{{$product->product_quantity}}" ><br><br>
            <input type="number" name="product_price" value="{{$product->product_price}}"><br><br>
           <img style="width: 100px" src="{{ asset('products/'.$product->product_image )}}" alt=""> <label for=""> Old Image</label><br><br>
            <input type="file" name="product_image"><label for="">Add new Image Here!</label><br><br>
            
            
            <select name="porduct_category">
                <option value="{{ $product->product_category}}">
                    {{ $product->product_category}}
                </option>
                @foreach ( $categories as $category)
                <option value="{{ $category->category}}">
                    {{ $category->category }}</option>
                @endforeach
            </select><label for="">  Select A Category</label><br><br>
            
            <input class="btn btn-primary" type="submit" name="submit" value="Add Product">
            
        </form>
    </div>

@endsection 