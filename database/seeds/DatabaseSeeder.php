<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call(BoardsSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(IngredientsSeeder::class);
        $this->call(ProductsSeeder::class);
        $this->call(ProductsIngredientsSeeder::class);
        $this->call(StatusSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Model::reguard();
    }

}
