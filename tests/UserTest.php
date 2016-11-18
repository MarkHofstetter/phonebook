<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class UserTest extends TestCase
{
   public $name = 'Test User';
   public $phone = '1234567';
   public $prefix = '1111';
   public $prefix2 = '2222';
   public $email = 'schnupsi@stupsi.at';
   public $password = 'blabla';

   public function testCreateUser() {
        DB::table('users')->where('name', $this->name)->delete();
        User::create([
          'phone'        => $this->phone,
          'name'         => $this->name,
          'email'        => $this->email,
          'password'     => Hash::make($this->password),
        ]);

        $this->seeInDatabase('users', ['name' => $this->name,]);

        $this->visit('/')
             ->see($this->name);
        print "\nuser created\n";
   }

    public function testUpdateUser() {
        $this->visit('/login')
          ->type($this->email, 'email')
          ->type($this->password, 'password')
          ->press('Login')
          ->see($this->name)
          ->seePageIs('/');
			
        $this->click($this->name)
          ->see('Your Profile');
 
        $this->type($this->prefix,'phoneprefix')
          ->press('Update')
          ->seePageIs('/');
        
        $this->seeInDatabase('users', ['name' => $this->name, 'phoneprefix' => $this->prefix]);
    }

    public function testAdminUser() {
        $admin =  User::where('email', 'christine.gollackner@nic.at')->first(); 
        print "name ". $admin->name ."\n";        

        $this->actingAs($admin)
//           ->withSession(['foo' => 'bar'])
           ->visit('/');

        $this->click($this->name)
          ->see('Your Profile');

        $this->type($this->prefix2 ,'phoneprefix')
          ->press('Update')
          ->seePageIs('/');

        $this->seeInDatabase('users', ['name' => $this->name, 'phoneprefix' => $this->prefix2]);
    }


    
   
  
}
