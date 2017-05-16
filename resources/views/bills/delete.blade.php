@extends('layouts.master')

@section('title')
    Delete a Bill
@endsection

@section('content')

    <h3>Delete a Bill</h3>
    <hr />

    {{-- Delete Form --}}
    <form method='POST' action='/delete'>
          {{ csrf_field() }}

        <div>
            <div class='formInput'>
                <label for='delete'></label>
                <input type='text' name='delete' id='search' size='10' placeholder='ID of bill' required='required' value='{{ $bill->id or '' }}'>
            </div>

            {{-- Delete button --}}
            <div class = 'formInput'>
                <input type='submit' class='btn btn-primary btn-lg' value='Delete' id='sbmt'><br>
            </div>
        </div>

    </form>

@endsection
