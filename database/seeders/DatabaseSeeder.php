<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();
        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        \App\Models\User::truncate();
        \App\Models\Category::truncate();
        \App\Models\Post::truncate();
        \App\Models\Comment::truncate();

        $count = 1;
        while($count < 21) {
            $category = \App\Models\Category::factory()->create();
            $post_counter = 0;
            while($post_counter < 5) {
                \App\Models\Post::factory()->create([
                    'user_id' => \App\Models\User::factory()->create()->id,
                    'category_id' => $category->id,
                    'thumbnail' => 'postImages/' . strval(random_int(1, 47)) . '.png',
                    'status' => 'published',
                    'total_views' => 0
                ]);
                ++$post_counter;
            }
            while($post_counter < 10) {
                \App\Models\Post::factory()->create([
                    'user_id' => \App\Models\User::factory()->create()->id,
                    'category_id' => $category->id,
                    'thumbnail' => 'postImages/' . strval(random_int(1, 47)) . '.png',
                    'status' => 'published',
                    'total_views' => 0
                ]);
                ++$post_counter;
            }
            $postQuantity = $count * 10;
            $commentCount = 0;
            while($commentCount < 5) {
                \App\Models\Comment::factory(5)->create(['post_id' => ($postQuantity - $commentCount)]);
                ++$commentCount;
            }
            while($commentCount < 10) {
                \App\Models\Comment::factory(5)->create(['post_id' => ($postQuantity - $commentCount)]);
                ++$commentCount;
            }
            ++$count;
        }
        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        // \App\Models\User::factory()->create();


        // \App\Models\Category::create([
        //     'name' => 'aPersonal',
        //     'slug' => 'aPersonal'
        // ]);
        // \App\Models\Category::create([
        //     'name' => 'aWork',
        //     'slug' => 'aWork'
        // ]);
        // \App\Models\Category::create([
        //     'name' => 'aHobbies',
        //     'slug' => 'aHobbies'
        // ]);


        // \App\Models\Post::create([
        //     'user_id' => 1,
        //     'category_id' => 1,
        //     'slug' => 'my-first-aPersonal-post',
        //     'title' => 'My First aPersonal Post',
        //     'excerpt' => 'Illo eaque quia voluptas quis repellendus amet. Esse omnis facere nam voluptas sint culpa est.',
        //     'body' => 'Illo eaque quia voluptas quis repellendus amet. Esse omnis facere nam voluptas sint culpa est. Error eaque quia ut porro cupiditate laboriosam ad. Deserunt enim quod cum. Quidem dolorum porro consectetur ut et dicta cumque cupiditate. Eum asperiores blanditiis beatae omnis consequatur error.'
        // ]);
        // \App\Models\Post::create([
        //     'user_id' => 1,
        //     'category_id' => 2,
        //     'slug' => 'my-first-aWork-post',
        //     'title' => 'My First aWork Post',
        //     'excerpt' => 'Et odio et ut qui adipisci voluptatibus quidem eveniet. Delectus repellendus id error voluptas.',
        //     'body' => 'Et odio et ut qui adipisci voluptatibus quidem eveniet. Delectus repellendus id error voluptas. Quia voluptate molestias qui alias. Itaque consectetur debitis delectus error eligendi. Praesentium architecto et officiis. Incidunt ut est rem quae enim.'
        // ]);
        // \App\Models\Post::create([
        //     'user_id' => 1,
        //     'category_id' => 3,
        //     'slug' => 'my-first-aHobbies-post',
        //     'title' => 'My First aHobbies Post',
        //     'excerpt' => 'Ratione illo qui debitis nihil consequatur itaque. Incidunt sint consequatur dignissimos.',
        //     'body' => 'Ratione illo qui debitis nihil consequatur itaque. Incidunt sint consequatur dignissimos. Alias possimus quas possimus fugit impedit sit recusandae. Molestias inventore ratione minima non recusandae.'
        // ]);
    }
}
