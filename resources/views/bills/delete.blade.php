@extends('layouts.master')

@section('title')
    Delete Bill
@endsection

@section('content')
    <div class='formInput'>
        <label for='split'>Delete bill </label>
        <input type='text' name='search' id='search' size='16' placeholder='Restaurant name' required='required' value='{{ $delete or '' }}'>
    </div>
@endsection
