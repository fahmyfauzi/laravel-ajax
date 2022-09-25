@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-3">
        <button class="btn btn-success btn-sm" id="btn-add-contact">+ Add</button>
    </div>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <td>Name</td>
            <td>Email</td>
            <td>Phone</td>
            <td>Option</td>
        </tr>
    </thead>
    <tbody id="table-contacts">
        @foreach ($contacts as $item)
        <tr id="index_{{$item->id}}">
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->phone }}</td>
            <td>
                <a href="javascript:void(0)" id="btn-edit-contact" data-id="{{ $item->id }}"
                    class="btn btn-warning btn-sm">Edit</a>
                <a href="javascript:void(0)" id="btn-delete-contact" data-id="{{ $item->id }}"
                    class="btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@include('components.add-modal')
@include('components.edit-modal')
@include('components.delete-contact')

@endsection