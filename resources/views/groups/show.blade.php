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
                    {{$group->id}}
                </td>
            </tr>
            <tr>
                <td>
                    title
                </td>
                 <td>
                    {{$group->title}}
                </td>
            </tr>
            <tr>
                <td>
                    description
                </td>
                 <td>
                    {{$group->description}}
                </td>
            </tr>
         
        </tbody>
    </table>
</div>

@endsection