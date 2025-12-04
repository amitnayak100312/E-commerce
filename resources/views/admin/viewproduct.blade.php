@extends('admin.maindesing')

@section('viewproduct')

    @if(session('deleteprodcutMessge'))
    <div class="mb-4 bg-green-100 border border-red-400 text-red-700 px-4 py-3 rounded-relative" role="alert">
        {{ session('deleteprodcutMessge') }}
    </div>
@endif
    <table style="width: 100%; border-collapse: collapse; font-family: Arial, sans-serif;">
        <thead>
            <tr style="background-color: #f2f2f2;">
                {{-- <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Product ID</th> --}}
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Product Title</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Product Description</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Product Quantity</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Product Image</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Product Category</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach($products as $product)
                <tr style="border-bottom: 1px solid #ddd;">
                    {{-- <td style="padding: 12px;">{{$product->id}}</td> --}}
                    <td style="padding: 12px;">{{$product->product_title}}</td>
                    <td style="padding: 12px;">{{Str::limit($product->product_description,50,'...')}}</td>
                    <td style="padding: 12px;">{{$product->product_quantity}}</td>
                    <td style="padding: 12px;">
                        {{-- {{$product->product_image}} --}}
                        <img style="width: 100px;" src="{{asset('products/'.$product->product_image)}}">
                    </td>            
                    <td style="padding: 12px;">{{$product->product_category}}</td>
                    <td>
                        <a href="{{ route('admin.productupdate',$product->id) }}" style="background-color: rgb(239, 172, 2); 
                            color: white;
                            padding: 5px 10px;
                            text-decoration: none; 
                            border-radius: 5px; 
                            font-weight: bold;">update</a>
                        <a href="{{route('admin.deleteprodcut',$product->id) }}"  style="background-color: rgb(184, 0, 0); 
                            color: white; padding: 5px 10px; 
                            text-decoration: none; b
                            order-radius: 
                            5px; font-weight: bold;"
                            onclick="return confirm('Are you sure!')"
                            >delete</a>
                    </td>
                </tr>
            @endforeach
            
            {{ $products->links()}}
        </tbody>
    </table>
@endsection