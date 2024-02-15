<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Achievement;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Comment;
use App\Models\CommentLike;
use App\Models\Like;
use App\Models\Post;
use App\Models\PostLike;
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

            Post::factory(5)->create([
                'user_id' => $user[0]->id,
                'collection_id' => function () use ($collection) {
                    return $collection->pluck('id')->push(null)->random();
                },
                'category_id' => function () use ($categories) {
                    return $categories->pluck('id')->random();
                }
            ])->each(function ($post) {
                $post->tags()->attach(Tag::all()->random(rand(0, 3)));
            });

        }

        Comment::factory(10)->create([
            'user_id' => function () use ($categories) {
                return User::all()->random();
            },
            'post_id' => function () use ($categories) {
                return Post::all()->random();
            },
        ]);

//        PostLike::factory(10)->create([
//            'user_id' => function () use ($categories) {
//                return User::all()->random();
//            },
//            'post_id' => function () use ($categories) {
//                return Post::all()->random();
//            },
//        ]);
//
//        CommentLike::factory(10)->create([
//            'user_id' => function () use ($categories) {
//                return User::all()->random();
//            },
//            'comment_id' => function () use ($categories) {
//                return Comment::all()->random();
//            },
//        ]);
//
//        Likes::factory(10)->create([
//            'user_id' => function () {
//                return User::all()->random();
//            },
//            'likeable_id' => function () {
//                return User::all()->random();
//            },
//            'likeable_type' => function () {
//                return Comment::all()->random();
//            },
//        ]);


//        $likes = Likes::factory()->count(3)->for(
//            Post::factory(), 'likeable'
//        )->create();


        for ($i = 1; $i <= 10; $i++) {
            $model = fake()->randomElement([Post::class, Comment::class]);
            $object = $model::all()->random();

            Like::factory()->create([
                'user_id' => User::all()->random(),
                'likeable_id' => $object->id,
                'likeable_type' => $model,
            ]);
        }

    }
}
