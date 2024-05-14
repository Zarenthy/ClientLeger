<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employes extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'Id_Employe';

    protected $table = 'Employe';
    protected $fillable = [
        'Nom',
        'Prenom',
        "Mail",
        "Departement",
        "Id_Authentification_Roles"
    ];
}
