<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentorMenteeList extends Model
{
    use HasFactory;

    protected $table = 'mentor_mentee_list';

    protected $fillable = [
        'mentee_id',
        'mentor_id',
    ];

    /**
     * Get the mentee associated with this entry.
     */
    public function mentee()
    {
        return $this->belongsTo(MenteeInfo::class, 'mentee_id');
    }

    /**
     * Get the mentor associated with this entry.
     */
    public function mentor()
    {
        return $this->belongsTo(MentorInfo::class, 'mentor_id');
    }
}
