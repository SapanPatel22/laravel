<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div>
 	<ul>
        @foreach ($task as $tasks)
        	<li>
            	<a href="/tasks/{{$tasks->id}}">{{$tasks->body}}</a>
            </li>
        @endforeach
    </ul>
</div>
</body>
</html>