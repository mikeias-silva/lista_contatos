@extends('layouts.master')
@section('content')
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Contact</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
        @foreach($contacts as $contact)
            <tr>
                <td>$contact->id</td>
                <td>$contact->name</td>
                <td>$contact->contact</td>
                <td>$contact->email</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection