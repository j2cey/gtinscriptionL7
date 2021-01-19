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
        // groupe files, id: 2
        $this->createNew("files", null, null, null, "settings Files.");
        // sub groupe files.uploads, id: 3
        $this->createNew("uploads", 2, null, null, "Uploads.");
        // sub groupe files.uploads.max_size, id: 4
        $this->createNew("max_size", 3, null, null, "Max Size.");
        $this->createNew("any", 4, "70", "integer", "Max any file size.");
        $this->createNew("video", 4, "70", "integer", "Max video file size.");
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
