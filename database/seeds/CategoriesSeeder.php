<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    private $table = 'categories';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->table)->truncate();

        $fillable = [
            ['name' => 'Bebidas', 'created_at' => Carbon\Carbon::now()],
            ['name' => 'Saladas', 'created_at' => Carbon\Carbon::now()]
        ];

        foreach ($fillable as $key => $val) {
            DB::table($this->table)->insert($val);
        }
    }
}