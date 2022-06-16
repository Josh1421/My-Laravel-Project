@extends('layouts.hotel')

@section('content')
<div class="container">

    <div class="d-flex mb-3 col-8 offset-2">
      <div class="pe-2"><a href="/hotel/newguest" class="btn btn-light" style="border-bottom: 1px solid black;">New Guest</a></div>
      <div><a href="/hotel/guestlist" class="btn btn-light" style="border-bottom: 1px solid black;">Guest List</a></div>
    </div>
    <h1 class="mb-4" style="border-bottom: 2px solid black;">Guest List</h1>
    <div>
      <table class="table" style="border: 1px solid gray;">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Middle Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Address</th>
            <th scope="col">Contact Number</th>
            <th scope="col">Gender</th>
            <th scope="col">Email Address</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($guests as $guest )
            <tr>
              <th scope="row">{{ $guest->id }}</th>
              <td>{{ $guest->first_name }}</td>
              <td>{{ $guest->middle_name }}</td>
              <td>{{ $guest->last_name }}</td>
              <td>{{ $guest->address }}</td>
              <td>{{ $guest->contact_number }}</td>
              <td>{{ $guest->gender }}</td>
              <td>{{ $guest->email }}</td>
              <td>{{ $guest->status }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    
</div>
@endsection
