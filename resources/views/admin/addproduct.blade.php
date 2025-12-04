@extends('admin.maindesing')

@section('addproduct')
@if(session('product_message'))
    <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-relative"  role="alert">
               {{ session('product_message') }}
    </div>
    @endif

     <div class="container-fluid">
    
       <form action="{{route('admin.postaddproduct')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="product_titel" placeholder="Enter Product Title"><br><br>
            <textarea name="product_description" id="">
                Product Description!...
            </textarea><br><br>
            <input type="number" name="product_quantity" placeholder="Enter Product Quantity here!"><br><br>
            <input type="number" name="product_price" placeholder="Enter Product Price here!"><br><br>
            <input type="file" name="product_image"><br><br>
            
            <select name="porduct_category">
                @foreach ( $categories as $category)
                <option value="{{ $category->category}}">
                    {{ $category->category }}</option>
                @endforeach
            </select><label for="">Select A Category</label><br><br>
            
            <input type="submit" name="submit" value="Add Product">
            
        </form>
    </div>

@endsection 