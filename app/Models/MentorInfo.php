<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentorInfo extends Model
{
    use HasFactory;

    protected $table = 'mentor_info';

    protected $fillable = [
        'user_id',
        'expertise',
        'organization',
        'referral_source',
        'suggestions_questions',
        'achievements',
    ];

    /**
     * Get the user associated with the MentorInfo.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
