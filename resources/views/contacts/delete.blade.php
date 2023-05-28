@extends('layouts.app')
@section('content')
    @include('messages.message')
    <form action="{{route('contacts.destroy', [$contact->id])}}" method="POST">
        @csrf
        @method('DELETE')
        <h3>Delete <strong>{{$contact->name}}</strong></h3>
        <p>Are you sure you want to delete this item?</p>
        <ul>
            <li>{{$contact->name}}</li>
            <li>{{$contact->contact}}</li>
            <li>{{$contact->email}}</li>
        </ul>
        <div class="mt-4">
            <a href="{{ url()->previous() }}" class="btn btn-light">
                Back
            </a>
            <button class="btn btn-danger" type="submit">Delete</button>
        </div>

    </form>
@endsection
