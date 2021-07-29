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
        ];

        User::insert($users);

           // CREATE THE USER

        if (!\DB::table('users')->find(1)) {
            \DB::table('users')->insert([
                0 => [
                    'id'             => 1,
                    'name'           => 'Tony Lea',
                    'email'          => 'tony@hello.com',
                    'password'       => '$2y$10$9ED4Exe2raEeaeOzk.EW6uMBKn3Ib5Q.7kABWaf4QHagOgYHU8ca.',
                    'remember_token' => 'RvlORzs8dyG8IYqssJGcuOY2F0vnjBy2PnHHTX2MoV7Hh6udjJd6hcTox3un',
                    'created_at'     => '2016-07-29 15:13:02',
                    'updated_at'     => '2016-08-18 14:33:50',
                ],
            ]);
        }

        // CREATE THE CATEGORIES

        \DB::table('chatter_categories')->delete();

        \DB::table('chatter_categories')->insert([
            0 => [
                'id'         => 1,
                'parent_id'  => null,
                'order'      => 1,
                'name'       => 'Introductions',
                'color'      => '#3498DB',
                'slug'       => 'introductions',
                'created_at' => null,
                'updated_at' => null,
            ],
            1 => [
                'id'         => 2,
                'parent_id'  => null,
                'order'      => 2,
                'name'       => 'General',
                'color'      => '#2ECC71',
                'slug'       => 'general',
                'created_at' => null,
                'updated_at' => null,
            ],
            2 => [
                'id'         => 3,
                'parent_id'  => null,
                'order'      => 3,
                'name'       => 'Feedback',
                'color'      => '#9B59B6',
                'slug'       => 'feedback',
                'created_at' => null,
                'updated_at' => null,
            ],
            3 => [
                'id'         => 4,
                'parent_id'  => null,
                'order'      => 4,
                'name'       => 'Random',
                'color'      => '#E67E22',
                'slug'       => 'random',
                'created_at' => null,
                'updated_at' => null,
            ],
        ]);

        // CREATE THE DISCUSSIONS

        \DB::table('chatter_discussion')->delete();

        
       
    }
}
