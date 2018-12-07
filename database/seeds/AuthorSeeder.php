<?php

use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            'Jonas Biliūnas',
            'Kazys Binkis',
            'Jonas Basanavičius',
        ];

        foreach ($names as $name){
            $arr = explode(' ',trim($name));
            DB::table('authors')->insert([
                'name' => $arr[0],
                'surname' => $arr[1],
            ]);
        }
    }
}
