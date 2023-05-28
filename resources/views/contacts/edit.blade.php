@extends('layouts.app')
@section('content')
    <form action="{{route('contacts.update', [$contact->id])}}" method="POST">
        @csrf
        @method('PUT')
        @include('contacts.form')
        @include('layouts.button_form')
    </form>
@endsection
