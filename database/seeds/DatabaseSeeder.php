<?php

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
        $this->call(RequirementSeeder::class);
        $this->call(AdministratorSeeder::class);
        $this->call(FileTypeSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(ProcessSeeder::class);
        $this->call(FilesSeeder::class);
        
        
        // $this->call(UserSeeder::class);
    }
}
