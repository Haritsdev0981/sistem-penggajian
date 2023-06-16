<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    protected $table = 'division';
    protected $fillable = ['name_division', 'gaji_pokok', 'id_user'];

    // public function gaji_pokok() {
    //     return $this->hasMany('gaji_pokok', 'id_user', 'id');
    // }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }
}
