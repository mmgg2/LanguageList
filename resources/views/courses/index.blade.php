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
        <li><a href="{{ URL::to('courses/create') }}">New Course</a>
    </ul>
</nav>

<h1>List of Courses</h1>



{!! Form::open(['method'=>'GET','url'=>'courses','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
<div class="input-group custom-search-form">
    <input type="text" class="form-control" name="search" placeholder="Search by description">
    <span class="input-group-btn">
        <button class="btn btn-default-sm" type="submit">
            <i class="fa fa-search">Search<i>
        </button>
    </span>
</div><br><br>
{!! Form::close() !!}





<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Code</td>
            <td>Description</td>
            <td>Price</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($courses as $key => $value)
        <tr>
            <td><img class="img-rounded" src='{{asset("$value->image")}}'
                style="width:32px;height:32px;"> {{ $value->code }}</td>
            <td>{{ $value->description }}</td>
             <td>{{ $value->price }}</td>
            <td>
                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('courses/' . $value->id) }}">Show</a>

                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('courses/' . $value->id . '/edit') }}">Edit</a>
                
				{!! Form::open(['method' => 'DELETE','route' => ['courses.destroy', $value->id],'style'=>'display:inline']) !!}
				{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{!! $courses->render() !!}

</div>
</body>
</html>
