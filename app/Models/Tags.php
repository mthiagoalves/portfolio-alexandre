<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;

    protected $table = 'tags';

    protected $fillable = [
        'name',
        'slug'
    ];

    public function projects()
    {
        return $this->belongsTo(Projects::class, 'project_tags', 'tag_id', 'projects_id');
    }

}
