<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class FieldWorker extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;
    use UuidTrait;

    protected $guarded = ['created_at', 'updated_at', 'deleted_at'];

    protected $casts = [
    ];

}
