@extends('layouts.master')

@section('title')
    Search for bills
@endsection

@section('content')

    <h1>Search Bills</h1>
    <hr />

    {{-- Search form --}}
    <form method='GET' action='/search'>

        <div class='formInput'>
            <label for='search'>Search for bill </label>
            <input type='text' name='search' id='search' size='16' placeholder='Restaurant name' required='required' value='{{ $search or '' }}'>
        </div>

    </form>

@endsection
