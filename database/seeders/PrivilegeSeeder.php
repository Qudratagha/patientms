<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrivilegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $aryPrivileges = [
            ['moduleID' => 1, 'accessLevelID' => 1, 'privilegeCode' => 'USER', 'privilegeName' => 'Users Create'],
            ['moduleID' => 1, 'accessLevelID' => 2, 'privilegeCode' => 'USER', 'privilegeName' => 'Users Read'],
            ['moduleID' => 1, 'accessLevelID' => 3, 'privilegeCode' => 'USER', 'privilegeName' => 'Users Update'],
            ['moduleID' => 1, 'accessLevelID' => 4, 'privilegeCode' => 'USER', 'privilegeName' => 'Users Delete'],

            ['moduleID' => 2, 'accessLevelID' => 1, 'privilegeCode' => 'ROLES','privilegeName' => 'Roles Create'],
            ['moduleID' => 2, 'accessLevelID' => 2, 'privilegeCode' => 'ROLES','privilegeName' => 'Roles Read'],
            ['moduleID' => 2, 'accessLevelID' => 3, 'privilegeCode' => 'ROLES','privilegeName' => 'Roles Update'],
            ['moduleID' => 2, 'accessLevelID' => 4, 'privilegeCode' => 'ROLES','privilegeName' => 'Roles Delete'],

            ['moduleID' => 3, 'accessLevelID' => 1, 'privilegeCode' => 'PATIENTS','privilegeName' => 'Patients Create'],
            ['moduleID' => 3, 'accessLevelID' => 2, 'privilegeCode' => 'PATIENTS','privilegeName' => 'Patients Read'],
            ['moduleID' => 3, 'accessLevelID' => 3, 'privilegeCode' => 'PATIENTS','privilegeName' => 'Patients Update'],
            ['moduleID' => 3, 'accessLevelID' => 4, 'privilegeCode' => 'PATIENTS','privilegeName' => 'Patients Delete'],
        ];

	    foreach ($aryPrivileges as $privilege) {
		    DB::table('privilege')->insert(
			    [
				    'moduleID' => $privilege['moduleID'],
				    'accessLevelID' => $privilege['accessLevelID'],
				    'privilegeCode' => $privilege['privilegeCode'],
				    'privilegeName' => $privilege['privilegeName'],
			    ]
		    );
	    }
    }
}
