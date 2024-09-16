<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


enum CommandeState : int
{
    case NEWS = 0;
    case PENDING = 20;
    case COMPLETED = 50;
    case CANCELED = 30;
    case VALIDATED = 10;
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

    public function avances(): HasMany
    {
        return $this->hasMany(Avance::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(CommandeItem::class, 'command_id');
    }
}
