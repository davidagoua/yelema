<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Pack extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function specs() : MorphMany
    {
        return $this->morphMany(Spec::class, 'specable');
    }
}
