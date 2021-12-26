<?php

use Illuminate\Database\Seeder;
use App\Models\UserRole;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userroles=[             

            [
                "role_name"=> "student",
            ],
            [   
                "role_name"=> "teacher",
            ],            
        ];

        for ($i = 0; $i < 2; $i++) {
            UserRole::create($userroles[$i]);
        }
    }
}
