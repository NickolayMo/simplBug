@extends('layouts.app')
@section('content')
<a href="{{url('groups/create')}}">Create</a>
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
        @foreach ($groups as $group)
        <tr>
            <td>{{ $group->id }}</td>
            <td>{{ $group->title }}</td>
            <td>{{ $group->description }}</td>           
            <td><a href="{{route('groups.show', $group->id)}}">Read</a></td>
            <td><a href="{{route('groups.edit',  $group->id)}}">Update</a></td>
            <td>
                <form action="{{route('groups.destroy', $group->id)}}" method="POST">
                     <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <input type="submit" class="btn btn-dunger" value="Delete"/>
                </form>      
            </td>
        </tr> 
        @endforeach

    </tbody>
</table>
{{$groups->links()}}
@endsection
