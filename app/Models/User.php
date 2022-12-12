<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class User extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    protected static function boot() {
        parent::boot();

        static::creating(function (User $user) {
            $user->password = Hash::make($user->password);
        });

        static::updating(function (User $user) {
            if ($user->isDirty(['password'])) {
                $user->password = Hash::make($user->password);
            }
        });
    }
}
