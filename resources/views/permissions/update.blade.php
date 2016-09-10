@extends('layouts.app')
@section('content')
<form method="POST" action="{{route('permissions.update', $permission->id)}}">
    <label for="id">id</label><input name="id" value="{{$permission->id}}"/>
    <label for="title">title</label><input name="title" value="{{$permission->title}}"/>
    <label for="description">description</label><textarea name="description" >{{$permission->description}}</textarea> 
    <input type="hidden" name="_method" value="PUT">   
    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
    <input type="submit"/>
</form>
@endsection