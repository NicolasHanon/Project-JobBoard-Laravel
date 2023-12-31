<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $table = 'applications';

    public static $rules = [
        'accepted' => 'required|integer|between:0,2',
    ];

    protected $fillable = [
        'user_id',
        'jobs_id',
        'message',
        'accepted',
        'title',
        'name'
    ];
  
    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(Users::class);
    }
}
