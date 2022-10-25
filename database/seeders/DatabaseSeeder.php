<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Topic;
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
        $topics = Topic::factory()->createMany([
            ['name' => 'Technology'],
            ['name' => 'Automative'],
            ['name' => 'Finance'],
            ['name' => 'Politics'],
            ['name' => 'Culture'],
            ['name' => 'Sports']
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        User::factory(5)
            ->create()
            ->each(function ($user) use ($topics) {
                $posts = Post::factory(rand(2, 5))
                    ->has(Comment::factory(rand(2, 5)))
                    ->recycle($topics)
                    ->create();
                $user->posts()->saveMany($posts);
            });
    }
}
