@extends('web.master')
@section('main')
@if(!empty($data))
    <table border="1">
        <tr>
            <td>Name</td>
        </tr>
        @foreach ($data as $item)

        <tr>
            <td>{{ $item->tensp }}</td>
        </tr>

        @endforeach
    </table>
@endif
@stop