<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'status',
        'start_date',
        'end_date',
        'user_id',
    ];

    // Jika ingin relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
