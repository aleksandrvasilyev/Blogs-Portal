<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Achievement;
use App\Models\Category;
use App\Models\Group;
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
    public function run()
    {

        $categories = Category::factory(10)->create();

        $achievement = Achievement::factory(10)->create();

        $tags = Tag::factory(30)->create();

        $users = User::factory(10)->create();

        $firstUser = $users->first();
        $firstUser->email = 'admin@example.com';
        $firstUser->password = bcrypt('password');
        $firstUser->save();

//        $groups = Group::factory(50)->recycle($users)->create();

        $posts = Post::factory(100)->recycle($users)->recycle($categories)->create();

        $comments = Comment::factory(100)->recycle($users)->recycle($posts)->create();


        Post::all()->each(function ($post) {
            $post->tags()->attach(
                Tag::all()->random(rand(1, 3))->pluck('id')->toArray()
            );
        });

        User::all()->each(function ($user) {
            $user->achievements()->attach(
                Achievement::all()->random(rand(0, 2))->pluck('id')->toArray()
            );
        });


///////////////////////////////////////////////////////////////////////////////////////////////////


        // create 10 achievements
//        Achievement::factory()->count(10)->create();
//
//        // create 10 categories
//        Category::factory()->count(10)->create();
//
//        // create 10 tags
//        Tag::factory()->count(10)->create();
//
//        // create 5 users
//        User::factory(5)->create()->each(function ($user) {
//
//            // user create 1-2 groups
//            $user->groups()->createMany(
//                Group::factory(rand(0, 1))->make([
//                    'user_id' => $user->id
//                ])->toArray()
//            );
//
//            // create 3 posts
//            $user->posts()->createMany(
//                Post::factory(3)->make([
//                    'user_id' => $user->id,
//                    // set 1 category to a post
//                    'category_id' => function () {
//                        return Category::all()->random();
//                    },
//                    // set 0-1 groups to a post from existing user's groups
//                    'group_id' => function () use ($user) {
//                        return rand(0, 1) === 0 ? null : Group::where('user_id', $user->id)->inRandomOrder()->first();
//                    },
//                ])
//                    ->toArray()
//            )->each(function ($post) {
//                // attach 1-3 tags to a post
//                $post->tags()->attach(Tag::all()->random(rand(0, 3))->pluck('id'));
//
//                // create 0-3 comments to a post
//                $post->comments()->createMany(Comment::factory()->count(rand(0, 3))->make(['post_id' => $post->id, 'user_id' => function () {
//                    return User::all()->random();
//                }])->toArray());
//
//            });
//
//        })->each(function ($user) {
//            // attach 0-3 achievements to a user
//            $user->achievements()->attach(Achievement::all()->random(rand(0, 3)));
//        });
//

        // user actions
        $users = User::all();
        $users->each(function ($user) {

            // user creates 0-3 favorites to existing posts
            $post = Post::all()->random();
            if (!Favorite::where('user_id', $user->id)
                ->where('post_id', $post->id)
                ->exists()) {
                Favorite::factory()->create([
                    'user_id' => $user->id,
                    'post_id' => $post->id,
                ]);
            }


            // user likes 0-5 {posts or comments} from existing
            $postIds = Post::pluck('id')->shuffle()->take(rand(0, 5))->toArray();
            $commentIds = Comment::pluck('id')->shuffle()->take(rand(0, 5))->toArray();

            $likeableIds = array_merge($postIds, $commentIds);

            foreach ($likeableIds as $id) {
                $likeableType = in_array($id, $postIds) ? Post::class : Comment::class;
                if (!Like::where('user_id', $user->id)
                    ->where('likeable_id', $id)
                    ->where('likeable_type', $likeableType)
                    ->exists()) {
                    Like::factory()->create([
                        'user_id' => $user->id,
                        'likeable_id' => $id,
                        'likeable_type' => $likeableType,
                    ]);
                }
            }


            // user hides 0-5 {categories or tags} from existing
            $categoryIds = Category::pluck('id')->shuffle()->take(rand(0, 5))->toArray();
            $tagIds = Tag::pluck('id')->shuffle()->take(rand(0, 5))->toArray();

            $hideableIds = array_merge($categoryIds, $tagIds);

            foreach ($hideableIds as $id) {
                $hideableType = in_array($id, $categoryIds) ? Category::class : Tag::class;
                if (!Hide::where('user_id', $user->id)
                    ->where('hideable_id', $id)
                    ->where('hideable_type', $hideableType)
                    ->exists()) {
                    // Создаем скрытую запись
                    Hide::factory()->create([
                        'user_id' => $user->id,
                        'hideable_id' => $id,
                        'hideable_type' => $hideableType,
                    ]);
                }
            }


            // user follow 0-5 {categories or tags} from existing
            $categoryIds = Category::pluck('id')->shuffle()->take(rand(0, 5))->toArray();
            $tagIds = Tag::pluck('id')->shuffle()->take(rand(0, 5))->toArray();

            $followableIds = array_merge($categoryIds, $tagIds);

            foreach ($followableIds as $id) {
                $followableType = in_array($id, $categoryIds) ? Category::class : Tag::class;
                if (!Follow::where('user_id', $user->id)
                    ->where('followable_id', $id)
                    ->where('followable_type', $followableType)
                    ->exists()) {
                    Follow::factory()->create([
                        'user_id' => $user->id,
                        'followable_id' => $id,
                        'followable_type' => $followableType,
                    ]);
                }
            }


        });

    }


}
