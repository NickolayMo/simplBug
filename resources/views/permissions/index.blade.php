@extends('layouts.app')
@section('content')
<a href="{{url('permissions/create')}}">Create</a>
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
        @foreach ($permissions as $permission)
        <tr>
            <td>{{ $permission->id }}</td>
            <td>{{ $permission->title }}</td>
            <td>{{ $permission->description }}</td>         
            <td><a href="{{route('permissions.show', $permission->id)}}">Read</a></td>
            <td><a href="{{route('permissions.edit',  $permission->id)}}">Update</a></td>
            <td>
                <form action="{{route('permissions.destroy', $permission->id)}}" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <input type="submit" class="btn btn-dunger" value="Delete"/>
                </form>      
            </td>
        </tr> 
        @endforeach
    </tbody>
</table>
{{$permissions->links()}}
@endsection
