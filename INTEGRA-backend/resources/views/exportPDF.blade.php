<!DOCTYPE html>
<html>
<head>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>

    <table class="table table-bordered">
    <tr><th>Export</th></tr>
        <tr>
            <th>Name</th>
            <th>Date</th>
            <th>Total Amount</th>
            <th>Employee</th>
            <th>Customer</th>
        </tr>
        <tr>
            <td>{{ $export->export_name }}</td>
            <td>{{ $export->date }}</td>
            <td>{{ $export->total_amount }}</td>
            <td>{{ $export->employee_name }}</td>
            <td>{{ $export->customer_name }}</td>
        </tr>
    </table> 

    
    <table class="table table-bordered">
    <tr><th>Products</th></tr>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total Amount</th>
            <th>Category</th>
        </tr>
        @foreach($product as $products)
        <tr>
            <td>{{ $products->product_name }}</td>
            <td>{{ $products->price }}</td>
            <td>{{ $products->quantity }}</td>
            <td>{{ $products->total_amount }}</td>
            <td>{{ $products->category_name }}</td>

        </tr>
        @endforeach
    </table> 
    
</body>
</html>