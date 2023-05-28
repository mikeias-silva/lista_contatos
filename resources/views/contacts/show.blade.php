@extends('layouts.app')
@section('content')
    <div>
        <div class="col-4">
            <label for="name" class="form-label">Name:</label>
            <input type="text" name="name" value="{{ $contact->name}}" readonly class="form-control"/>
        </div>
        <div class="col-4">
            <label for="contact" class="form-label">Contact:</label>
            <input type="text" name="contact" value="{{$contact->contact }}" readonly class="form-control"/>
        </div>
        <div class="col-4">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" value="{{$contact->email}}" readonly class="form-control"/>
        </div>
        <div class="mt-3">
            <a href="{{ url()->previous() }}" class="btn btn-light">
                voltar
            </a>
            <a href="{{route('contacts.edit', [$contact->id])}}" class="btn btn-outline-info">Edit</a>
            <a href="{{route('contacts.delete', [$contact->id])}}" class="btn btn-outline-danger">Delete</a>
        </div>
    </div>
@endsection
