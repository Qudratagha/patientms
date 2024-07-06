<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
		    AccessLevelSeeder::class,
		    ModuleSeeder::class,
		    PrivilegeSeeder::class,
		    RoleSeeder::class,
		    RolePrivilegeSeeder::class,
            UserTypeSeeder::class,
		    UserSeeder::class,
		    UserRoleSeeder::class,
            PatientsSeeder::class,

	    ]);
    }
}
