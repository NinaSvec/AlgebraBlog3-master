@extends('layouts.master')

@section('content')

<table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Joined</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at->diffForHumans() }}</td>
        </tr>
    </tbody>
</table>

<a href="{{ route('users.index') }}" class="btn btn-primary">Natrag</a>

@endsection