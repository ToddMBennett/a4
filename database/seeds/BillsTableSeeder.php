<?php

use Illuminate\Database\Seeder;

use App\Bill;

class BillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
         Bill::insert([
             'created_at' => Carbon\Carbon::now()->toDateTimeString(),
             'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
             'comments' => 'Good pancakes',
             'restaurant_id' => 1,
             'date' => '2016-03-30',
             'customers' => 4,
             'calculate' => 25,
         ]);

         Bill::insert([
             'created_at' => Carbon\Carbon::now()->toDateTimeString(),
             'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
             'comments' => 'T-bell is always so good to me',
             'restaurant_id' => 2,
             'date' => '1999-01-14',
             'customers' => 7,
             'calculate' => 7,
         ]);

         Bill::insert([
             'created_at' => Carbon\Carbon::now()->toDateTimeString(),
             'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
             'comments' => 'Great environment and good food',
             'restaurant_id' => 3,
             'date' => '2015-02-20',
             'customers' => 2,
             'calculate' => 30,
         ]);

         Bill::insert([
             'created_at' => Carbon\Carbon::now()->toDateTimeString(),
             'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
             'comments' => 'In pain and sitting by the toilet',
             'restaurant_id' => 4,
             'date' => '2016-06-23',
             'customers' => 5,
             'calculate' => 5,
         ]);

         Bill::insert([
             'created_at' => Carbon\Carbon::now()->toDateTimeString(),
             'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
             'comments' => 'Great nuggets with a lot of tasty fries',
             'restaurant_id' => 5,
             'date' => '2015-10-30',
             'customers' => 6,
             'calculate' => 5,
         ]);

         Bill::insert([
             'created_at' => Carbon\Carbon::now()->toDateTimeString(),
             'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
             'comments' => 'It was not as good as I expected. Soggy burger',
             'restaurant_id' => 6,
             'date' => '2017-03-30',
             'customers' => 3,
             'calculate' => 4,
         ]);
     }
}
