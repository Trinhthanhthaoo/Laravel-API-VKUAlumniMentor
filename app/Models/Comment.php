<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'document_id',
        'user_id',
        'content',
    ];

    /**
     * Get the document associated with this comment.
     */
    public function document()
    {
        return $this->belongsTo(CommunityDocument::class, 'document_id');
    }

    /**
     * Get the user who made this comment.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
