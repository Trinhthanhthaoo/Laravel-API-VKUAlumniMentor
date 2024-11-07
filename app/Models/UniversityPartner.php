<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniversityPartner extends Model
{
    use HasFactory;

    protected $table = 'university_partners';

    protected $fillable = [
        'name',
        'email',
        'organization',
        'notes',
    ];
}
