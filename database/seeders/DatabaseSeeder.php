<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        User::factory(5)
            ->create()
            ->each(function ($user) {
                $posts = Post::factory(rand(2, 5))
                    ->has(Comment::factory(rand(2, 5)))
                    ->create()
                    ->each(function ($post) use ($user) {
//                        $comments = Comment::factory(rand(2, 5))->create();
//                        $post->comments()->saveMany($comments);
//                        $user->comments()->saveMany($comments);
                });
            $user->posts()->saveMany($posts);
        });
    }
}
