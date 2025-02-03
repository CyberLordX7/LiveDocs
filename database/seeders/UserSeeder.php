<?php

namespace Database\Seeders;


use Database\Seeders\Traits\ModifyForeignKey;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    use TruncateTable ,ModifyForeignKey;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->DisableForeignKey();
        $this->truncate('users');
         \App\Models\User::factory(10)->create();
        $this->EnableForeignKey();
    }
}
