@extends('layouts.master')

@section('title')
    Search for bills
@endsection

@section('content')
    <div class='formInput'>
        <label for='split'>Search for bill </label>
        <input type='text' name='search' id='search' size='16' placeholder='Restaurant name' required='required' value='{{ $search or '' }}'>
    </div>
@endsection
