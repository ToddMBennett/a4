@extends('layouts.master')

@section('title')
    Edit Bill
@endsection


@section('content')
      <h1>Edit Bill</h1>
      <hr />
      <div class='formInput'>
          <label for='split'>Edit bill </label>
          <input type='text' name='search' id='search' size='16' placeholder='Restaurant name' required='required' value='{{ $edit or '' }}'>
      </div>
@endsection
