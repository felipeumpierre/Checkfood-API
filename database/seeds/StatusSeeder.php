<?php

use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    private $table = 'status';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->table)->truncate();

        $fillable = [
            ['name' => 'Pendente', 'created_at' => Carbon\Carbon::now()],
            ['name' => 'Em produção', 'created_at' => Carbon\Carbon::now()],
            ['name' => 'Atrasado', 'created_at' => Carbon\Carbon::now()],
            ['name' => 'Entregue', 'created_at' => Carbon\Carbon::now()],
        ];

        foreach ($fillable as $key => $val) {
            DB::table($this->table)->insert($val);
        }
    }
}