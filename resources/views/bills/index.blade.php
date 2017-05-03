@extends('layouts.master')

@section('title')
    Show All
@endsection

@section('content')
  @foreach($bills as $bill)
      <h2>{{ $bill->restaurant }}</h2>
  @endforeach
@endsection
