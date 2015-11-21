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
            ['number' => 1, 'status_id' => 1, 'created_at' => Carbon\Carbon::now()],
            ['number' => 2, 'status_id' => 1, 'created_at' => Carbon\Carbon::now()],
            ['number' => 3, 'status_id' => 1, 'created_at' => Carbon\Carbon::now()],
            ['number' => 4, 'status_id' => 1, 'created_at' => Carbon\Carbon::now()],
            ['number' => 5, 'status_id' => 1, 'created_at' => Carbon\Carbon::now()],
            ['number' => 6, 'status_id' => 1, 'created_at' => Carbon\Carbon::now()],
        ];

        foreach ($fillable as $key => $val) {
            DB::table($this->table)->insert($val);
        }
    }
}