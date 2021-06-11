<?php

namespace App\Services\Client\Http\Controllers\Auth;

use App\Services\Client\Features\Auth\LoginViaLinkedInFeature;
use App\Services\Client\Features\Auth\RedirectViaLinkedInFeature;
use App\Services\Client\Http\Controllers\Auth\Interfaces\LoginViaSocialInterface;
use Illuminate\Http\RedirectResponse;
use Lucid\Units\Controller;

/**
 * Class    LinkedInController
 * @package App\Services\Client\Http\Controllers\Auth
 * @author  Vlad Golubtsov
 */
class LinkedInController extends Controller implements LoginViaSocialInterface
{
    /**
     * @return RedirectResponse
     */
    public function redirect(): RedirectResponse
    {
        return $this->serve(RedirectViaLinkedInFeature::class);
    }

    /**
     * @return RedirectResponse
     */
    public function callback(): RedirectResponse
    {
        return $this->serve(LoginViaLinkedInFeature::class);
    }
}
