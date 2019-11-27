<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;
class UserTest extends TestCase
{

    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        User::create([
            'name' => 'admin user',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456')
        ]);

        $this->assertDatabaseHas('users', ['name' => 'admin user']);
        // $this->assertTrue(true);
    }

    public function test_create_user_profile()
    {

        $user = User::create([
            'name' => 'admin user',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456')
        ]);

        \App\UserProfile::create([
            'user_id' => $user->id,
            'address' => '42 Road St',
            'state' => 'FL',
            'zip' => '123123'
        ]);

        $this->assertDatabaseHas('users', ['name' => 'admin user']);
        $this->assertDatabaseHas('user_profiles',
        [
            'user_id' => $user->id,
            'address' => '42 Road St',
            'state' => 'FL',
            'zip' => '123123'
        ]);
    }

    public function test_get_profile_by_user()
    {
        $user = User::create([
            'name' => 'admin user',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456')
        ]);

        $userProfile = \App\UserProfile::create([
            'user_id' => $user->id,
            'address' => '42 Road St',
            'state' => 'FL',
            'zip' => '123123'
        ]);

        $this->assertDatabaseHas('users', ['name' => 'admin user']);
        $this->assertDatabaseHas('user_profiles',
        [
            'user_id' => $user->id,
            'address' => '42 Road St',
            'state' => 'FL',
            'zip' => '123123'
        ]);

        $userProfile = \App\UserProfile::find(1);
        $result = $user->profile;

        $this->assertEquals($userProfile, $result);

    }


    public function test_create_user_profile_with_profile()
    {
        $data = [
            'name' => 'admin user',
            'email' => 'admin@admin.com',
            'password' => '123456',
            'address' => '42 Road St',
            'state' => 'FL',
            'zip' => 123123
        ];

        $userService = new \App\Services\UserService();
        $user_id = $userService->create($data);

        $expected = User::find(1);

        $this->assertEquals($expected->id, $user_id);
    }

    // public function test_create_user_using_form()
    // {
    //     $response = $this->get('/');
    //     $response->assertSeeText('Register');
    // }
}
