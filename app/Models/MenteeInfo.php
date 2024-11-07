<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenteeInfo extends Model
{
    use HasFactory;

    protected $table = 'mentee_info';

    protected $fillable = [
        'user_id',
        'gpa',
        'achievements',
        'goals',
    ];

    /**
     * Get the user associated with the MenteeInfo.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
