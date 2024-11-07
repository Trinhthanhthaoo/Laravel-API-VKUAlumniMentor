<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetitionRegistration extends Model
{
    use HasFactory;

    protected $table = 'competitions_registrations';

    protected $fillable = [
        'competition_id',
        'mentee_id',
        'user_id',
    ];

    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }

    public function mentee()
    {
        return $this->belongsTo(MenteeInfo::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
