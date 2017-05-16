<?php

use Illuminate\Database\Seeder;

use App\Restaurant;
use App\Tag;

class RestaurantTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
         $bills =[
             'Wendys' => ['classic','date','groups'],
             'Marcos' => ['trendy','formal','groups'],
         ];

         foreach($bills as $restaurant => $tags) {

             // Get bill
             $bill = Bill::where('restaurant','like',$restaurant)->first();

             // loop through
             foreach($tags as $tagName) {
                 $tag = Tag::where('name','LIKE',$tagName)->first();

                 // Connect this tag to this bill
                 $bill->tags()->save($tag);
             }

         }
     }
}
