<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'Id_Produit';

    protected $table = 'Produit';
    protected $fillable = [
        'Nom',
        'Descriptions',
        'Libelle',
        'Categorie'
    ];

    public function rapportsDeVente()
    {
        return $this->belongsToMany(RapportDeVente::class, 'Lien_Rapport_Produit', 'Id_Produit', 'Id_Rapport')
            ->withPivot('Quantite');
    }
}
