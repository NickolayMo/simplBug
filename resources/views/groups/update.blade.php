@extends('layouts.app')
@section('content')
<form method="POST" action="{{route('groups.update', $group->id)}}">
    <label for="id">id</label><input name="id" value="{{$group->id}}"/>
    <label for="title">title</label><input name="title" value="{{$group->title}}"/>
    <label for="description">description</label><textarea name="description" >{{$group->description}}</textarea>   
    <input type="hidden" name="_method" value="PUT">   
    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
    <input type="submit"/>
</form>
@endsection