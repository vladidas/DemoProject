<?php

namespace App\Services\Client\Features\Auth;

use App\Data\Models\Auth\LinkedInUser;
use App\Domains\Auth\Socials\Jobs\GetUserViaSocialByDriverJob;
use App\Domains\Auth\Socials\LinkedIn\Jobs\GetLinkedInUserBySocialIdJob;
use App\Domains\Auth\Socials\LinkedIn\Jobs\StoreLinkedInUserJob;
use App\Domains\Auth\Socials\User\Jobs\PrepareDataForUserTableJob;
use App\Domains\Auth\Socials\User\Jobs\StoreUserJob;
use App\Http\Middleware\Authenticate;
use App\Services\Client\Http\Requests\Auth\LinkedIn\LoginViaLinkedInRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Two\User;
use App\Data\Models\Auth\User as UserModel;
use Lucid\Units\Feature;

/**
 * Class    LoginViaLinkedInFeature
 * @package App\Services\Client\Features\Auth
 * @author  Vlad Golubtsov
 */
class LoginViaLinkedInFeature extends Feature
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
     * @param LoginViaLinkedInRequest $request
     * @return RedirectResponse
     */
    public function handle(LoginViaLinkedInRequest $request): RedirectResponse
    {
        /**
         * Receive user data from the LinkedIn social network
         * or return NULL if something went wrong.
         *
         * @var ?User $socialUser
         */
        $socialUser = rescue(fn () =>
            $this->run(GetUserViaSocialByDriverJob::class, [
                'driver' => $this->driver,
            ])
        );

        if (! $socialUser) {
            return redirect()->route(Authenticate::REDIRECT_ROUTE_LOGIN_PAGE);
        }

        /**
         * Get User by social id from LinkedIn if exists.
         *
         * @var UserModel $userModel
         */
        $userModel = $this->run(GetLinkedInUserBySocialIdJob::class, [
            'socialId' => $socialUser->id,
        ]);

        /**
         * Store User if doesn't exists.
         *
         * @var UserModel $userModel
         */
        $userModel = $userModel ?: $this->storeUser($socialUser);

        /**
         * Auth user by model.
         */
        Auth::login($userModel, true);

        if (Auth::check()) {
            return redirect()->route(Authenticate::REDIRECT_ROUTE_IF_AUTH);
        }

        return redirect()->route(Authenticate::REDIRECT_ROUTE_LOGIN_PAGE);
    }

    /**
     * @param User $user
     * @return UserModel
     */
    private function storeUser(User $user): UserModel
    {
        /**
         * Prepare data for the User storing.
         * @var array $data
         */
        $data = $this->run(PrepareDataForUserTableJob::class, [
            'data' => (array)$user,
        ]);

        /**
         * Store user data.
         */
        DB::transaction(function () use ($data, &$user) {
            /**
             * Store User.
             * @var UserModel $user
             */
            $user = $this->run(StoreUserJob::class, [
                'data' => $data,
            ]);

            /**
             * Store User LinkedIn.
             */
            $this->run(StoreLinkedInUserJob::class, [
                'userId' => $user->id,
                'data'   => $data,
            ]);
        });

        return $user;
    }
}
