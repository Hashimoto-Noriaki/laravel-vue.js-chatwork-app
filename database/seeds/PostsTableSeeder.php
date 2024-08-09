<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for ($val = 0; $val <= 9; $val++) {
            DB::table('posts')->insert([
                'text' => 'test' . $val,
                'user_id' => $val + 1,
            ]);
        }
    }
}
