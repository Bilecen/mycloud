<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->firstname = "Muhammet Taha";
        $user->lastname = "Bilecen";
        $user->profil = "profil.png";
        $user->phone = "05419229392";
        $user->amac = "bireysel";
        $user->filesize = "sınırsız";
        $user->dosyaboyutu = 0;
        $user->email = "me@muhammettahabilecen.com";
        $user->password = bcrypt("55745574Mtb");
        $user->save();
    }
}
