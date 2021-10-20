@extends('layouts.layout')
<style>
    th, td{
        text-align: center !important
    }
</style>
@section('content')
<div class="container">
    <h2>Basic Table</h2>
    <table class="table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Mobile</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($users as $item)
          <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->mobile}}</td>
            <td>{{$item->email}}</td>
          </tr>
          @endforeach
       
       
      </tbody>
    </table>
    <span></span>
  </div>
@endsection