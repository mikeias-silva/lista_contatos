@extends('layouts.app')
@section('content')
    <form action="{{route('contacts.store')}}" method="POST">
        @csrf
        @include('contacts.form')
        @include('layouts.button_form')
    </form>
@endsection
