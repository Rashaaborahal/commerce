<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>print pdf</title>
    <style>
    h2{
        text-align:center;
    }
    </style>
</head>
<body>
<h1 style="text-align:center;"> Order Details</h1>
<h2>{{$order->name}}  </h2>
            <h2>{{$order->email}}  </h2>
            <h2>{{$order->phone}}  </h2>
            <h2>{{$order->address}}  </h2>
            <h2>{{$order->user_id}}  </h2>
            <h2>{{$order->product_title}}  </h2>
            <h2>{{$order->price}}  </h2>
            <h2>{{$order->quantity}}  </h2>
            <h2>{{$order->product_id}}  </h2>
           <img  src="/product/{{$order->image}} ">  
            <h2>{{$order->payment_status}}  </h2>
             
            <h2>{{$order->delivery_status}}  </h2>
    
</body>
</html>