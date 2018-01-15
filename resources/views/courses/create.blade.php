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
        <!--<li><a href="{{ URL::to('nerds/create') }}">Create a Nerd</a>-->
    </ul>
</nav>

<h1>Create a course</h1>

@if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

{{ Form::open(array('url' => 'courses','files'=>true)) }}

    <div class="form-group">
        {{ Form::label('code', 'Code') }}
        {{ Form::text('code', Request::old('code'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('description', 'Description') }}
        {{ Form::text('description', Request::old('description'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('price', 'Price') }}
        {{ Form::text('price', Request::old('price'), array('class' => 'form-control')) }}
    </div>
    
	<div class="form-group">
		{!! Form::label('Flag', 'Flag:') !!}
		{!! Form::file('image',null,['class'=>'form-control']) !!}
	</div>

    {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>
