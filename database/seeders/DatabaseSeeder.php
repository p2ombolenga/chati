<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Message;
use Illuminate\Database\Seeder;
use App\Models\user;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      // Post::factory(5)->create();
      Comment::factory(5)->create();
      Message::factory(5)->create();
    }
}
