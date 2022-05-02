<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\AreaPosition
 *
 * @property int $id
 * @property string|null $name
 * @property string $code
 * @property string $vehicle_type
 * @property string|null $address
 * @property string|null $address_name
 * @property string|null $lat
 * @property string|null $lng
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Ticket[] $tickets
 * @property-read int|null $tickets_count
 * @method static \Illuminate\Database\Eloquent\Builder|AreaPosition newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AreaPosition newQuery()
 * @method static \Illuminate\Database\Query\Builder|AreaPosition onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|AreaPosition query()
 * @method static \Illuminate\Database\Eloquent\Builder|AreaPosition whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AreaPosition whereAddressName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AreaPosition whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AreaPosition whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AreaPosition whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AreaPosition whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AreaPosition whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AreaPosition whereLng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AreaPosition whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AreaPosition whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AreaPosition whereVehicleType($value)
 * @method static \Illuminate\Database\Query\Builder|AreaPosition withTrashed()
 * @method static \Illuminate\Database\Query\Builder|AreaPosition withoutTrashed()
 */
	class AreaPosition extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Bypasser
 *
 * @property int $id
 * @property string $description
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Ticket|null $ticket
 * @method static \Illuminate\Database\Eloquent\Builder|Bypasser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bypasser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bypasser query()
 * @method static \Illuminate\Database\Eloquent\Builder|Bypasser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bypasser whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bypasser whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bypasser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bypasser whereUpdatedAt($value)
 */
	class Bypasser extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Member
 *
 * @property int $id
 * @property string|null $name
 * @property string $email
 * @property string $phone_number
 * @property string $gender
 * @property string|null $address
 * @property string $plat_no
 * @property string $card_no
 * @property int $vehicle_id
 * @property int $payment_method_id
 * @property string $user_id
 * @property string $group
 * @property string $start_at
 * @property string $end_at
 * @property string|null $in
 * @property string|null $out
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Ticket[] $tickets
 * @property-read int|null $tickets_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Member newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Member newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Member query()
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereCardNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereEndAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereIn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereOut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member wherePaymentMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member wherePlatNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereStartAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereVehicleId($value)
 */
	class Member extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Parameter
 *
 * @property int $id
 * @property string $group
 * @property string $name
 * @property string $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Parameter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Parameter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Parameter query()
 * @method static \Illuminate\Database\Eloquent\Builder|Parameter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parameter whereGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parameter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parameter whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parameter whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parameter whereValue($value)
 */
	class Parameter extends \Eloquent {}
}

namespace App\Models\Passport{
/**
 * App\Models\Passport\AuthCode
 *
 * @property string $id
 * @property int $user_id
 * @property string $client_id
 * @property string|null $scopes
 * @property bool $revoked
 * @property \Illuminate\Support\Carbon|null $expires_at
 * @property-read \App\Models\Passport\Client|null $client
 * @method static \Illuminate\Database\Eloquent\Builder|AuthCode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AuthCode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AuthCode query()
 * @method static \Illuminate\Database\Eloquent\Builder|AuthCode whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthCode whereExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthCode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthCode whereRevoked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthCode whereScopes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthCode whereUserId($value)
 */
	class AuthCode extends \Eloquent {}
}

namespace App\Models\Passport{
/**
 * App\Models\Passport\Client
 *
 * @property string $id
 * @property int|null $user_id
 * @property string $name
 * @property string|null $secret
 * @property string|null $provider
 * @property string $redirect
 * @property bool $personal_access_client
 * @property bool $password_client
 * @property bool $revoked
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Passport\AuthCode[] $authCodes
 * @property-read int|null $auth_codes_count
 * @property-read string|null $plain_secret
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Passport\Token[] $tokens
 * @property-read int|null $tokens_count
 * @property-read \App\Models\User|null $user
 * @method static \Laravel\Passport\Database\Factories\ClientFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Client newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Client newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Client query()
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client wherePasswordClient($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client wherePersonalAccessClient($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereRedirect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereRevoked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereUserId($value)
 */
	class Client extends \Eloquent {}
}

