<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;

class CalcController extends Controller
{
    /*
    * GET
    * /show
    */
    public function welcome(Request $request) {

        // Backend validation
        // Had to create unique validate method as 'this->validate' was throwing errors
        // $validator = Validator::make($request->all(), [
        //     'customers' => 'integer|min:2',
        //     'amount' => 'numeric|min:10',
        //     'service' => 'numeric',
        // ]);
        //
        // if ($validator->fails()) {
        //     return redirect('/')
        //                 ->withErrors($validator)
        //                 ->withInput();
        // }

        # Validate the request data
        $this->validate($request, [
            'customers' => 'integer|min:2',
            'amount' => 'numeric|min:10',
            'service' => 'numeric',
        ]);

        # Note: If validation fails, it will redirect the visitor back to the form page
        # and none of the code that follows will execute.

        $customers = $request->input('customers');
        $amount = $request->input('amount');
        $service = $request->input('service');

        #
        #
        # [...Code will eventually go here to actually save this book to a database...]
        #
        #

        # Redirect the user to the page to view the book
        // return redirect('/books/'.$title);

        // Values
        $customers = (isset($_GET['customers'])) ? $_GET['customers'] : '';
        $roundUp = (isset($_GET['roundUp'])) ? $_GET['roundUp'] : '';
        $amount = (isset($_GET['amount'])) ? $_GET['amount'] : '';
        $service = (isset($_GET['service'])) ? $_GET['service'] : '';
        $calculate = null;

        // Displays tipping amount
        if($service != 'tipping') {
            $alertType = 'alert-info';
            $results = 'A tip of '.$service.'% has been added.';
        }

        // Caculation for splitting bill, with rounding or without rounding
        if(is_numeric($amount) && is_numeric($customers)) {
            if($roundUp == 'yes') {
                $calculate = 'Each person should pay $'.ceil(($amount / $customers) * (1 + $service));
            } else {
                $calculate = 'Each person should pay $'.floatval(($amount / $customers) * (1 +$service));
            }
        }

        // Allows variables to be used in view templates
        return view('welcome')->with([
            'calculate' => $calculate,
            'customers' => $customers,
            'amount' => $amount,
            'service' => $service,
            'roundUp' => $roundUp,
            'alertType' => $alertType,
            'results' => $results,
        ]);
    }

    /*
    * POST
    * /calculate
    */
    public function calculate(Request $request) {

        // Backend validation
        // Had to create unique validate method as 'this->validate' was throwing errors
        // $validator = Validator::make($request->all(), [
        //     'customers' => 'integer|min:2',
        //     'amount' => 'numeric|min:10',
        //     'service' => 'numeric',
        // ]);
        //
        // if ($validator->fails()) {
        //     return redirect('/')
        //                 ->withErrors($validator)
        //                 ->withInput();
        // }

        // Values
        $customers = (isset($_GET['customers'])) ? $_GET['customers'] : '';
        $roundUp = (isset($_GET['roundUp'])) ? $_GET['roundUp'] : '';
        $amount = (isset($_GET['amount'])) ? $_GET['amount'] : '';
        $service = (isset($_GET['service'])) ? $_GET['service'] : '';
        $calculate = null;

        // Alerts user if dropdown selection isn't chosen
        if($service == 'tipping') {
            $alertType = 'alert-danger';
            $results = 'No tip was added. Please choose the level of service.';
        }
        else {
            $alertType = 'alert-info';
            $results = 'A tip of '.$service.'% has been added.';
        }

        // Caculation for splitting bill, with rounding or without rounding
        if(is_numeric($amount) && is_numeric($customers)) {
            if($roundUp == 'yes') {
                $calculate = 'Each person should pay $'.ceil(($amount / $customers) * (1 + $service));
            } else {
                $calculate = 'Each person should pay $'.floatval(($amount / $customers) * (1 +$service));
            }
        }

        // Allows variables to be used in view templates
        return view('calculate')->with([
            'calculate' => $calculate,
            'customers' => $customers,
            'amount' => $amount,
            'service' => $service,
            'roundUp' => $roundUp,
            'alertType' => $alertType,
            'results' => $results,
        ]);
    }

    public function showAll() {

        $bills = Bill::all();
        return view('bills.show')->with([
            'bills' => $bills,
        ]);
    }

}
