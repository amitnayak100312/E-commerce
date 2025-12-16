@extends('admin.maindesing')
@section('vieworder')


    <table style="width: 100%; border-collapse: collapse; font-family: Arial, sans-serif;">
        <thead>
            <tr style="background-color: #f2f2f2;">
                {{-- <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Product ID</th> --}}
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Customer Name</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Address</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Contact No</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Product</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Price</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Product Image</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Status</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">PDF</th>
            </tr>
        </thead>
        <tbody>

            @foreach($orders as $order)
                <tr style="border-bottom: 1px solid #ddd;">
                    {{-- <td style="padding: 12px;">{{$product->id}}</td> --}}
                    <td style="padding: 12px;">{{$order->user->name}}</td>
                    <td style="padding: 12px;">{{$order->receiver_address}}</td>
                    <td style="padding: 12px;">{{$order->receiver_contact_num}}</td>
                    <td style="padding: 12px;">{{$order->product->product_title}}</td>
                    <td style="padding: 12px;">{{$order->product->product_price}}</td>
                    <td style="padding: 12px;">
                        {{-- {{$product->product_image}} --}}
                        <img style="width: 100px;" src="{{asset('products/' . $order->product->product_image)}}">
                    </td>
                    <td style="padding: 12px">
                        <form action="{{route('admin.changeStatus', $order->id)}}" method="post">
                            @csrf
                            <select class="form-select" name="status">
                                <option value="{{$order->status}}" selected>{{$order->status}}</option>
                                <option value="Shipped">Shipped</option>
                                <option value="Delivered">Delivered</option>
                                <option value="Pending">Pending</option>
                            </select>
                            <input class="btn btn-warning btn-sm" type="submit" value="submit" name="submit"
                                onclick=" return confirm('Are you sure?')">
                        </form>
                    </td>

                    <td style="padding: 12px">
                        <a href="{{route('admin.downloadpdf', $order->id)}}">
                            Download PDF
                        </a>
                    </td>
                </tr>
            @endforeach
            {{--
            {{ $products->links()}} --}}
        </tbody>
    </table>
@endsection