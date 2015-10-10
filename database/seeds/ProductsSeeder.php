<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    private $table = 'products';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->table)->truncate();

        $fillable = [
            ['categories_id' => 1, 'name' => 'Coca-cola', 'description' => 'refrigerante', 'price' => 3.00, 'stock' => 100, 'created_at' => Carbon\Carbon::now()], // bebidas
            ['categories_id' => 2, 'name' => 'Alface', 'description' => 'Alface verde', 'price' => 0.74, 'stock' => 24, 'created_at' => Carbon\Carbon::now()] // saladas
        ];

        foreach ($fillable as $key => $val) {
            DB::table($this->table)->insert($val);
        }
    }
}