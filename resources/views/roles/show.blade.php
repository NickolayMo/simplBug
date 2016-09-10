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
                    {{$role->id}}
                </td>
            </tr>
            <tr>
                <td>
                    title
                </td>
                 <td>
                    {{$role->title}}
                </td>
            </tr>
            <tr>
                <td>
                    slug
                </td>
                 <td>
                    {{$role->slug}}
                </td>
            </tr>
            <tr>
                <td>
                    description
                </td>
                 <td>
                    {{$role->description}}
                </td>
            </tr>
            
        </tbody>
    </table>
</div>

@endsection