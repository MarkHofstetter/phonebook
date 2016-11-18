<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
// "HOFSTETTER, Mark",,14275,mark.hofstetter@univie.ac.at,,,

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      foreach (array('wien.csv', 'sbg.csv') as $fn) {   
         $users = fopen( base_path().'/database/seeds/data/'.$fn, "r");
         while (($data = fgetcsv($users, 0, ",")) !== FALSE) {
            if ($data[0]) {
               try {
                  echo $data[0] ."\n";
                  User::create([
                    'name'         => utf8_encode( $data[0] ),
                    'phoneprefix'  => '+43 662 4669',
                    'phone'        => $data[2],
                    'email'        => utf8_encode( $data[3] ),
                    'mobilephone'  => $data[4],
                    'password' => Hash::make('blabla'),
                  ]);
                  $try = 0;
                } catch (Exception $e) {
               #    print $e->getMessage() ."\n";
                }
            }
         }
       }
       DB::table('users')
           ->where('name', 'Name')->delete();
       DB::table('users')
           ->whereNull('email')->delete();
             

       DB::table('users')
           ->where('name', 'GOLLACKNER, Christine')
           ->update(['isadmin' => true, ]);

       DB::table('users')
           ->where('email', 'like', '%univie.ac.at')
           ->update(['phoneprefix' => '+43 1 4277' ]);
     }
}
