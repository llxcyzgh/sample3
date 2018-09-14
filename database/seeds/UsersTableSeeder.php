<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = factory(User::class)->times(50)->make();
        User::insert($users->makeVisible(['password', 'remember_token'])->toArray());
        // 此处的 makevisiable 旨在临时使 hidden的两个属性可见(可以显示在模型实例,以及转化后的数组中,从而可以对这两个值进行批量赋值)

        $user           = User::find(1);
        $user->name     = 'Peppa';
        $user->email    = 'peppa@163.vip.com';
        $user->password = bcrypt('password');
//        $password = bcrypt('password');
        $user->is_admin = true;
        $user->is_activated = true;
        $user->activation_token = null;
        $user->save();
    }
}
