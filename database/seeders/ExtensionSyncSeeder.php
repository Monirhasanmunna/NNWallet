<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ExtensionSync;

class ExtensionSyncSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'session_id'  => 'ABC123',
                'platform'    => 'android',
                'device_name' => 'Samsung S22',
                'app_version' => '1.0.0',
            ],
            [
                'session_id'  => 'XYZ789',
                'platform'    => 'ios',
                'device_name' => 'iPhone 14 Pro',
                'app_version' => '1.1.5',
            ],
        ];

        foreach ($data as $key => $value) {
            ExtensionSync::updateOrCreate([
                'session_id' => $value['session_id'],
                'platform' => $value['platform'],
                'device_name' => $value['device_name'],
                'app_version' => $value['app_version'],
            ]);
        }

    }
}
