<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Status Update</title>
</head>
<body style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #f4f6f8; margin: 0; padding: 0;">

    <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #f4f6f8; padding: 40px 0;">
        <tr>
            <td align="center">
                
                <table border="0" cellpadding="0" cellspacing="0" width="600" style="background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.05);">
                    
                    <tr>
                        <td style="background-color: #4f46e5; padding: 30px; text-align: center;">
                            <h1 style="color: #ffffff; margin: 0; font-size: 24px; letter-spacing: 1px;">
                               GIFTOS
                            </h1>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 40px 30px;">
                            <p style="font-size: 16px; color: #555555; margin-top: 0;">Hi <strong>{{ $order->user->name }}</strong>,</p>
                            
                            <p style="font-size: 16px; color: #555555; line-height: 1.5;">
                                We have an update for your order <strong>#{{ $order->id }}</strong>.
                            </p>

                            <div style="text-align: center; margin: 30px 0;">
                                <span style="
                                    background-color: {{ $status == 'Shipped' ? '#d1fae5' : ($status == 'Delivered' ? '#dcfce7' : '#f3f4f6') }}; 
                                    color: {{ $status == 'Shipped' ? '#065f46' : ($status == 'Delivered' ? '#166534' : '#1f2937') }}; 
                                    padding: 12px 30px; 
                                    border-radius: 50px; 
                                    font-weight: bold; 
                                    font-size: 18px; 
                                    text-transform: uppercase;
                                    display: inline-block;
                                    border: 1px solid rgba(0,0,0,0.05);
                                ">
                                    {{ $status }}
                                </span>
                            </div>

                            <p style="font-size: 14px; color: #888888; font-weight: bold; margin-bottom: 15px;">Item Details:</p>

                            <table width="100%" border="0" cellspacing="0" cellpadding="15" style="border: 1px solid #e5e7eb; border-radius: 8px;">
                                <tr>
                                    <td width="80" style="border-bottom: 1px solid #e5e7eb; vertical-align: middle;">
                                        @if($order->product->product_image)
                                            <img src="{{ $message->embed(public_path('products/' . $order->product->product_image)) }}" 
                                                 alt="Product" 
                                                 style="width: 80px; height: 80px; object-fit: cover; border-radius: 6px;">
                                        @else
                                            <div style="width: 80px; height: 80px; background-color: #eee; border-radius: 6px;"></div>
                                        @endif
                                    </td>
                                    
                                    <td style="border-bottom: 1px solid #e5e7eb; vertical-align: middle;">
                                        <div style="font-size: 16px; font-weight: bold; color: #333;">{{ $order->product->product_title }}</div>
                                        <div style="font-size: 14px; color: #888; margin-top: 4px;">Qty: {{ $order->product->product_quantity ?? 1 }}</div>
                                    </td>

                                    <td align="right" style="border-bottom: 1px solid #e5e7eb; vertical-align: middle;">
                                        <div style="font-size: 18px; font-weight: bold; color: #4f46e5;">
                                            ₹{{ number_format($order->product->product_price, 2) }}
                                        </div>
                                    </td>
                                </tr>
                            </table>

                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td align="center" style="padding-top: 40px;">
                                        <a href="{{ url('/') }}" style="background-color: #4f46e5; color: #ffffff; padding: 14px 30px; text-decoration: none; border-radius: 6px; font-weight: bold; display: inline-block;">
                                            Track Order on Website
                                        </a>
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>

                    <tr>
                        <td style="background-color: #f9fafb; padding: 20px; text-align: center; border-top: 1px solid #e5e7eb;">
                            <p style="margin: 0; font-size: 12px; color: #9ca3af;">
                                &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.<br>
                                If you have any questions, reply to this email.
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>
</html>