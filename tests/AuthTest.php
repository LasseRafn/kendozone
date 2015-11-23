<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Lang;

class AuthTest extends TestCase
{
    use DatabaseTransactions;


    /** @test */
    public function a_user_may_register_for_an_account_but_must_confirm_their_email_address()
    {
        // When we register...
        $this->visit('/auth/register')
            ->type('JohnDoe', 'name')
            ->type('john@example.com', 'email')
            ->type('password', 'password')
            ->press(Lang::get('auth.create_account'));
        // We should have an account - but one that is not yet confirmed/verified.
        $this->see(Lang::get('auth.check_your_email'))
            ->seeInDatabase('users', ['name' => 'JohnDoe', 'verified' => 0]);
        $user = User::whereName('JohnDoe')->first();
        // You can't login until you confirm your email address.
        $this->login($user)->see('Could not sign you in.');
        // Like this...
        $this->visit("register/confirm/{$user->token}")
            ->see('You are now confirmed. Please login.')
            ->seeInDatabase('users', ['name' => 'JohnDoe', 'verified' => 1]);
    }

    // Register con Facebook
    // Register con Facebook and there is another user using same email
    // Register con Facebook and already registered


//    /** @test */
//    public function a_user_may_login()
//    {
//        $this->login()->see('Lesson complete. Good job!')->onPage('dashboard');
//    }

//    protected function login($user = null)
//    {
//        $user = $user ?: $this->factory->create('App\User', ['password' => 'password']);
//        return $this->visit('login')
//            ->type($user->email, 'email')
//            ->type('password', 'password')// You might want to change this.
//            ->press(Lang::get('auth.signin'));
//    }

    /** @test */
    public function login_standard_user()
    {
        return $this->visit('auth/login')
            ->type('user@user.com', 'email')
            ->type('user', 'password')
            ->press(Lang::get('auth.signin'));
    }

    /** @test */
    public function login_admin_user()
    {
        return $this->visit('auth/login')
            ->type('admin@admin.com', 'email')
            ->type('admin', 'password')
            ->press(Lang::get('auth.signin'));
    }
}
