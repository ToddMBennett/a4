@extends('layouts.master')

@section('title')
    Edit a Bill
@endsection

@section('content')

    <h1>Edit a Bill</h1>
    <hr />

    {{-- Edit Form --}}
    <form method='POST' action='/search'>
          {{ csrf_field() }}

        <div class='formInput'>
            <label for='edit'>Edit a bill </label>
            <input type='text' name='edit' id='search' size='16' placeholder='ID of bill' required='required' value='{{ $edit or '' }}'>
        </div>

    </form>

@endsection
