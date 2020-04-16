<?php

use Illuminate\Database\Seeder;

use App\Category;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Support\Facades\Hash;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category1 = Category::create([
            'name' => 'News',
        ]);

        $category2 = Category::create([
            'name' => 'Updates',
        ]);

        $category3 = Category::create([
            'name' => 'Design',
        ]);

        $category4 = Category::create([
            'name' => 'Product',
        ]);

        $category5 = Category::create([
            'name' => 'Offers',
        ]);

        $author1 = User::create([
            'name' => 'Pawcio Zarzycki',
            'email' =>'pawelek@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $author2 = User::create([
            'name' => 'Czarek Zarzycki',
            'email' =>'czarek90@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $post1 = Post::create([
            'title' => 'Relocated office to new Garage:)',
            'description' => 'Post number 1',
            'content' => 'Content number 2',
            'category_id' => $category1->id,
            'image' => 'posts/1.jpg',
            'user_id' => $author1->id
        ]);

        $post2 = Post::create([
            'title' => 'Top 5 brilliant content marketing strategies',
            'description' => 'Post number 2',
            'content' => 'Content number 3',
            'category_id' => $category2->id,
            'image' => 'posts/2.jpg',
            'user_id' => $author2->id
        ]);

        $post3 = Post::create([
            'title' => 'Best practices for minimalist design with example',
            'description' => 'Post number 3',
            'content' => 'Content number 3',
            'category_id' => $category3->id,
            'image' => 'posts/3.jpg',
            'user_id' => $author2->id
        ]);

        $post4 = Post::create([
            'title' => 'Congratulate and thank to Maryam for joining our team:)',
            'description' => 'Post number 4',
            'content' => 'Content number 4',
            'category_id' => $category4->id,
            'image' => 'posts/4.jpg',
            'user_id' => $author2->id
        ]);

        $tag1 = Tag::create([
            'name' => 'customer',
        ]);

        $tag2 = Tag::create([
            'name' => 'record',
        ]);

        $tag3 = Tag::create([
            'name' => 'offer',
        ]);


        $post1->tags()->attach([$tag1->id, $tag2->id]);
        $post2->tags()->attach([$tag1->id, $tag3->id]);
        $post3->tags()->attach([$tag1->id]);
        $post4->tags()->attach([$tag3->id]);

    }
}
