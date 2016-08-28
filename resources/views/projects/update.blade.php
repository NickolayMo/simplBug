@extends('layouts.app')
@section('content')
<form method="POST" action="{{route('projects.update', $project->id)}}">
    <label for="id">id</label><input name="id" value="{{$project->id}}"/>
    <label for="title">title</label><input name="title" value="{{$project->title}}"/>
    <label for="description">description</label><textarea name="description" >{{$project->description}}</textarea> 
    <input type="hidden" name="_method" value="PUT">   
    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
    <input type="submit"/>
</form>
@endsection