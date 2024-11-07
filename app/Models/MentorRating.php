<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentorRating extends Model
{
    use HasFactory;

    protected $table = 'mentor_ratings';

    protected $fillable = [
        'mentee_id',
        'rating',
        'comments',
    ];

    public function mentee()
    {
        return $this->belongsTo(MenteeInfo::class, 'mentee_id');
    }
}
