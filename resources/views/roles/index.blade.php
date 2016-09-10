@extends('layouts.app')
@section('content')
<a href="{{url('roles/create')}}">Create</a>
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
        @foreach ($roles as $role)
        <tr>
            <td>{{ $role->id }}</td>
            <td>{{ $role->title }}</td>
            <td>{{ $role->description }}</td>         
            <td><a href="{{route('roles.show', $role->id)}}">Read</a></td>
            <td><a href="{{route('roles.edit',  $role->id)}}">Update</a></td>
            <td>
                <form action="{{route('roles.destroy', $role->id)}}" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <input type="submit" class="btn btn-dunger" value="Delete"/>
                </form>      
            </td>
        </tr> 
        @endforeach
    </tbody>
</table>
{{$roles->links()}}
@endsection
