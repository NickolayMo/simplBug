@extends('layouts.app')
@section('content')
<div class="container">
    <table class="table">
        <tbody> 
            <tr>
                <td>
                    id
                </td>
                 <td>
                    {{$project->id}}
                </td>
            </tr>
            <tr>
                <td>
                    title
                </td>
                 <td>
                    {{$project->title}}
                </td>
            </tr>
            <tr>
                <td>
                    description
                </td>
                 <td>
                    {{$project->description}}
                </td>
            </tr>
            
        </tbody>
    </table>
</div>

@endsection