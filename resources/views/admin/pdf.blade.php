<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2 style="text-align: center;">Order Details</h2>

    <h4>Customer Name: </h4><p>{{$order->name}}</p>
    <h4>Customer Email: </h4><p>{{$order->email}}</p>
    <h4>Customer Phone: </h4><p>{{$order->phone}}</p>
    <h4>Customer Address: </h4><p>{{$order->address}}</p>

    <h4>Product Name: </h4><p>{{$order->product_title}}</p>
    <h4>Product Price: </h4><p>₱{{$order->price}}</p>
    <h4>Product Quantity: </h4><p>{{$order->quantity}}</p>
    <h4>Payment Status: </h4><p>{{$order->payment_status}}</p>
    <h4>Product ID:</h4><p>{{$order->Product_id}}</p>
    <br>
    <img src="product/{{$order->image}}" height="100px" width="100px">
</body>
</html>
