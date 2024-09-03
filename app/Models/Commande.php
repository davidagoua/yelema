<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


enum CommandeState : int
{
    case PENDING = 20;
    case COMPLETED = 50;
    case CANCELED = 30;
    case VALIDATING = 10;
}
class Commande extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'localisation'=>'array'
    ];

    public function pack()
    {
        return $this->belongsTo(Pack::class);
    }
}
