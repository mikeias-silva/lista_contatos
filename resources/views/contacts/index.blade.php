@extends('layouts.master')
@section('content')
    @include('messages.message')
    <a href="{{route('contacts.create')}}">New Contact</a>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Contact</th>
            <th>Email</th>
            <th>Options</th>
        </tr>
        </thead>
        <tbody>
        @foreach($contacts as $contact)
            <tr>
                <td>{{$contact->id}}</td>
                <td>{{$contact->name}}</td>
                <td>{{$contact->contact}}</td>
                <td>{{$contact->email}}</td>
                <td><a href="{{route('contacts.edit', [$contact->id])}}">Edit</a>
                    <a href="{{route('contacts.delete', [$contact->id])}}">Delete</a>
                </td>
            </tr>
        @endforeach
        @empty($contact)
            <tr>
                <td colspan="5">Nothing here</td>
            </tr>
        @endempty
        </tbody>
    </table>
@endsection
