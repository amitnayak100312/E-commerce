@extends('maindesign')
@section('viewcartproducts')
<div class="container" >   
    <table style="width: 100%; border-collapse: collapse; font-family: Arial, sans-serif;">
        <thead>
            <tr style="background-color: #7d7d7d; color: #ffff;">
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Product Title</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Product Price</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Product Image</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Action</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach($cart as $card_product)
            <tr style="border-bottom: 1px solid #ddd;">
                    <td style="padding: 12px;">{{$card_product->product->product_title}}</td>
                    <td style="padding: 12px;">{{$card_product->product->product_price}}</td>
                    <td style="padding: 12px;">
                       <img style="width: 100px;" src="{{asset('products/' . $card_product->product->product_image)}}">
                    </td>
                    <td style="padding: 12px;"><a class="btn btn-danger" href="{{ route('removecartproduct',$card_product->id) }}">Remove</a></td>                   
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection