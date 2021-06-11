<?php

namespace Tests\Feature\Services\Client;

use App\Data\Models\Auth\LinkedInUser;
use App\Services\Client\Tests\TestCase;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\User;

/**
 * Class    CallbackViaLinkedInFeatureTest
 * @package Tests\Feature\Services\Client
 * @author  Vlad Golubtsov
 */
class CallbackViaLinkedInFeatureTest extends TestCase
{
    const LINKEDIN_REDIRECT_ROUTE = 'dashboard.home';
    const LINKEDIN_CALLBACK_ROUTE = 'login.via.callback';

    /**
     * @test
     * @dataProvider providedData
     * @param array $providedData
     */
    public function test_callback_via_linked_in_feature_if_auth(array $providedData)
    {
        /** @var \Mockery $abstractUser */
        $abstractUser = \Mockery::mock(User::class);

        foreach ($providedData as $key => $value) {
            $abstractUser->{$key} = $value;
        }

        /** Mock Socialite by driver. */
        Socialite::shouldReceive('driver->user')->andReturn($abstractUser);

        /**
         * Send request.
         */
        $response = $this->get(route(self::LINKEDIN_CALLBACK_ROUTE, [
            'code'  => Str::random(10),
            'state' => Str::random(10),
        ]));

        /**
         * Asserts data.
         */
        $response->assertRedirect();
        $response->assertSessionDoesntHaveErrors();

        $this->assertAuthenticated();

        $this->assertDatabaseHas('linkedin_users', Arr::only($providedData, ['email']));
        $this->assertDatabaseHas('users', Arr::only($providedData, ['email']));
    }

    /**
     * @test
     * @dataProvider providedData
     * @param array $providedData
     */
    public function test_callback_via_linked_in_feature_if_validation_errors(array $providedData)
    {
        /** @var \Mockery $abstractUser */
        $abstractUser = \Mockery::mock(User::class);

        foreach ($providedData as $key => $value) {
            $abstractUser->{$key} = $value;
        }

        /** Mock Socialite by driver. */
        Socialite::shouldReceive('driver->user')->andReturn($abstractUser);

        /**
         * Send request.
         */
        $response = $this->get(route(self::LINKEDIN_CALLBACK_ROUTE));

        /**
         * Asserts data.
         */
        $response->assertRedirect();
        $response->assertSessionHasErrors();

        $this->assertGuest();

        $this->assertDatabaseMissing('linkedin_users', Arr::only($providedData, ['email']));
        $this->assertDatabaseMissing('users', Arr::only($providedData, ['email']));
    }

    /**
     * @return \array[][]
     */
    public function providedData(): array
    {
        return [
            [
                [
                    'id'         => rand(),
                    'first_name' => rand(),
                    'last_name'  => rand(),
                    'email'      => rand(),
                ]
            ],
            [
                [
                    'id'         => rand(),
                    'first_name' => rand(),
                    'last_name'  => rand(),
                    'email'      => rand(),
                    'avatar'     => rand(),
                ]
            ],
        ];
    }
}
