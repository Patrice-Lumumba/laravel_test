<?php

    namespace App\Models;

    use Illuminate\Contracts\Auth\MustVerifyEmail;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Notifications\Notifiable;
    use Laravel\Sanctum\HasApiTokens;

    class UserOld extends Model
    {
        use HasApiTokens, HasFactory, Notifiable;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            'firstname',
            'lastname',
            'gender_id',
            'email',
            'tel',
            'password',
            'check_in',
            'check_out',
            'role',

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

        public static function create(array $array)
        {
        }

        public function setPasswordAttribute($password)
        {
            $this->attributes['password'] = bcrypt($password);
        }

        public function roles()
        {
            return $this->belongsToMany(Role::class);
        }

        public function hasRole($role)
        {
            $role = -$this->roles()->where('name', 'user')->count();
            if ($role == 1) {
                return true;
            }
            return  false;
        }
    }
