@extends('layouts.master')

@section('title')
    Edit a Bill
@endsection

@section('content')

    <h1>Delete a Bill</h1>
    <hr />

    {{-- Delete Form --}}
    <form method='POST' action='/delete'>
          {{ csrf_field() }}

        <div class='formInput'>
            <label for='delete'>Delete a bill </label>
            <input type='text' name='delete' id='search' size='16' placeholder='ID of bill' required='required' value='{{ $delete or '' }}'>
        </div>

    </form>

@endsection
