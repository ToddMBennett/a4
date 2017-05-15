@extends('layouts.master')

@section('title')
    Edit a Bill
@endsection

@section('content')

    <h3>Edit a Bill</h3>
    <hr />

    {{-- Edit Form --}}
    <form method='POST' action='/search'>
          {{ csrf_field() }}

        <div>
            <div class='formInput'>
                <label for='edit'></label>
                <input type='text' name='edit' id='edit' size='10' placeholder='ID of bill' required='required' value='{{ $id or '' }}'>
            </div>

            {{-- Edit button --}}
            <div class = 'formInput'>
                <input type='submit' class='btn btn-primary btn-lg' value='Edit' id='sbmt'><br>
            </div>
        </div>

    </form>

@endsection
