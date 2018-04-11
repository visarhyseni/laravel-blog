<?php

use Illuminate\Database\Seeder;

class SettingsTableSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Setting::create([

            'site_name' => "Laravel's",
            'contact_number' => '000 000 000',
            'contact_email' => 'vi@s.ar',
            'address' => 'Mitrovice'
        ]);
    }
}
