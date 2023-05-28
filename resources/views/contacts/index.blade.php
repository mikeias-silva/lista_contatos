@extends('layouts.app')
@section('content')
    @include('messages.message')
    @if (Auth::check())
        <a href="{{route('contacts.create')}}">New Contact</a>
    @endif
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
                <td>
                    @if (Auth::check())
                        <a href="{{route('contacts.show', [$contact->id])}}">View</a>
                        <a href="{{route('contacts.edit', [$contact->id])}}">Edit</a>
                        <a href="{{route('contacts.delete', [$contact->id])}}">Delete</a>
                    @else
                        Nothing to show
                    @endif
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
