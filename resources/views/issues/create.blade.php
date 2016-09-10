@extends('layouts.app')
@section('content')
<form method="POST" action="{{route('issues.store')}}">   
    <label for="title">title</label><input name="title"/>
    <label for="description">description</label><textarea name="description" ></textarea>
    <label for="status_id">status</label>
    <select name="status_id">
        @foreach($statuses as $status)
        <option value="{{$status->id}}">{{$status->title}}</option>
        @endforeach
    </select>

    
    <label for="severity_id">severity</label>
   <select name="severity_id">
        @foreach($severities as $severity)
        <option value="{{$severity->id}}">{{$severity->title}}</option>
        @endforeach
    </select>
    <label for="start_date">start date</label>
    <input type="date" name="start_date"/>
     <label for="close_date">close date</label>
    <input type="date" name="close_date"/>
    <label for="expected_time">expected time</label>
    <input type="number" name="expected_time"/>
     <label for="elapsed_time">elapsed_time</label>
    <input type="number" name="elapsed_time"/>

    <label for="creator_id">Creator</label>
     <select name="creator_id">
        @foreach($users as $user)
        <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
    </select>
    <label for="executor_id">executor</label>
   <select name="executor_id">
        @foreach($users as $user)
        <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
    </select>
    <label for="responsible_id">responsible</label>
   <select name="responsible_id">
        @foreach($users as $user)
        <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
    </select>
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="submit" value="Save"/>
</form>
@endsection