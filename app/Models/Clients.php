<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'Id_Client';

    protected $table = 'Client';
    protected $fillable = [
        'Nom',
        'tel',
        //'email_verified_at',
        // 'password',
        'secteur',
        'ville',
        //'adresse'
    ];
}
