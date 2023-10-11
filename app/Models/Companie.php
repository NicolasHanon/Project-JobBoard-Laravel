<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companie extends Model
{
    use HasFactory;

    protected $table = 'companies';

    protected $fillable = [
        'title',
        'contract',
        'more',
        'location',
    ];

    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class);
    }
}