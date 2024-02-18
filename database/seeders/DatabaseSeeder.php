<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Achievement;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Comment;
use App\Models\Favorite;
use App\Models\Follow;
use App\Models\Hide;
use App\Models\Like;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//         User::factory(1)->create(); // add a user row

//        Collection::factory(1)->create();
//
//        $user = User::factory()
//            ->create([
//                'name' => 'Alex',
//                'email' => 'alex@gmail.com',
//            ]);

//        dd($user[0]->id);

//        Post::factory(3)->create([
//            'user_id' => $user->id
//        ])->each(function ($post) {
//            $tags = Tag::factory(rand(1, 5))->create();
//            $post->tag()->attach($tags);
//        });


        // create 10 categories
        $categories = Category::factory(10)->create();

        // create 10 achievements
        Achievement::factory(10)->create();

        // create 20 tags
        Tag::factory(20)->create();


        for ($i = 1; $i <= 3; $i++) {

            // create one user
            $user = User::factory(1)->create()
                ->each(function ($user) {
                    $user->achievements()->attach(Achievement::all()->random(rand(0, 2)));
                });

            // create one collection with certain user
            $collection = Collection::factory(1)->create([
                'user_id' => $user[0]->id
            ]);

            // create n posts with existing user,
            Post::factory(5)->create([
                'user_id' => $user[0]->id,
                'collection_id' => function () use ($collection) {
                    return $collection->pluck('id')->push(null)->random();
                },
                'category_id' => function () use ($categories) {
                    return $categories->pluck('id')->random();
                },
                'views' => function () {
                    return rand(1, 1000);
                }
            ])->each(function ($post) {
                $post->tags()->attach(Tag::all()->random(rand(0, 3)));
            });

        }

        // create n comments with existing users and posts
        Comment::factory(10)->create([
            'user_id' => function () {
                return User::all()->random();
            },
            'post_id' => function () {
                return Post::all()->random();
            },
        ]);


        // create n likes with existing users and objects
//        for ($i = 1; $i <= 10; $i++) {
//            $model = fake()->randomElement([Post::class, Comment::class]);
//            $object = $model::all()->random();
//
//            Like::factory()->create([
//                'user_id' => User::all()->random(),
//                'likeable_id' => $object->id,
//                'likeable_type' => $model,
//            ]);
//        }


        // creates 3 users with 3 favorites records each
        for ($i = 1; $i <= 3; $i++) {
            $numbers = range(1, 15);
            shuffle($numbers);
            $randomNumbers = array_slice($numbers, 0, 3);
            $posts = Post::whereIn('id', $randomNumbers)->get();

            //Favorites
            foreach ($posts as $post) {
                Favorite::factory()->create([
                    'user_id' => User::find($i),
                    'post_id' => $post->id,
                ]);
            }


            // Likes
            $model = fake()->randomElement([Post::class, Comment::class]);
            $object = $model::all()->random();
            Like::factory()->create([
                'user_id' => User::find($i),
                'likeable_id' => $object->id,
                'likeable_type' => $model,
            ]);


            // Hides
            $model = fake()->randomElement([Tag::class, Category::class]);
            $object = $model::all()->random();
            Hide::factory()->create([
                'user_id' => User::all()->random(),
                'hideable_id' => $object->id,
                'hideable_type' => $model,
            ]);


            // Follows
            $model = fake()->randomElement([Tag::class, Category::class]);
            $object = $model::all()->random();
            Follow::factory()->create([
                'user_id' => User::all()->random(),
                'followable_id' => $object->id,
                'followable_type' => $model,
            ]);
        }


//        // create n hides with existing users and objects
//        for ($i = 1; $i <= 10; $i++) {
//            $model = fake()->randomElement([Tag::class, Category::class]);
//            $object = $model::all()->random();
//
//            Hide::factory()->create([
//                'user_id' => User::all()->random(),
//                'hideable_id' => $object->id,
//                'hideable_type' => $model,
//            ]);
//        }


    }
}
