<?php

namespace Database\Seeders;

use App\Models\Request;
use App\Models\Salon;
use App\Models\SalonSeat;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        `full_name`, `email`, `email_verified_at`, `password`, `photo`
        $user=new User();
        $user->full_name='Dina Akila';
        $user->email='dinashadiakeela@gmail.com';
        $user->password=bcrypt('123456');
        $user->photo='https://i.pinimg.com/originals/bc/ed/58/bced58f3a6e8438485e7f5ccb65e52c7.png';
        $user->save();

        $user2=new User();
        $user2->full_name='Eman Elessi';
        $user2->email='eme@gmail.com';
        $user2->password=bcrypt('123456');
        $user2->photo='https://i.pinimg.com/originals/bc/ed/58/bced58f3a6e8438485e7f5ccb65e52c7.png';
        $user2->save();

//        `name`, `address`, `latitude`, `longitude`, `seats_number`, `isactive`, `isonline`, `user_id`
        $salon=new Salon();
        $salon->name='Roy Daniel Hair Studio';
        $salon->address='Shabazi St 13, Tel Aviv-Yafo, Palestine';
        $salon->latitude=32.079316832803976;
        $salon->longitude=34.76030727805394;
        $salon->seats_number=10;
        $salon->isactive=0;
        $salon->isonline=1;
        $salon->user_id=$user->id;
        $salon->save();

//        `seat_number`, `status`, `salon_id`
        $salonseat=new SalonSeat();
        $salonseat->seat_number=1;
        $salonseat->status='available';
        $salonseat->salon_id=$salon->id;
        $salonseat->save();


        $request=new Request();
        $request->user_id=$user2->id;
        $request->salon_id=$salon->id;
        $request->salon_seat_id=$salonseat->id;
        $request->status='pending';
        $request->time='00:10:00';
        $request->save();
    }
}
