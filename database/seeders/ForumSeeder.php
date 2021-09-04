<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ForumCategory;

class ForumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $roles = [
            [
                'id'    => 1,
                'name' => 'Reglas de la Comunidad',
            ]
        ];

        ForumCategory::insert($roles);
    }
}
