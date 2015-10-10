<?php

use Illuminate\Database\Seeder;

class ProductsIngredientsSeeder extends Seeder
{
    private $table = 'products_ingredients';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->table)->truncate();

        $fillable = [
            ['products_id' => 2, 'ingredients_id' => 1, 'created_at' => Carbon\Carbon::now()],
            ['products_id' => 2, 'ingredients_id' => 2, 'created_at' => Carbon\Carbon::now()],
        ];

        foreach ($fillable as $key => $val) {
            DB::table($this->table)->insert($val);
        }
    }
}