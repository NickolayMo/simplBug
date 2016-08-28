@extends('layouts.app')
@section('content')
<form method="POST" action="{{route('issues.update', $issue->id)}}">
    <label for="id">id</label><input name="id" value="{{$issue->id}}"/>
    <label for="title">title</label><input name="title" value="{{$issue->title}}"/>
    <label for="description">description</label><textarea name="description" >{{$issue->description}}</textarea>
    <label for="status_id">status</label><input name="status" value="{{$issue->status}}"/>
    <label for="severity_id">severity</label><input name="severity" value="{{$issue->severity}}"/>
    <input type="hidden" name="_method" value="PUT">   
    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
    <input type="submit"/>
</form>
@endsection