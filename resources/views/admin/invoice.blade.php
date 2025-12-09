<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Receipt</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .ticket-card {
            background: white;
            width: 320px; /* Slightly narrower for a better centered look */
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.08);
            overflow: hidden;
            position: relative;
            text-align: center; /* Key change: Centers all text */
        }

        .header-bg {
            background: linear-gradient(135deg, #FF6B6B 0%, #556270 100%);
            height: 110px;
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 0;
        }

        .content {
            position: relative;
            z-index: 1;
            padding: 20px 30px;
            margin-top: 40px; 
        }

        .product-title {
            background: white;
            padding: 15px;
            border-radius: 16px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
            margin-bottom: 30px;
        }

        .product-title h2 {
            margin: 0;
            font-size: 18px;
            color: #333;
            text-transform: uppercase;
        }

        .detail-row {
            margin-bottom: 25px; /* Added more space between items */
        }

        .label {
            font-size: 11px;
            font-weight: 800;
            color: #9CA3AF;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: block;
            margin-bottom: 6px;
        }

        .value {
            font-size: 17px;
            font-weight: 600;
            color: #1F2937;
        }

        .total-box {
            background: #F3F4F6;
            border-radius: 16px;
            padding: 15px;
            margin-top: 20px;
            /* Flex column to stack items in center */
            display: flex; 
            flex-direction: column; 
            align-items: center; 
            justify-content: center;
        }

        .total-label {
            font-size: 12px;
            font-weight: bold;
            color: #555;
            margin-bottom: 5px;
            text-transform: uppercase;
        }

        .total-price {
            font-size: 28px; /* Made bigger */
            font-weight: 800;
            color: #FF6B6B;
        }
    </style>
</head>
<body>

    <div class="ticket-card">
        <div class="header-bg"></div>

        <div class="content">
            <div class="product-title">
                <h2>{{ $data->product->product_title ?? 'Product Name' }}</h2>
            </div>

            <div class="detail-row">
                <span class="label">Customer Name</span>
                <span class="value">{{ $data->user->name ?? 'Amit Nayak' }}</span>
            </div>

            <div class="detail-row">
                <span class="label">Phone Number</span>
                <span class="value">{{ $data->receiver_contact_num ?? $data->eceiver_contact_num }}</span>
            </div>

            <div class="detail-row">
                <span class="label">Delivery Address</span>
                <span class="value">{{ $data->receiver_address }}</span>
            </div>

            <div class="total-box">
                <span class="total-label">Total To Pay</span>
                <span class="total-price">{{ number_format($data->product->product_price, 0) }}</span>
            </div>
        </div>
    </div>

</body>
</html>