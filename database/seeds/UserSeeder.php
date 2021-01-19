<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users_list = [
            ['name' => "Admin 01", 'username' => "admin.01", 'email' => "admin01@moov-africa.ga", 'password' => "admin123"],
            ['name' => "Admin 02", 'username' => "admin.02", 'email' => "admin02@moov-africa.ga", 'password' => "admin123"],
            ['name' => "Jury 01", 'username' => "jury.01", 'email' => "jury01@moov-africa.ga", 'password' => "jury01moovafrica"],
            ['name' => "Jury 02", 'username' => "jury.02", 'email' => "jury02@moov-africa.ga", 'password' => "jury02moovafrica"],
        ];

        foreach ($users_list as $user) {
            $user_db = User::where('name',$user['name'])->where('username',$user['username'])->where('email',$user['email'])->first();
            $user['password'] = bcrypt($user['password']);
            if ($user_db) {
                $user_db->update($user);
            } else {
                User::create($user);
            }
        }
    }
}
