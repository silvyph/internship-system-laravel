<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Intern extends Model
{
    protected $table = 'internships_new';

    protected $fillable = [
        'letter_date', 'institution_name', 'major', 'division_id', 'user_id',
        'start_date', 'end_date', 'request_letter', 'acceptance_letter',
        'kesbangpol_letter', 'documentation', 'name', 'email', 'address',
        'date_of_birth', 'phone', 'status',
    ];

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
