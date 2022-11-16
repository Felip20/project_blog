<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\User;
use App\Models\Blog;
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
        User::truncate();
        Blog::truncate();
        Category::truncate();

        $front=Category::factory()->create(['name'=>'frontend']);
        $back=Category::factory()->create(['name'=>'backend']);
        
        Blog::factory(2)->create(['category_id'=>$front->id]);
        Blog::factory(2)->create(['category_id'=>$back->id]);

    }
}
