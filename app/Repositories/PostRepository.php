<?php

namespace App\Repositories;

use App\Exceptions\GeneralJsonException;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostRepository extends BaseRepository {
    public function create(array $attributes){

        return DB::transaction(function () use ($attributes) {
            $created = Post::query()->create([
                'title'=>data_get($attributes,'title','untitled'),
                'body'=>data_get($attributes,'body'),
            ]);
            throw_if(!$created, GeneralJsonException::class, 'Error creating Post...');
            if($userIds = data_get($attributes,'user_ids')){
                $created->users()->sync($userIds);
            }
            return $created;
        });
    }

    public function update($post, array $attributes){
        return DB::transaction(function () use ($post, $attributes){
            $updated = $post->update([
                'title'=>data_get($attributes,'title') ?? $post->title,
                'body'=>data_get($attributes, 'body') ?? $post->body,
            ]);
            throw_if(!$updated, GeneralJsonException::class, 'Failed to Update Post');
            if($userIds = data_get($attributes, 'user_ids')){
                $post->users()->sync($userIds);
            }
            return $post;
        });

    }

    public function forceDelete($post){
        return DB::transaction(function () use ($post){
          $deleted = $post->forceDelete();
          throw_if(!$deleted, GeneralJsonException::class, 'Error Deleting Post...!');
          return $deleted;
        });
    }
}
