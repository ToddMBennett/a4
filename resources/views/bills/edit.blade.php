@extends('layouts.master')

@section('title')
    Edit Bill
@endsection

@section('content')
  @foreach($bills as $bill)
      <h2>{{ $bill->restaurant }}</h2>
  @endforeach
@endsection
