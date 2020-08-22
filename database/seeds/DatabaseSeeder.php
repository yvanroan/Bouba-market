<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Subcategory;
use App\Product;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
        		'name'=>'Liked Manga',
        		'slug'=>'manga',
        		'description'=>'The list of asian cartoon I enjoyed watching',
        		'image'=>'files/positif.jpeg'
        ]);

        Category::create([
        		'name'=>'Wolf',
        		'slug'=>'wolf',
        		'description'=>'The one and only species, wolves',
        		'image'=>'files/the_wolf.jpeg'
        ]);

        Subcategory::create([
        		'name'=>'Shonen',
        		'category_id'=>1
        ]);

        Subcategory::create([
        		'name'=>'Seinen',
        		'category_id'=>1
        ]);

        Subcategory::create([
        		'name'=>'Isekai',
        		'category_id'=>1
        ]);

        Subcategory::create([
        		'name'=>'Alpha male',
        		'category_id'=>2
        ]);

        Product::create([
        		'name'=>'Kingdom',
        		'image'=>'product/kingdom.jpeg',
        		'price'=>rand(18,21),
        		'description'=>'The history of the unification of china',
        		'additional_info'=>'the protagonist are Ri Shin and Ei Sei',
        		'category_id'=>1,
        		'subcategory_id'=>2
        ]);

        Product::create([
        		'name'=>'HunterXHunter',
        		'image'=>'product/HunterXHunter.jpeg',
        		'price'=>rand(20,29),
        		'description'=>'The story of a young boy looking for his father',
        		'additional_info'=>'the protagonist are Gon Fritz and Kilhua Zoldjik',
        		'category_id'=>1,
        		'subcategory_id'=>1
        ]);

        Product::create([
        		'name'=>'Naruto',
        		'image'=>'product/Naruto.jpeg',
        		'price'=>rand(35,45),
        		'description'=>'The story of a young orphan who will become the greatest shinobi of its time',
        		'additional_info'=>'the protagonist are Naruto Uzumaki and Sasuke Uchiha',
        		'category_id'=>1,
        		'subcategory_id'=>1
        ]);

        Product::create([
        		'name'=>'Naruto',
        		'image'=>'product/Naruto.jpeg',
        		'price'=>rand(35,45),
        		'description'=>'The story of a young orphan who will become the greatest shinobi of its time',
        		'additional_info'=>'the protagonist are Naruto Uzumaki and Sasuke Uchiha',
        		'category_id'=>1,
        		'subcategory_id'=>1
        ]);

        User::create([
        		'name'=>'Yvanroan',
        		'email'=>'yvanroan@admin.com',
        		'email_verified_at'=>Now(),
        		'password'=>bcrypt('password'),
        		'address'=>'Africa',
        		'phone_number'=>'00273699785437',
        		'is_admin'=>1
        ]);
    }
}
