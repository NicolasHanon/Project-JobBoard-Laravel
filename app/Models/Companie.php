<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companie extends Model
{
    use HasFactory;

    protected $table = 'companies';

    protected $fillable = [
        'name',
        'type',
        'headquarter',
        'about',
    ];

    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class);
    }
}