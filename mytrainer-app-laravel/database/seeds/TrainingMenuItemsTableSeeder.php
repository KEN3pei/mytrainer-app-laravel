<?php

use Illuminate\Database\Seeder;

class TrainingMenuItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = 'database/sql/training_menu_items_202105110958.sql';
        DB::unprepared(file_get_contents($path));
    }
}
