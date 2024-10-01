<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommandeItem extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function commande(): BelongsTo
    {
        return $this->belongsTo(Commande::class, 'command_id');
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

    public function getNameAttribute(){
        return $this->item->name;
    }
}
