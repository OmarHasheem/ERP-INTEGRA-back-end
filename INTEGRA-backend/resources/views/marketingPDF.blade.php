<!DOCTYPE html>
<html>
<head>
    <title>Laravel 9 Generate PDF Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
  
    <table class="table table-bordered">
        <tr><th>Campaign</th></tr>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Budget</th>
            <th>Status</th>
            <th>Expected Revenue</th>
            <th>Actual Revenue</th>
            
        </tr>
        
        <tr>
            <td>{{ $campaign->name }}</td>
            <td>{{ $campaign->description }}</td>
            <td>{{ $campaign->start_date }}</td>
            <td>{{ $campaign->end_date }}</td>
            <td>{{ $campaign->budget }}</td>
            <td>{{ $campaign->status }}</td>
            <td>{{ $campaign->expected_revenue }}</td>
            <td>{{ $campaign->actual_revenue }}</td>
        </tr>
        
        
    </table>
    @if(isset($SM))
    
    <table class="table table-bordered">
    <tr><th>Social Media</th></tr>
        <tr>
            <th>Blogger</th>
            <th>Type</th>
            <th>Way</th>
            <th>Cost</th>
        </tr>
        @foreach($SM as $socialmedia)
        <tr>
            <td>{{ $socialmedia->blogger }}</td>
            <td>{{ $socialmedia->type }}</td>
            <td>{{ $socialmedia->way }}</td>
            <td>{{ $socialmedia->cost }}</td>
        </tr>
        @endforeach
    </table>
    
    @endif

    @if(isset($TV))
    
    <table class="table table-bordered">
    <tr><th>TV</th></tr>
        <tr>
            <th>Channel</th>
            <th>Time</th>
            <th>Cost</th>
            <th>Advertising Period</th>
        </tr>
        @foreach($TV as $tvs)
        <tr>
            <td>{{ $tvs->channel }}</td>
            <td>{{ $tvs->time }}</td>
            <td>{{ $tvs->cost }}</td>
            <td>{{ $tvs->advertising_period }}</td>
        </tr>
        @endforeach
    </table>
    
    @endif

    @if(isset($EV))
    
    <table class="table table-bordered">
    <tr><th>Event</th></tr>
        <tr>
            <th>Place</th>
            <th>Description</th>
            <th>Type</th>
            <th>Event</th>
            <th>Cost</th>
        </tr>
        @foreach($EV as $event)
        <tr>
            <td>{{ $event->place }}</td>
            <td>{{ $event->description }}</td>
            <td>{{ $event->type }}</td>
            <td>{{ $event->event }}</td>
            <td>{{ $event->cost }}</td>
        </tr>
        @endforeach
    </table>
    
    @endif

</body>
</html>