<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homepage extends Model
{
    use HasFactory;

    protected $table = 'homepage_content';

    protected $fillable = [
        'occupation',
        'first_text',
        'second_text',
        'text_footer',
        'email',
        'phone'
    ];
}
