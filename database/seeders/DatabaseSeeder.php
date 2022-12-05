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

        $mgmg=User::factory()->create(['name'=>'mgmg','username'=>'mgmg']);
        $aungaung=User::factory()->create(['name'=>'aungaung','username'=>'aungaung']);
        $front=Category::factory()->create(['name'=>'frontend','slug'=>'frontend']);
        $back=Category::factory()->create(['name'=>'backend','slug'=>'backend']);
        
        Blog::factory(2)->create(['category_id'=>$front->id,'user_id'=>$mgmg->id]);
        Blog::factory(2)->create(['category_id'=>$back->id,'user_id'=>$aungaung->id]);

    }
}
