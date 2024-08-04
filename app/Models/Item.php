<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Item extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function save(array $options = [])
    {
        $this->slug = Str::slug($this->name);
        return parent::save($options);
    }


}
