<?php

namespace Tests\Feature\Services\Client;

use App\Services\Client\Tests\TestCase;

/**
 * Class    RedirectViaLinkedInFeatureTest
 * @package Tests\Feature\Services\Client
 * @author  Vlad Golubtsov
 */
class RedirectViaLinkedInFeatureTest extends TestCase
{
    const LINKEDIN_REDIRECT_ROUTE = 'login.via.linkedin';

    public function test_redirect_via_linked_in_feature()
    {
        $response = $this->get(route(self::LINKEDIN_REDIRECT_ROUTE));

        $response->assertRedirect();
    }
}
