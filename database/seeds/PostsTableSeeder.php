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
        for ($val = 1; $val <= 15; $val++) {
            DB::table('posts')->insert([
                'text' => 'test' . $val,
                'user_id' => $val,
                'created_at'=> now()
            ]);
        }
    }
}
