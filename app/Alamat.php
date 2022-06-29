<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    // use Notifiable;
    protected $table = "alamats";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','mahasiswa_id','alamat','kode_pos','provinsi','kota','kecamatan','kelurahan'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
}
