<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RapportDeVente extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'Id_Rapport';

    protected $table = 'Rapport_de_Vente';
    protected $fillable = [
        'DateRapport',
        'Details',
        'Resultat'
    ];

    public function visite()
    {
        return $this->belongsTo(Visite::class, 'Id_Rapport', 'Id_Rapport');
    }

    public function produits()
    {
        return $this->belongsToMany(Produit::class, 'Lien_Rapport_Produit', 'Id_Rapport', 'Id_Produit')
            ->withPivot('Quantite');
    }
}
