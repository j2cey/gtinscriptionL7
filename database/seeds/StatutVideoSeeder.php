<?php

use App\Models\StatutVideo;
use Illuminate\Database\Seeder;

class StatutVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            ['name' => "téléchargé", 'code' => "telecharge_ok",'is_default' => 0],
            ['name' => "non téléchargé", 'code' => "telecharge_ko",'is_default' => 1]
        ];
        foreach ($statuses as $status) {
            StatutVideo::create($status);
        }
    }
}
