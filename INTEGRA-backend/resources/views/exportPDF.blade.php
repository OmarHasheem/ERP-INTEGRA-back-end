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
            <th>Employee Id</th>
            
        </tr>
        
        <tr>
            <td>{{ $export->name }}</td>
            <td>{{ $export->date }}</td>
            <td>{{ $export->total_amount }}</td>
            <td>{{ $export->employee_id }}</td>
 
        </tr>
        
        
    </table> 
    
    <table class="table table-bordered">
    <tr><th>Products</th></tr>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Details</th>
            <th>Catagory</th>
            <th>Supplier</th>
        </tr>
        @foreach($export->products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->quantity }}</td>
            <td>{{ $product->details }}</td> 
            <td>{{ $product->catagory_id }}</td>
            <td>{{ $product->supplier_id }}</td>
        </tr>
        @endforeach
    </table> 
    
</body>
</html>