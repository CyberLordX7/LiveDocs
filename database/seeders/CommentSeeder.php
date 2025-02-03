<?php

namespace Database\Seeders;

use Database\Seeders\Traits\ModifyForeignKey;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    use TruncateTable, ModifyForeignKey;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->DisableForeignKey();
        $this->truncate('comments');
        \App\Models\Comment::factory(5)->create();
    }
}
