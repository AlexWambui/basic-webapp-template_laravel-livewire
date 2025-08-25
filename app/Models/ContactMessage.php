<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $guarded = [];

    protected $casts = [
        'is_read' => 'boolean',
        'is_important' => 'boolean',
    ];
}
