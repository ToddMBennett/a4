@extends('layouts.master')

@section('title')
    Calculate Page
@endsection

@section('content')
	{{-- Contain the parameters --}}
	<div class='container-fluid'>
			<h1>Bill Splitter</h1>
			<hr />

			<div id='billSplitter'>
			{{-- Form creation and PHP request method GET --}}
			<form method='POST' action='/calculate'>
          {{ csrf_field() }}

					{{-- <!-- Text input for number of paying customers --}}
					<div class='formInput'>
							<label for='split'>Split how many ways? </label>
							<input type='text' name='customers' id='split' size='16' placeholder='Paying customers' required='required' value='{{ $customers or '' }}'>
					</div>

					{{-- Displaying errors after validation check --}}
					@if($errors->get('customers'))
							<ul>
									@foreach($errors->get('customers') as $error)
											<li>{{ $error }}</li>
									@endforeach
							</ul>
					@endif

					{{-- Text input for total bill --}}
					<div class='formInput'>
							<label for='tab'>How much is the tab? $</label>
							<input type='text' name='amount' id='tab' size='16' placeholder='Enter total bill' required='required' value='{{ $amount or '' }}'>
					</div>

					{{-- Displaying errors after validation check --}}
					@if($errors->get('amount'))
							<ul>
									@foreach($errors->get('amount') as $error)
											<li>{{ $error }}</li>
									@endforeach
							</ul>
					@endif

					{{-- Dropdown asking user for level of service --}}
					<div class='formInput'>
					<label for='service'>How was the service? </label>
							<select name='service' id='service'>
									<option value='tipping'>Tipping...</option>
									<option value=.25 @if ($service == .25) echo 'SELECTED' @endif>Great: 25%</option>
									<option value=.20 @if ($service == .20) echo 'SELECTED' @endif>Good: 20%</option>
									<option value=.15 @if ($service == .15) echo 'SELECTED' @endif>OK: 15%</option>
									<option value=.10 @if ($service == .10) echo 'SELECTED' @endif>Not good: 10%</option>
									<option value=.05 @if ($service == .05) echo 'SELECTED' @endif>Horrible: 5%</option>
							</select><br />
					</div>

					{{-- Alert box if user doesn't select service --}}
					@if ($_GET)
							<div class='alert {{ $alertType }}'>
									{{ $results }}
							</div>
					@endif

					{{-- Radio button for rounding up --}}
					<div class='formInput'>
							<label>Would you like to round up? </label>
							<input type='checkbox' name='roundUp' value='yes' @if( $roundUp == 'yes' ) {{ 'CHECKED' }} @endif> Yes
					</div>

					<hr />

					{{-- Calculate button --}}
					<label for='sbmt'></label>
							<input type='submit' class='btn btn-primary btn-lg' value='Calculate' id='sbmt'><br>

					{{-- Alert button - showing amount of what each customer owes --}}
					<div class='btn'>
							<button id="btn" type='button' class='alert alert-success'>{{ $calculate }}</button>
					</div>

          {{-- Save button --}}
          <label for='save'></label>
              <input type='submit' class='btn btn-info btn-lg' value='Save Bill' id='save'><br>

			</form>
			</div>
	</div>
@endsection
