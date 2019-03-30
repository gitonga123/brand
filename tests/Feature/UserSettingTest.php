<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class UserSettingTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_user_can_update_date_format()
    {
        $user = factory(User::class)->create();
        $this->post(
            route('user.settings', ['id' => $user]),
            [
                'date_format' => 'Y/mm/dd'
            ]
        )->assertJsonStructure(
            [
                'success'
            ]
        )->assertJson(
            [
                'success' => true
            ]
        );
        $this->assertDatabaseHas(
            'user_settings',
            [
                'date_format' => "Y/mm/dd",
                "user_id" => $user->id
            ]
        );
    }

    /**
     * Test Duplicate User Date Preference
     * 
     * @return void
     */
    public function test_cannot_duplicate_date_format()
    {
        // $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $this->post(
            route('user.settings', ['id' => $user->id]),
            [
                'date_format' => 'Y/mm/dd',
                'user_id' => $user->id
            ]
        )->assertJson(['success' => true]);

        $this->post(
            route('user.settings', ['id' => $user->id]),
            [
                'date_format' => 'Y/mm/dd',
                'user_id' => $user->id
            ]
        )->assertSessionHasErrors('user_id');
    }

    /**
     * Test User Date Preference is required
     * 
     * @return void
     */
    public function test_date_is_reqired()
    {
        $user = factory(User::class)->create();

        $this->post(
            route('user.settings', ['id' => $user->id]),
            [
                'user_id' => $user->id
            ]
        )->assertSessionHasErrors('date_format');
    }

    /**
     * Test user can set preffered Level of difficulty
     * 
     * @return void
     */
    public function test_set_preffered_level()
    {
        $this->withoutExceptionHandling();
        $level = factory(\App\Level::class)->create();
        $user = factory(\App\User::class)->create();

        $this->get(
            route(
                'user.settings.level',
                ['level' => $level->id, 'user' => $user->id]
            )
        )->assertJsonStructure(
            [
                'success'
            ]
        );
        $this->assertDatabaseHas(
            'level_user',
            [
                'level_id' => $level->id,
                'user_id' => $user->id
            ]
        );
    }

    /**
     * Test user can set preffered Country
     * 
     * @return void
     */
    public function test_set_preffered_country()
    {
        $this->withoutExceptionHandling();
        $country = factory(\App\Country::class)->create();
        $user = factory(\App\User::class)->create();

        $this->get(
            route(
                'user.settings.country',
                ['country' => $country->id, 'user' => $user->id]
            )
        )->assertJsonStructure(
            [
                'success'
            ]
        );
        $this->assertDatabaseHas(
            'country_user',
            [
                'country_id' => $country->id,
                'user_id' => $user->id
            ]
        );
    }
}
