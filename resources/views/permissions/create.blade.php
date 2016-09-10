@extends('layouts.app')
@section('content')
<form method="POST" action="{{route('permissions.store')}}">   
    <label for="title">title</label><input name="title"/>
    <label for="description">description</label><textarea name="description" ></textarea>    
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="submit" value="Save"/>
</form>
@endsection