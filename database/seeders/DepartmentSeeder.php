<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->delete();

        $departments = [
            ['id' => 1, 'department_name' => 'Agriculture', 'description' => 'Agriculture', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 2, 'department_name' => 'Animal Husbandary', 'description' => 'Animal Husbandary', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 3, 'department_name' => 'District Supply Office', 'description' => 'District Supply Office', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 4, 'department_name' => 'DRDA', 'description' => 'DRDA', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 5, 'department_name' => 'Drug Inspector Office', 'description' => 'Drug Inspector Office', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 6, 'department_name' => 'Education', 'description' => 'Education', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 7, 'department_name' => 'Food Safety', 'description' => 'Food Safety', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 8, 'department_name' => 'Health', 'description' => 'Health', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 9, 'department_name' => 'Horticulture', 'description' => 'Horticulture', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 10, 'department_name' => 'ICDS', 'description' => 'ICDS', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 11, 'department_name' => 'State Commercial Tax Department', 'description' => 'State Commercial Tax Department', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 12, 'department_name' => 'Weight and Measurment', 'description' => 'Weight and Measurment', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }



        // $users = [
        //     ['id' => 1, 'name' => 'Stephan de Vries', 'username' => 'stephan', 'email' => 'stephan-v@gmail.com', 'password' => bcrypt('carrotz124')],
        //     ['id' => 2, 'name' => 'John doe', 'username' => 'johnny', 'email' => 'johndoe@gmail.com', 'password' => bcrypt('carrotz1243')],
        // ];
    }
}
