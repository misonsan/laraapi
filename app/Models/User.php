<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable  implements JWTSubject
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // campi che possono essere passati dall'utente per aggiornare
    protected $fillable = [

        'name',
        'lastname',
        'email',
        'password',
        'fiscalcode',
        'province',
        'phone',
        'age',
    ];
   /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*    metodi da personalizzare implementati da  JWTSubject */




    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    //
    // Return a key value array, containing any custom claims to be added to the JWT.
    //
    // @return array
    //
    public function getJWTCustomClaims()
    {
        //  originariamente era return []; ma posso registrare nella payload
        //    anche delle coppie chiave-> valore ceh voglio e che posso usare poi
        //    nella front end
        return [
            'name' => $this->name,
            'email' => $this->email
                ];
    }


}
