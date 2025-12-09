@extends('maindesign')
@section('viewcartproducts')



    <div class="container">
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
                @php
                    $price = 0;
                @endphp
                @foreach($cart as $card_product)
                    <tr style="border-bottom: 1px solid #ddd;">
                        <td style="padding: 12px;">{{$card_product->product->product_title}}</td>
                        <td style="padding: 12px;">₹ {{$card_product->product->product_price}}</td>
                        <td style="padding: 12px;">
                            <img style="width: 100px;" src="{{asset('products/' . $card_product->product->product_image)}}">
                        </td>
                        <td style="padding: 12px;"><a class="btn btn-danger"
                                href="{{ route('removecartproduct', $card_product->id) }}">Remove</a></td>
                    </tr>
                    @php
                        $price = $price + $card_product->product->product_price;
                    @endphp
                @endforeach
                <tr style="border-bottom: 1px solid #000000; background-color: #7d7d7d; color: #ffff;">
                    <td style="padding: 12px;">Total Price</td>
                    <td style="padding: 12px;">₹ {{ $price }}</td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>

        @if(session('confirmMsg'))
            <div class="mb-4 bg-green-100 border border-red-400 text-red-700 px-4 py-3 rounded-relative" role="alert">
                {{ session('confirmMsg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif


        <form action="{{ route('confirm_order') }}" style="margin-top:20px;" method="post">
           @csrf
            <input type="text" name="receiver_address" id="" placeholder="Enter Your Address" required><br><br><br>
            <input type="int" name="receiver_contact_num" id="" placeholder="Enter Your Contact Number"
                required><br><br><br>
            <input class="btn btn-secondary" type="submit" name="submit" value="Confirm Order">
        </form>
        <a href="{{ route('stripe',$price) }}" type="submit" class="btn btn-outline-primary btn-mid">
                                <i class="fas fa-shopping-cart me-2"></i>pay now
                            </a>
    </div>
@endsection