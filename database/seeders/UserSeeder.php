<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $users = [
            ['id' => 1, 'name' => 'Raja Kammara', 'email' => "kraja200709@gmail.com", "mobile_no" => "9703170422", "password" => bcrypt('12345678'), 'role' => 'master_admin', 'district' => "Anantapuramu", "can_forward_issue" => false, "can_close_issue" => false, 'is_deptuser' => true, 'dept_id' => Null, 'division_id' => Null, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'latitude' => '', 'longitude' => '', 'mandal' => '',],
            ['id' => 2, 'name' => 'Admin', 'email' => "jcantp123@gmail.com", "mobile_no" => "9849399611", "password" => bcrypt('12345678'), 'role' => 'local_admin', 'district' => "Anantapuramu", "can_forward_issue" => false, "can_close_issue" => false, 'is_deptuser' => true, 'dept_id' => Null, 'division_id' => Null, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'latitude' => '', 'longitude' => '', 'mandal' => '',],
            //['id' => 3, 'name' => 'Dept User', 'email' => "distuser@email.com", "mobile_no" => "9999999992", "password" => bcrypt('12345678'), 'role' => 'dist_user', 'district' => "Anantapuramu", "can_forward_issue" => true, "can_close_issue" => true, 'is_deptuser' => true, 'dept_id' => 3, 'division_id' => 9, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'latitude' => '', 'longitude' => '', 'mandal' => '',],
            // Dist Users
            ['id' => 3, 'name' => 'AC Legal Metrology', 'email' => "legalmetrology@email.com", "mobile_no" => "7893813707", "password" => bcrypt('12345678'), 'role' => 'dist_user', 'district' => "Anantapuramu", "can_forward_issue" => true, "can_close_issue" => true, 'is_deptuser' => true, 'dept_id' => 12, 'division_id' => Null, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'latitude' => '', 'longitude' => '', 'mandal' => '',],

            ['id' => 4, 'name' => 'Commercial Tax Dept', 'email' => "commercialtax@email.com", "mobile_no" => "9966684069", "password" => bcrypt('12345678'), 'role' => 'dist_user', 'district' => "Anantapuramu", "can_forward_issue" => true, "can_close_issue" => true, 'is_deptuser' => true, 'dept_id' => 11, 'division_id' => Null, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'latitude' => '', 'longitude' => '', 'mandal' => '',],

            ['id' => 5, 'name' => 'DEO', 'email' => "deo@email.com", "mobile_no" => "9849909112", "password" => bcrypt('12345678'), 'role' => 'dist_user', 'district' => "Anantapuramu", "can_forward_issue" => true, "can_close_issue" => true, 'is_deptuser' => true, 'dept_id' => 6, 'division_id' => Null, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'latitude' => '', 'longitude' => '', 'mandal' => '',],

            ['id' => 6, 'name' => 'Food Safety', 'email' => "foodsafety@email.com", "mobile_no" => "9494216845", "password" => bcrypt('12345678'), 'role' => 'dist_user', 'district' => "Anantapuramu", "can_forward_issue" => true, "can_close_issue" => true, 'is_deptuser' => true, 'dept_id' => 7, 'division_id' => Null, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'latitude' => '', 'longitude' => '', 'mandal' => '',],

            ['id' => 7, 'name' => 'Drug Controller', 'email' => "drugcontroller@email.com", "mobile_no" => "9866643485", "password" => bcrypt('12345678'), 'role' => 'dist_user', 'district' => "Anantapuramu", "can_forward_issue" => true, "can_close_issue" => true, 'is_deptuser' => true, 'dept_id' => 5, 'division_id' => Null, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'latitude' => '', 'longitude' => '', 'mandal' => '',],

            ['id' => 8, 'name' => 'DSO', 'email' => "dso@email.com", "mobile_no" => "8008301418", "password" => bcrypt('12345678'), 'role' => 'dist_user', 'district' => "Anantapuramu", "can_forward_issue" => true, "can_close_issue" => true, 'is_deptuser' => true, 'dept_id' => 3, 'division_id' => Null, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'latitude' => '', 'longitude' => '', 'mandal' => '',],

            ['id' => 9, 'name' => 'JD,Agriculture', 'email' => "jdagriculture@email.com", "mobile_no" => "8331057599", "password" => bcrypt('12345678'), 'role' => 'dist_user', 'district' => "Anantapuramu", "can_forward_issue" => true, "can_close_issue" => true, 'is_deptuser' => true, 'dept_id' => 1, 'division_id' => Null, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'latitude' => '', 'longitude' => '', 'mandal' => '',],


            ['id' => 10, 'name' => 'JD,Animal Husbandary', 'email' => "jdanimalhusbandary@email.com", "mobile_no" => "9989932894", "password" => bcrypt('12345678'), 'role' => 'dist_user', 'district' => "Anantapuramu", "can_forward_issue" => true, "can_close_issue" => true, 'is_deptuser' => true, 'dept_id' => 2, 'division_id' => Null, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'latitude' => '', 'longitude' => '', 'mandal' => '',],


            ['id' => 11, 'name' => 'PD, DRDA', 'email' => "pddrda@email.com", "mobile_no" => "8790876789", "password" => bcrypt('12345678'), 'role' => 'dist_user', 'district' => "Anantapuramu", "can_forward_issue" => true, "can_close_issue" => true, 'is_deptuser' => true, 'dept_id' => 4, 'division_id' => Null, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'latitude' => '', 'longitude' => '', 'mandal' => '',],

            ['id' => 12, 'name' => 'PD, ICDS', 'email' => "pdicds@email.com", "mobile_no" => "9440814471", "password" => bcrypt('12345678'), 'role' => 'dist_user', 'district' => "Anantapuramu", "can_forward_issue" => true, "can_close_issue" => true, 'is_deptuser' => true, 'dept_id' => 10, 'division_id' => Null, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'latitude' => '', 'longitude' => '', 'mandal' => '',],

            ['id' => 13, 'name' => 'DD, Horticulture', 'email' => "ddhorticulture@email.com", "mobile_no" => "7995086792", "password" => bcrypt('12345678'), 'role' => 'dist_user', 'district' => "Anantapuramu", "can_forward_issue" => true, "can_close_issue" => true, 'is_deptuser' => true, 'dept_id' => 9, 'division_id' => Null, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'latitude' => '', 'longitude' => '', 'mandal' => '',],


            ['id' => 14, 'name' => 'DMHO', 'email' => "dmho@email.com", "mobile_no" => "9849902397", "password" => bcrypt('12345678'), 'role' => 'dist_user', 'district' => "Anantapuramu", "can_forward_issue" => true, "can_close_issue" => true, 'is_deptuser' => true, 'dept_id' => 8, 'division_id' => Null, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'latitude' => '', 'longitude' => '', 'mandal' => '',],







            ['id' => 15, 'name' => 'Division User', 'email' => "divuser@email.com", "mobile_no" => "9999999993", "password" => bcrypt('12345678'), 'role' => 'div_user', 'district' => "Anantapuramu", "can_forward_issue" => true, "can_close_issue" => true, 'is_deptuser' => true, 'dept_id' => 3, 'division_id' => 9, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'latitude' => '', 'longitude' => '', 'mandal' => '',],
            ['id' => 16, 'name' => 'User', 'email' => "user@email.com", "mobile_no" => "9999999994", "password" => bcrypt('12345678'), 'role' => 'user', 'district' => "Anantapuramu", "can_forward_issue" => false, "can_close_issue" => false, 'is_deptuser' => false, 'dept_id' => Null, 'division_id' => Null, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'latitude' => '', 'longitude' => '', 'mandal' => '',],


        ];

        foreach ($users as $user) {
            User::create($user);
        }

        // $users = [
        //     ['id' => 1, 'name' => 'Stephan de Vries', 'username' => 'stephan', 'email' => 'stephan-v@gmail.com', 'password' => bcrypt('carrotz124')],
        //     ['id' => 2, 'name' => 'John doe', 'username' => 'johnny', 'email' => 'johndoe@gmail.com', 'password' => bcrypt('carrotz1243')],
        // ];
    }
}
