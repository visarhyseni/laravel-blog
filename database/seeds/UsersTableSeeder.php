<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $user = App\User::create([

            'name' => 'Visar Hyseni',
            'email' => 'vi@sa.r',
            'password' => bcrypt('password'),
            'admin' => 1

        ]);

        App\Profile::create([

            'user_id' => $user->id,
            'avatar' => 'uploads/avatars/avatar.jpg',
            'about' => 'Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum ',
            'facebook' => 'facebook.com',
            'youtube' => 'youtube.com'
        ]);
    }
}
