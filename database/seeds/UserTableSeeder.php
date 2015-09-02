<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->truncate();

        User::create(array(
                            'email' => 'foo@bar2.com',
                            'name'  =>  'John2'
                           )
                    );
        
        User::create(array(
                            'email' => 'foo@bar3.com',
                            'name'  =>  'John3'
                           )
                    );
    }

}

