<?php

use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {

        $subjects=[             

            [
                "title"=> "English",
                "description"=> "",
                "module_details"=> "",
            ],
            [   "title"=> "Science",
                "description"=> "",
                "module_details"=> ""
            ],
            [   "title"=> "Maths",
                "description"=> "",
                "module_details"=> ""
            ],  
            [   "title"=> "Arts",
                "description"=> "",
                "module_details"=> ""
            ],            
        ];

        for ($i = 0; $i < 4; $i++) {
            Subject::create($subjects[$i]);
        }
    }
}

