<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // création de deux catégories définies
        DB::table('categories')->insert([
            ['name' => 'Enfant'],
            ['name' => 'Team Building'],
        ]);
    }
}
