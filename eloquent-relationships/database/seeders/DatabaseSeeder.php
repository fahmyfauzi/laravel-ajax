<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\Phone;
use App\Models\Comment;
use App\Models\Role;
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

        //one to one
        // $user =  \App\Models\User::factory()->create();
        // $phone = Phone::factory()
        //     ->count(9)
        //     ->for($user)
        //     ->create();

        //one to many
        // $post = Post::factory(5)
        //     ->has(Comment::factory()->count(5))
        //     ->create();
    }
}
