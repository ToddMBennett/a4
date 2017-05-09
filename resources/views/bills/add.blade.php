@extends('layouts.master')

@section('title')
    Add Bill
@endsection

@section('content')
  <h1>Add bill</h1>
  <hr />

  <form method='POST' action='/add'.$restaurant>

      {{-- Text input for restaurant name --}}
      <div class='formInput'>
          <label for='restaurant'>Restaurant</label>
          <input type='text' required='required' name='restaurant' placeholder="Restaurant name" id='restaurant' value='{{ old('restaurant') }}' />
      </div>

      {{-- Text input for number of paying customers --}}
      <div class='formInput'>
          <label for='split'>Split how many ways? </label>
          <input type='text' name='customers' id='split' size='16' placeholder='Paying customers' required='required' value='{{ old('customers') }}'>
      </div>

      {{-- Text input for each person paid --}}
      <div class='formInput'>
          <label for='calculate'>Each customer paid $</label>
          <input type='text' name='calculate' id='calculate' size='16' placeholder='Each person paid' required='required' value='{{ old('calculate') }}'>
      </div>

      {{-- Date of bill --}}
      <div class='formInput'>
          <label for='date'>Date</label>
          <input type='date' name='date' id='date' required='required' value='{{ old('date') }}'>
      </div>

      <div class='formInput'>
          <label for='comments'>Comments</label>
          <textarea name='comments' id='comments' placeholder='Enter text here' value='{{ old('comments') }}' form='comments'></textarea>
      </div>
      <hr />

      {{-- Add Bill button --}}
      <label for='add'></label>
          <input type='button' class='btn btn-primary btn-lg' value='Add Bill' id='add'><br>

      <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
  </form>

@endsection
