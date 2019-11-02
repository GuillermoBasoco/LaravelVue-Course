<?php

use Illuminate\Database\Seeder;

class UsersQuestionsAnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();
        \DB::table('answers')->delete();
        \DB::table('questions')->delete();

        factory(App\User::class,3)->create()->each(function($user){

          $user->questions()->saveMany(
              factory(App\Question::class,rand(1,5))->make()
            )
            ->each(function($q){
              $q->answers()->saveMany(factory(App\Answer::class, rand(1,5))->make());
            });

        });
    }
}
