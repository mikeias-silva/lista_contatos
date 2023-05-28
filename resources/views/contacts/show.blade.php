@extends('layouts.master')
@section('content')
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ $contact->name}}" readonly/>

        <label for="contact">Contact:</label>
        <input type="text" name="contact" value="{{$contact->contact }}" readonly/>

        <label for="email">Email:</label>
        <input type="email" name="email" value="{{$contact->email}}" readonly/>
        <a href="{{ url()->previous() }}" class="btn btn-light">
            voltar
        </a>
        <a href="{{route('contacts.edit', [$contact->id])}}">Edit</a>
        <a href="{{route('contacts.delete', [$contact->id])}}">Delete</a>
    </div>
@endsection
