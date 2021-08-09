<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'                 => 1,
                'name'               => 'Admin',
                'email'              => 'admin@admin.com',
                'password'           => bcrypt('password'),
                'remember_token'     => null,
                'verified'           => 1,
                'verified_at'        => '2021-07-22 00:14:06',
                'verification_token' => '',
                'facebook'           => '',
                'twitter'            => '',
                'instagram'          => '',
                'website'            => '',
                'career'             => '',
                'linkedin'           => '',
            ],            

            [
                'id'                 => 2,
                'name'               => 'Tamara Pimentel',
                'email'              => 'tamara@test.com',
                'password'           => bcrypt('secret'),
                'remember_token'     => null,
                'verified'           => 1,
                'verified_at'        => '2021-07-22 00:14:06',
                'verification_token' => '',
                'facebook'           => '',
                'twitter'            => '',
                'instagram'          => '',
                'website'            => '',
                'career'             => '',
                'linkedin'           => '',
            ],            

            [
                'id'                 => 3,
                'name'               => 'Oliver Montor',
                'email'              => 'oliver@test.com',
                'password'           => bcrypt('secret'),
                'remember_token'     => null,
                'verified'           => 1,
                'verified_at'        => '2021-07-22 00:14:06',
                'verification_token' => '',
                'facebook'           => '',
                'twitter'            => '',
                'instagram'          => '',
                'website'            => '',
                'career'             => '',
                'linkedin'           => '',
            ],
        ];

        User::insert($users);
    }
}
