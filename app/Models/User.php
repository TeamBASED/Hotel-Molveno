<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable {
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'first_name',
        'last_name',
        'password',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function role() {
        return $this->belongsTo(Role::class);
    }

    public static function getUserById(int $id) {
        return User::find($id);
    }
    public static function getAllUserData() {
        return User::with(['role'])->get();
    }

    public static function getAllUsersSorted(string $column, string $order) {
        $query = User::select([
            'users.*',
            'roles.title',
            'roles.id',
        ])->join('roles', 'roles.id', '=', 'users.role_id');

        if ($column == 'title') {
            $query->orderBy('roles.title', $order);
        } else {
            $query->orderBy('users.' . $column, $order);
        }

        return $query->get();
    }
}