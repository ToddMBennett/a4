<?php

use Illuminate\Database\Seeder;

use App\Restaurant;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurants = [

            ['Pizza Pizza', 'Pizza', 'Chicago', 5, 1930],
            ['Wendys', 'Burger', 'New York', 4.5, 1990],
            ['Marcos', 'Pasta', 'Los Angeles', 3, 2000],
            ['Enfuego', 'Tapas', 'Denver', 4, 1998],
            ['Kims', 'Korean', 'D.C.', 5, 2010],
            ['Plush', 'Bar food', 'Miami', 3.5, 2015],

        ];

        $timestamp = Carbon\Carbon::now()->subDays(count($restaurants));
    }
}
