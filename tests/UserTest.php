<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class UserTest extends TestCase
{
    public $name = 'Test User';
    public $file = 'bla.pdf';

   public function testCreateUser() {
        $this->visit('/register')
             ->see('Confirm Password');

        $this->type($this->name, 'name')
               ->type('test@user.com', 'email')
               ->type('blabla', 'password')
               ->type('blabla', "password_confirmation")
               ->select("employer", 'type')
               ->press('Register');

        $this->seeInDatabase('users', ['name' => $this->name, 'type'=>'employer' ]);

        $this->visit('/home')
             // ->see('Embed Link To Your Video');
             ->see('consider');
   }

    public function testUpdateUser() {
        $this->visit('/login')
          ->type('homer@simpsons.com', 'email')
          ->type('blabla', 'password')
          ->press('Login')
          ->seePageIs('/')
          ->see('Profile');
			
        $this->visit('/home')
          ->see('Homer')
          ->see('Your Profile');
 
        $this->type('Homer Change','name')
          ->type('Honk','jobtitle')
        ##   ->attach('/home/mh/htdocs/job-candidate/tests/'.$this->file, 'bla.pdf')
          ->press('Update')
          ->seePageIs('/home');
        
        $this->seeInDatabase('users', ['name' => 'Homer Change', 'jobtitle'=>'Honk']);
        $this->seeInDatabase('countries', ['name' => 'Austria']);
          
        
	}
	// public function test() // zum Testen der z.B. Currency ob nur 3 erlaubt 

   public function testAjaxSearch() {
        $this->visit('/ajaxsearch?usertype=employer')
             ->see('Burns')
             ->see('Bob')
             ->dontSee('Homer')
             ->dontSee('Marge');

        $this->visit('/ajaxsearch?searchtext=Hom&usertype=jobseeker')
             ->see('Homer')
            // ->see('Marge')
             ->dontSee('Burns');


        $this->visit('/ajaxsearch?searchtext=Bob&usertype=employer')
             ->dontSee('Homer')
             ->dontSee('Marge')
             ->dontSee('Burns');
  

        $ger =  DB::table('countries')->where('name', 'Germany')->first();
        $it =  DB::table('sectors')->where('name', 'Engineering / Technics / IT')->first();
        $url = '/ajaxsearch?usertype=jobseeker&sector_id='.$it->id.'&country_id='.$ger->id;
        # echo $url;
        $this->visit($url)
             ->see('Homer')
             ->dontSee('Marge')
             ->dontSee('Burns');

        $this->visit('/ajaxsearch?searchtext=&usertype=employer')
             ->dontSee('Homer')
             ->dontSee('Marge')
             ->see('Burns')
             ->dontSee($this->name); # user has no video hence is not found
        }

  public function testUserDetail() {
        $user =  DB::table('users')->where('name', $this->name)->first();
        $this->visit('profile/'.$user->id)
             ->see($this->name);

  }
   
  public static function tearDownAfterClass() {
  #   $country = User::where('name', 'Test User')->delete();
  }

   
  
}
