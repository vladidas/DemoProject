<?php

namespace App\Services\Client\Features\Auth;

use App\Data\Models\Auth\LinkedInUser;
use App\Domains\Auth\Socials\Jobs\RedirectViaSocialByDriverJob;
use Illuminate\Http\RedirectResponse;
use Lucid\Units\Feature;

/**
 * Class    RedirectViaLinkedInFeature
 * @package App\Services\Client\Features\Auth
 * @author  Vlad Golubtsov
 */
class RedirectViaLinkedInFeature extends Feature
{
    /**
     * @var string
     */
    private string $driver;

    /**
     * RedirectViaLinkedInFeature constructor.
     */
    public function __construct()
    {
        $this->driver = LinkedInUser::SOCIALITE_DRIVER;
    }

    /**
     * @return RedirectResponse
     */
    public function handle(): RedirectResponse
    {
        return $this->run(RedirectViaSocialByDriverJob::class, [
            'driver' => $this->driver,
        ]);
    }
}
