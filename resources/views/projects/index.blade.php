@extends('layouts.app')
@section('content')
<a href="{{url('projects/create')}}">Create</a>
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
        @foreach ($projects as $project)
        <tr>
            <td>{{ $project->id }}</td>
            <td>{{ $project->title }}</td>
            <td>{{ $project->description }}</td>         
            <td><a href="{{route('projects.show', $project->id)}}">Read</a></td>
            <td><a href="{{route('projects.edit',  $project->id)}}">Update</a></td>
            <td>
                <form action="{{route('projects.destroy', $project->id)}}" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <input type="submit" class="btn btn-dunger" value="Delete"/>
                </form>      
            </td>
        </tr> 
        @endforeach
    </tbody>
</table>
{{$projects->links()}}
@endsection
