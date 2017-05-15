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

        @if($search != null)
            <h2>Results for query: <em>{{ $search }}</em></h2>

            @if(count($searchResults) == 0)
                No matches found.
            @else
                @foreach($searchResults as $restaurant => $bill)
                    <div>
                        <h3>{{ $restaurant }}</h3>
                    </div>
                @endforeach
            @endif
        @endif

    </form>

@endsection
