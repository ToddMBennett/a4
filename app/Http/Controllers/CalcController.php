<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use Session;

class CalcController extends Controller
{
    /*
    * GET
    * /welcome
    */
    public function welcome(Request $request) {

        // Validate the request data
        $this->validate($request, [
            'customers' => 'integer|min:2',
            'amount' => 'numeric|min:10',
            'service' => 'numeric',
        ]);


        // Note: If validation fails, it will redirect the visitor back to the form page
        // and none of the code that follows will execute.
        $customers = $request->input('customers');
        $amount = $request->input('amount');
        $service = $request->input('service');

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

        if($calculate != null) {
            $alertType = 'alert-success';
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
    * GET
    * /search
    */
    public function search() {

        $bills = Bill::all();

        return view('bills.search');

    }

    /*
    * GET
    * /add
    */
    public function add(Request $request) {

        return view('bills.add');

    }

    /*
    * POST
    * /storeAdd
    */
    public function storeAdd(Request $request) {

        // Validate the request data
        $this->validate($request, [
            'restaurant' => 'alpha_num',
            'customers' => 'integer|min:2',
            'amount' => 'numeric|min:5',
            'service' => 'numeric',
            'comments' => 'alpha_num',
            'date' => 'date'
        ]);

        // Note: If validation fails, it will redirect the visitor back to the form page
        // and none of the code that follows will execute.

        // Add bill
        $bill = new Bill();
        $bill->restaurant = $request->restaurant;
        $bill->customers = $request->customers;
        $bill->calculate = $request->calculate;
        $bill->date = $request->date;
        $bill->comments = $request->comments;
        $bill->save();

        Session::flash('message', 'Your bill was added');

        return redirect('welcome');

    }

    /*
    * GET
    * /edit
    */
    public function edit() {

        $bills = Bill::all();
        return view('bills.edit')->with([
            'bills' => $bills,
        ]);
    }

    /*
    * POST
    * /edit
    */
    public function storeEdit(Request $request) {

      // Validate the request data
      $this->validate($request, [
          'restaurant' => 'alpha_num',
          'customers' => 'integer|min:2',
          'amount' => 'numeric|min:5',
          'service' => 'numeric',
          'comments' => 'alpha_num',
          'date' => 'date'
      ]);

        $bill = Bill::find($request->id);
        // Edit bill in the database
        $bill->restaurant = $request->restaurant;
        $bill->customers = $request->customers;
        $bill->calculate = $request->calculate;
        $bill->date = $request->date;
        $bill->comments = $request->comments;

        $bill->save();

        Session::flash('message', 'Your edits to '.$bill->title.' were saved.');

        return redirect('/bills/edit/'.$request->id);
    }

    /*
    * GET
    * /delete
    */
    public function delete($id) {

        // Get the bill they're attempting to delete
        $bill = Bill::find($id);


        if(!$bill) {
            Session::flash('message', 'Bill not found.');
            return redirect('/');
        }
        return view('bills.delete')->with('bill', $bill);
    }

    /*
    * POST
    * /delete
    */
    public function storeDelete(Request $request) {


          // Get the bill to be deleted
          $bill = Bill::find($request->id);
          if(!$bill) {
              Session::flash('message', 'Deletion failed; bill not found.');
              return redirect('/');
          }
          // $bill->tags()->detach();
          $bill->delete();

          // Finish
          Session::flash('message', $bill->restaurant.' was deleted.');
          return redirect('/');
    }


}
