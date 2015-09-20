<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate();
        DB::table('categories')->truncate();

        // ---
        // Categories
        $categories = [
            ['name' => 'Bebidas', 'created_at' => Carbon\Carbon::now()],
            ['name' => 'Saladas', 'created_at' => Carbon\Carbon::now()]
        ];

        foreach ($categories as $key => $val) {
            DB::table('categories')->insert($val);
        }

        // ----
        // Products
        $products = [
            ['categories_id' => 1, 'name' => 'Coca-cola', 'description' => 'refrigerante', 'price' => 3.00, 'stock' => 100, 'created_at' => Carbon\Carbon::now()], // bebidas
            ['categories_id' => 2, 'name' => 'Alface', 'description' => 'Alface verde', 'price' => 0.74, 'stock' => 24, 'created_at' => Carbon\Carbon::now()] // saladas
        ];

        foreach ($products as $key => $val) {
            DB::table('products')->insert($val);
        }
    }
}
