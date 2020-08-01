<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Factory(App\User::class)->create([
            'name' => 'User',
            'email' => 'usu@usu.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$HbVPq5WyrlRcvPmSUNGaNek2Vdy/u5/aflmX5TBG9cwr0Zv5tOQAW', //Soyunusuario
            'remember_token' => Str::random(10),
        ]);
    }
}
