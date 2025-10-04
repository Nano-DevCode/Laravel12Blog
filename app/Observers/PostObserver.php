<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostObserver
{
    public function updating(Post $post)
    {
        if($post->is_published){
            if($post->is_published == 1 && !$post->published_at){
                $post->published_at = now();
            }
        }
    }

    public function deleted(Post $post)
    {
        if($post->image_path){
            Storage::delete($post->image_path);
        }
    }
}
