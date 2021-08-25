<?php

namespace App\Models;

use Hamcrest\Core\HasToString;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'profile_photo_path',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function getRole()
    {
        return $this->role()->first()->name;
    }

    public function hasRole($role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }

    public function fullname()
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    public function getStudentsNb()
    {
        $roles = Student::where('admin_id', Auth::user()->id)->count();
        return $roles;
    }
    public function getTeachersNb()
    {
        $roles = Teacher::where('admin_id', Auth::user()->id)->count();
        return $roles;
    }
    public function getCoursNb()
    {
        $roles = Cour::where('admin_id', Auth::user()->id)->count();
        return $roles;
    }
    public function getClassesNb()
    {
        $roles = Classe::where('admin_id', Auth::user()->id)->count();
        return $roles;
    }
    public function getAnnoncesNb()
    {
        $roles = Annonce::where('admin_id', Auth::user()->id)->count();
        return $roles;
    }
}
