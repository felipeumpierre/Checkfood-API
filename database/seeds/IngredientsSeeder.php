<?php

use Illuminate\Database\Seeder;

class IngredientsSeeder extends Seeder
{
    private $table = 'ingredients';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->table)->truncate();

        $fillable = [
            ['name' => 'Alface', 'created_at' => Carbon\Carbon::now()],
            ['name' => 'Tomate', 'created_at' => Carbon\Carbon::now()],
            ['name' => 'Maionese', 'created_at' => Carbon\Carbon::now()],
            ['name' => 'Ketchup', 'created_at' => Carbon\Carbon::now()],
        ];

        foreach ($fillable as $key => $val) {
            DB::table($this->table)->insert($val);
        }
    }
}