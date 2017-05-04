@extends('layouts.master')

@section('title')
    Add Bill
@endsection

@section('content')
  <h1>Add bill</h1>
  <hr />

  <form method='GET' action='/save'>

      <div class='formInput'>
          <label for='restaurant'>Restaurant</label>
          <input type='text' required='required' name='restaurant' id='restaurant' placeholder='Name of restaurant' value='{{ old('restaurant') }}' />
      </div>

      {{-- <!-- Text input for number of paying customers --}}
      <div class='formInput'>
          <label for='split'>Split how many ways? </label>
          <input type='text' name='customers' id='split' size='16' placeholder='Paying customers' required='required' value='{{ $customers or '' }}'>
      </div>

      {{-- Text input for total bill --}}
      <div class='formInput'>
          <label for='tab'>Total including tip? $</label>
          <input type='text' name='amount' id='tab' size='16' placeholder='Enter total bill' required='required' value='{{ $calculate or '' }}'>
      </div>
      <hr />

      {{-- Add Bill button --}}
      <label for='add'></label>
          <input type='submit' class='btn btn-primary btn-lg' value='Add Bill' id='add'><br>

  </form>

@endsection
