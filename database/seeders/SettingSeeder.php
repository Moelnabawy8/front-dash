<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::updateOrCreate(["id" => 1], [
            "address" => "cairo",
            "phone" => 01016233627,
            "email" => "moelnabawy8@gmail.com",
        ]);
    }
}
