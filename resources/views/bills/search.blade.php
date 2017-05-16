@extends('layouts.master')

@section('title')
    Search for bills
@endsection

@section('content')

    <h3>Search Bills</h3>
    <hr />

    {{-- Search form --}}
    <form method='GET' action='/search'>

        <div>

            {{-- Restaurant field --}}
            <div class='formInput'>
                <label for='search'></label>
                <input type='text' name='search' id='search' size='16' placeholder='Restaurant name' required='required' value='{{ $search or '' }}'>
            </div>

            {{-- Search button --}}
            <div class = 'formInput'>
                <input type='submit' class='btn btn-primary btn-lg' value='Search' id='sbmt'><br>
            </div>

        </div>

    </form>

@endsection
