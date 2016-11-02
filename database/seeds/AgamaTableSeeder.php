<?php

use Illuminate\Database\Seeder;

use Simpeg\Model\Agama;

class AgamaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('agama')->truncate();

        $titles = [
            'Islam',
            'Kristen Katolik',
            'Kristen Protestan',
            'Konghucu',
            'Hindu',
            'Budha',
        ];

        foreach ($titles as $title) {
            Agama::create([
                'title' => $title
            ]);
        }
    }
}
