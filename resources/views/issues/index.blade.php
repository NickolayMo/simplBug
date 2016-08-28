@extends('layouts.app')
@section('content')
<a href="{{url('issues/create')}}">Create</a>
<table class='table'>
    <thead>
        <tr>
            <th>id</th>
            <th>title</th>
            <th>description</th>
            <th>date_created</th>
            <th>status</th>
            <th>severity</th>
            <th>creator</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($issues as $issue)
        <tr>
            <td>{{ $issue->id }}</td>
            <td>{{ $issue->title }}</td>
            <td>{{ $issue->description }}</td>
            <td>{{ $issue->date_created }}</td>
            <td>{{ $issue->status->title }}</td>
            <td>{{ $issue->severity->title }}</td>
            <td>{{ $issue->creator->name }}</td>
            <td><a href="{{route('issues.show', $issue->id)}}">Read</a></td>
            <td><a href="{{route('issues.edit',  $issue->id)}}">Update</a></td>
            <td>
                <form action="{{route('issues.destroy', $issue->id)}}" method="POST">
                     <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <input type="submit" class="btn btn-dunger" value="Delete"/>
                </form>      
            </td>
        </tr> 
        @endforeach

    </tbody>
</table>
{{$issues->links()}}
@endsection
