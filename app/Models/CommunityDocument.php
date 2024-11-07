<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunityDocument extends Model
{
    use HasFactory;

    protected $table = 'community_documents';

    protected $fillable = [
        'mentor_id',
        'mentee_id',
        'title',
        'content',
        'status',
    ];

    /**
     * Get the mentor associated with this document.
     */
    public function mentor()
    {
        return $this->belongsTo(MentorInfo::class, 'mentor_id');
    }

    /**
     * Get the mentee associated with this document.
     */
    public function mentee()
    {
        return $this->belongsTo(MenteeInfo::class, 'mentee_id');
    }
}
