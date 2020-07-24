<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
<table class="table table-bordered">
    <ul>
        <h1>SA Holidays for year {{$year}} </h1>

        @foreach($holidays as $holiday)
            <li> {{ $holiday->name }} {{  $holiday->day}}</li>
        @endforeach
    </ul>
</table>
</body>
</html>
