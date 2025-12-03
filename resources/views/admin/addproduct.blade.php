@extends('admin.maindesing')

@section('addproduct')
@if(session('product_message'))
    <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-relative"  role="alert">
               {{ session('category_message') }}
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

     <div class="container-fluid">
    
       <form action="{{route('admin.postaddproduct')}}" method="POST">
            @csrf
            <input type="text" name="product_titel" placeholder="Enter Product Title">
            <textarea name="product_description" id="">
                Product Description!...
            </textarea>
            <input type="number" name="product_quantity" placeholder="Enter Product Quantity here!">
            <input type="number" name="product_price" placeholder="Enter Product Price here!">
            {{-- <input type="number" name="product_category" placeholder="Enter Product Category here!"> --}}
            <section>
                <option value="">abc</option>
                <option value="">abc</option>
                <option value="">abc</option>
                <option value="">abc</option>
            </section>
            
            <input type="submit" name="submit" value="Add category">
            
        </form>
    </div>

@endsection 