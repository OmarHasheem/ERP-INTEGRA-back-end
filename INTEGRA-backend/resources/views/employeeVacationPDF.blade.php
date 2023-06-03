<!DOCTYPE html>
<html>
<head>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
  

    <table class="table table-bordered">
    <tr><th>Employee Vacation</th></tr>
        <tr>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Type Of Vacation</th>
            <th>Reason Of Vacation</th>
            <th>Status</th>
            <th>Employee Id</th>

        </tr>

        if(isset($EP))
        @foreach($EP as $employeeVacation)
        <tr>
            <td>{{ $employeeVacation->startDate }}</td>
            <td>{{ $employeeVacation->endDate }}</td>
            <td>{{ $employeeVacation->typeOfVacation }}</td>
            <td>{{ $employeeVacation->reasonOfVacation }}</td>
            <td>{{ $employeeVacation->status }}</td> 
            <td>{{ $employeeVacation->employee_id }}</td>
           
        </tr>
        @endforeach
    </table> 
    

</body>
</html>