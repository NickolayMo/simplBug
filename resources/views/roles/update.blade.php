@extends('layouts.app')
@section('content')
<form method="POST" action="{{route('roles.update', $role->id)}}">
    <label for="id">id</label><input name="id" value="{{$role->id}}"/>
    <label for="title">title</label><input name="title" value="{{$role->title}}"/>
    <label for="slug">slug</label><input name="slug" value="{{$role->slug}}"/>
    <label for="description">description</label><textarea name="description" >{{$role->description}}</textarea> 
    <input type="hidden" name="_method" value="PUT">   
    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
    <input type="submit"/>
</form>
@endsection