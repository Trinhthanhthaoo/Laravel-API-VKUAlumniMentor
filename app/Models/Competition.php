<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    use HasFactory;

    protected $table = 'competitions';

    protected $fillable = [
        'mentor_id',
        'title',
        'description',
        'start_date',
        'end_date',
    ];

    /**
     * Get the mentor associated with this competition.
     */
    public function mentor()
    {
        return $this->belongsTo(MentorInfo::class, 'mentor_id');
    }
}
