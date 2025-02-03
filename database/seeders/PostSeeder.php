<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Database\Factories\Helpers\FactoryHelper;
use Database\Seeders\Traits\ModifyForeignKey;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    use  ModifyForeignKey, TruncateTable;


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->DisableForeignKey();
      $this->truncate('posts');
    $post = Post::factory(50)->untitled()->create();
     $post->each(function (Post $post){
        $post->users()->sync([FactoryHelper::getRandomModelId(User::class)]);
     });
    $this->EnableForeignKey();
    }
}
