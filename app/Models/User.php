<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name','last_name','email','role','status','password'
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
        'password' => 'hashed',
    ];

    public static function createUpdate($user, $request)
    {
        if(isset($request->first_name)){
            $user->first_name = $request->first_name;
        }

        if(isset($request->last_name)){
            $user->last_name = $request->last_name;
        }

        if(isset($request->email)){
            $user->email = $request->email;
        }

        if(isset($request->status)){
            $user->status = $request->status;
        }

        if(isset($request->password)){
            $user->password = bcrypt($request->password);
        }

        $user->save();
        return $user;
    }

    public static function boot()
    {
        parent::boot();

        self::creating(function ($employee){
            if(Auth::check()){
                $employee->created_by = Auth::user()->id;
            }
        });

        self::created(function ($employee){
            //
        });

        self::updating(function ($employee){
            if(Auth::check()){
                $employee->updated_by = Auth::user()->id;
            }
        });

        self::updated(function ($employee){
            //
        });

        self::deleted(function ($employee){
            $employee->deleted_by = Auth::user()->id;
            $employee->save();
        });
    }
}
