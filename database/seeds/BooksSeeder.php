<?php

use Illuminate\Database\Seeder;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            'Brisiaus galas',
            'Laimės žiburys',
            'Meškeriotojas',
            'Ožkabalių dainos',
        ];

        foreach ($names as $name){
            DB::table('books')->insert([
                'title' => $name,
                'pages' => 100,
                'isbn' => 'vjhGKgJKGJg',
                'short_description' => "Knygos $name trumpas aprašymas",
            ]);
        }
    }
}
