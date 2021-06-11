<?php

namespace App\Data\Models\Auth;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Data\Models\Auth\LinkedInUser
 *
 * @property int $id
 * @property int $user_id
 * @property string $social_id
 * @property string $email
 * @property string $first_name
 * @property string $last_name
 * @property string|null $nickname
 * @property string|null $avatar
 * @property string|null $social_access_token
 * @property string|null $social_refresh_token
 * @property int|null $social_expires_in_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|LinkedInUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LinkedInUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LinkedInUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|LinkedInUser whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LinkedInUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LinkedInUser whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LinkedInUser whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LinkedInUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LinkedInUser whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LinkedInUser whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LinkedInUser whereSocialAccessToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LinkedInUser whereSocialExpiresInToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LinkedInUser whereSocialId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LinkedInUser whereSocialRefreshToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LinkedInUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LinkedInUser whereUserId($value)
 * @mixin \Eloquent
 */
class LinkedInUser extends Model
{
    /**
     * Declare driver for the Socialite authentications.
     */
    const SOCIALITE_DRIVER = 'linkedin';

    /**
     * Declare table name.
     * @var string
     */
    protected $table = 'linkedin_users';

    /**
     * Declare guarded field.
     * @var string[]
     */
    protected $guarded = [
        'id',
    ];
}