namespace App\Models\Passport{
/**
 * App\Models\Passport\PersonalAccessClient
 *
 * @property int $id
 * @property string $client_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Passport\Client|null $client
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessClient newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessClient newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessClient query()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessClient whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessClient whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessClient whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessClient whereUpdatedAt($value)
 */
	class PersonalAccessClient extends \Eloquent {}
}

namespace App\Models\Passport{
/**
 * App\Models\Passport\Token
 *
 * @property string $id
 * @property string|null $user_id
 * @property string $client_id
 * @property string|null $name
 * @property array|null $scopes
 * @property bool $revoked
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property \Illuminate\Support\Carbon|null $expires_at
 * @property-read \App\Models\Passport\Client|null $client
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Token newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Token newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Token query()
 * @method static \Illuminate\Database\Eloquent\Builder|Token whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Token whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Token whereExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Token whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Token whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Token whereRevoked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Token whereScopes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Token whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Token whereUserId($value)
 */
	class Token extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PaymentMethod
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Ticket[] $tickets
 * @property-read int|null $tickets_count
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod query()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereUpdatedAt($value)
 */
	class PaymentMethod extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Shift
 *
 * @property int $id
 * @property string $code
 * @property string $description
 * @property string $start_at
 * @property string $end_at
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Shift newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Shift newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Shift query()
 * @method static \Illuminate\Database\Eloquent\Builder|Shift whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shift whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shift whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shift whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shift whereEndAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shift whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shift whereStartAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shift whereUpdatedAt($value)
 */
	class Shift extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Ticket
 *
 * @property int $id
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $total_price
 * @property string $barcode_no
 * @property string $picture_vehicle_in
 * @property string $picture_vehicle_out
 * @property string $plat_no
 * @property int $area_position_in_id
 * @property int $area_position_out_id
 * @property string|null $member_id
 * @property string|null $voucher_id
 * @property int $vehicle_id
 * @property int|null $payment_method_id
 * @property \App\Models\Bypasser|null $bypasser
 * @property string $user_id
 * @property string $start_at
 * @property string $end_at
 * @property-read \App\Models\Member|null $member
 * @property-read \App\Models\PaymentMethod|null $paymentMethod
 * @property-read \App\Models\User|null $user
 * @property-read \App\Models\Vehicle|null $vehicle
 * @property-read \App\Models\Voucher|null $voucher
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereAreaPositionInId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereAreaPositionOutId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereBarcodeNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereBypasser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereEndAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereMemberId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket wherePaymentMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket wherePictureVehicleIn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket wherePictureVehicleOut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket wherePlatNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereStartAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereTotalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereVehicleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereVoucherId($value)
 */
	class Ticket extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property string $id
 * @property string|null $name
 * @property string $email
 * @property string $phone_number
 * @property string $gender
 * @property string|null $address
 * @property int $level
 * @property int $shift_id
 * @property string $tax
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Passport\Client[] $clients
 * @property-read int|null $clients_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Passport\Token[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Query\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereShiftId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|User withoutTrashed()
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Vehicle
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string $type
 * @property string $hourly_price
 * @property string $stay_price
 * @property string $fine_ticket_price
 * @property string $member_price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Ticket[] $tickets
 * @property-read int|null $tickets_count
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle query()
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereFineTicketPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereHourlyPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereMemberPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereStayPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereUpdatedAt($value)
 */
	class Vehicle extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Voucher
 *
 * @property int $id
 * @property string $start_at
 * @property string $end_at
 * @property string $name
 * @property string|null $note
 * @property string $plat_no
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher query()
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereEndAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher wherePlatNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereStartAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereUpdatedAt($value)
 */
	class Voucher extends \Eloquent {}
}

