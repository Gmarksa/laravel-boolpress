<?php
  
    use Illuminate\Database\Seeder;

    use Faker\Generator as Faker;
    use App\Post;


    class PostSeeder extends Seeder

    {

     /**
     * Run the database seeds.
     *
     * @return void
     */

     public function run(Faker $faker)
     {
        for ($i = 0; $i < 10; $i++) { 
            $newPost = new Post();

            $newPost->title = $faker->sentence();
            $newPost->text = $faker->text();
            $newPost->author = $faker->name();
            $newPost->category = $faker->words(1, true);

            $newPost->save();
        }
     }
}