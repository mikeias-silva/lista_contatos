@extends('layouts.app')
@section('content')
    <form action="{{route('contacts.store')}}" method="POST">
        @csrf
        <h2>Create</h2>
        @include('contacts.form')
        @include('layouts.button_form')
    </form>
@endsection
