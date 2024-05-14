<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visite extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'Id_Visite';

    protected $table = 'visites';
    protected $fillable = [
        'DateVisite',
        'Id_Rapport',
        'Id_Client',
        'Id_Employe',
        'Objectif',
        'Rapport'
    ];

    public function rapportDeVente()
    {
        return $this->hasOne(RapportDeVente::class, 'Id_Rapport', 'Id_Rapport');
    }

    public function employe()
    {
        return $this->belongsTo(Employes::class, 'Id_Employe', 'Id_Employe');
    }

    public function client()
{
    return $this->belongsTo(Clients::class, 'Id_Client', 'Id_Client');
}

}
