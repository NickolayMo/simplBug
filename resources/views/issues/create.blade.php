@extends('layouts.app')
@section('content')
<form method="POST" action="{{route('issues.store')}}">   
    <label for="title">title</label><input name="title"/>
    <label for="description">description</label><textarea name="description" ></textarea>
    <label for="status_id">status</label><input name="status" />
    <label for="severity_id">severity</label><input name="severity"/>
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="submit" value="Save"/>
</form>
@endsection