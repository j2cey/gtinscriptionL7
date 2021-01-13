<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // groupe app_name, id: 1
        $this->createNew("app_name", null, "Moov-Africa Inscriptions", "string", "Application Name.");
    }

    private function createNew($name, $group_id = null, $value = null, $type = null, $description = null) {
        $data = ['name'  => $name];
        if (! is_null($group_id)) { $data['group_id'] = $group_id; }
        if (! is_null($value)) { $data['value'] = $value; }
        if (! is_null($type)) { $data['type'] = $type; }
        if (! is_null($description)) { $data['description'] = $description; }
        Setting::create($data);
    }
}
