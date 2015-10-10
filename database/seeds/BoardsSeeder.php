<?php

use Illuminate\Database\Seeder;

class BoardsSeeder extends Seeder
{
    private $table = 'boards';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->table)->truncate();

        $fillable = [
            ['number' => 1, 'created_at' => Carbon\Carbon::now()],
            ['number' => 2, 'created_at' => Carbon\Carbon::now()],
            ['number' => 3, 'created_at' => Carbon\Carbon::now()],
            ['number' => 4, 'created_at' => Carbon\Carbon::now()],
            ['number' => 5, 'created_at' => Carbon\Carbon::now()],
            ['number' => 6, 'created_at' => Carbon\Carbon::now()],
        ];

        foreach ($fillable as $key => $val) {
            DB::table($this->table)->insert($val);
        }
    }
}