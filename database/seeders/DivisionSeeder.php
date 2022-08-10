<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('divisions')->delete();

        $divisions = [
            // Agriculture
            ['id' => 1, 'district' => 'Anantapuramu', 'division' => 'Anantapuramu', 'dept_id' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 2, 'district' => 'Anantapuramu', 'division' => 'Gooty', 'dept_id' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 3, 'district' => 'Anantapuramu', 'division' => 'Kalyandurg', 'dept_id' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 4, 'district' => 'Anantapuramu', 'division' => 'Rayadurg', 'dept_id' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 5, 'district' => 'Anantapuramu', 'division' => 'Tadipatri', 'dept_id' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 6, 'district' => 'Anantapuramu', 'division' => 'Uravakonda', 'dept_id' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            // Animal Husbandary
            ['id' => 7, 'district' => 'Anantapuramu', 'division' => 'Anantapuramu', 'dept_id' => 2, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 8, 'district' => 'Anantapuramu', 'division' => 'Uravakonda', 'dept_id' => 2, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            //District Civil Supply Office
            ['id' => 9, 'district' => 'Anantapuramu', 'division' => 'Anantapuramu', 'dept_id' => 3, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 10, 'district' => 'Anantapuramu', 'division' => 'Guntakal', 'dept_id' => 3, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 11, 'district' => 'Anantapuramu', 'division' => 'Kalyandurg', 'dept_id' => 3, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            // Health
            ['id' => 12, 'district' => 'Anantapuramu', 'division' => 'Anantapuramu', 'dept_id' => 8, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 13, 'district' => 'Anantapuramu', 'division' => 'Guntakal', 'dept_id' => 8, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 14, 'district' => 'Anantapuramu', 'division' => 'Kalyandurg', 'dept_id' => 8, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            //DRDA
            ['id' => 15, 'district' => 'Anantapuramu', 'division' => 'Anantapuramu', 'dept_id' => 4, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            //Drug Inspector
            ['id' => 16, 'district' => 'Anantapuramu', 'division' => 'Anantapuramu', 'dept_id' => 5, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 17, 'district' => 'Anantapuramu', 'division' => 'Guntakal', 'dept_id' => 5, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 18, 'district' => 'Anantapuramu', 'division' => 'Kalyandurg', 'dept_id' => 5, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            //Education
            ['id' => 19, 'district' => 'Anantapuramu', 'division' => 'Anantapuramu', 'dept_id' => 6, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 20, 'district' => 'Anantapuramu', 'division' => 'Dharmavaram', 'dept_id' => 6, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 21, 'district' => 'Anantapuramu', 'division' => 'Gooty', 'dept_id' => 6, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            //Food Safety
            ['id' => 22, 'district' => 'Anantapuramu', 'division' => 'Division-1', 'dept_id' => 7, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 23, 'district' => 'Anantapuramu', 'division' => 'Division-2', 'dept_id' => 7, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            // Horticulture
            ['id' => 24, 'district' => 'Anantapuramu', 'division' => 'Anantapuramu', 'dept_id' => 9, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 25, 'district' => 'Anantapuramu', 'division' => 'B.K.Samudram', 'dept_id' => 9, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 26, 'district' => 'Anantapuramu', 'division' => 'Gooty', 'dept_id' => 9, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 27, 'district' => 'Anantapuramu', 'division' => 'Kalyandurg', 'dept_id' => 9, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 28, 'district' => 'Anantapuramu', 'division' => 'Kambadur', 'dept_id' => 9, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 29, 'district' => 'Anantapuramu', 'division' => 'Narpala', 'dept_id' => 9, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 30, 'district' => 'Anantapuramu', 'division' => 'Raptadu', 'dept_id' => 9, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 31, 'district' => 'Anantapuramu', 'division' => 'Rayadurgam', 'dept_id' => 9, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 32, 'district' => 'Anantapuramu', 'division' => 'Tadipatri', 'dept_id' => 9, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 33, 'district' => 'Anantapuramu', 'division' => 'Uravakonda', 'dept_id' => 9, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            // ICDS
            ['id' => 34, 'district' => 'Anantapuramu', 'division' => 'Anantapuramu', 'dept_id' => 10, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 35, 'district' => 'Anantapuramu', 'division' => 'Gooty', 'dept_id' => 10, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 36, 'district' => 'Anantapuramu', 'division' => 'Kalyandurg', 'dept_id' => 10, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 37, 'district' => 'Anantapuramu', 'division' => 'Kambadur', 'dept_id' => 10, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 38, 'district' => 'Anantapuramu', 'division' => 'Kanekal', 'dept_id' => 10, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 39, 'district' => 'Anantapuramu', 'division' => 'Kudair', 'dept_id' => 10, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 40, 'district' => 'Anantapuramu', 'division' => 'Rayaduram', 'dept_id' => 10, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 41, 'district' => 'Anantapuramu', 'division' => 'Singanamala', 'dept_id' => 10, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 42, 'district' => 'Anantapuramu', 'division' => 'Tadipatri', 'dept_id' => 10, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 43, 'district' => 'Anantapuramu', 'division' => 'Uravakonda', 'dept_id' => 10, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],

            // Commercial Tax Department
            ['id' => 44, 'district' => 'Anantapuramu', 'division' => 'Anantapuramu', 'dept_id' => 11, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 45, 'district' => 'Anantapuramu', 'division' => 'Guntakal', 'dept_id' => 11, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 46, 'district' => 'Anantapuramu', 'division' => 'Kalyandurg', 'dept_id' => 11, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 47, 'district' => 'Anantapuramu', 'division' => 'Tadipatri', 'dept_id' => 11, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],

            // Weight and Measurement
            ['id' => 48, 'district' => 'Anantapuramu', 'division' => 'Anantapuramu', 'dept_id' => 12, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 49, 'district' => 'Anantapuramu', 'division' => 'Guntakal', 'dept_id' => 12, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 50, 'district' => 'Anantapuramu', 'division' => 'Kalyandurg', 'dept_id' => 12, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],

        ];

        foreach ($divisions as $division) {
            Division::create($division);
        }
    }
}
