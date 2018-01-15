<!DOCTYPE html>
<html>
<head>
    <title>Courses</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('courses') }}">Back</a></li>
    </ul>
</nav>

<h1>Show course of {{ $course->description }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $course->description }}</h2>
        <p>
            <strong>Code:</strong> {{ $course->code }}<br>
            <strong>Price:</strong> {{ $course->price }}
        </p>
    </div>

</div>
</body>
</html>
