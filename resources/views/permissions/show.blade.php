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
                    {{$permission->id}}
                </td>
            </tr>
            <tr>
                <td>
                    title
                </td>
                 <td>
                    {{$permission->title}}
                </td>
            </tr>
            <tr>
                <td>
                    description
                </td>
                 <td>
                    {{$permission->description}}
                </td>
            </tr>
            
        </tbody>
    </table>
</div>

@endsection