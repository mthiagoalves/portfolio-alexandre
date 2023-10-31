<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;

    protected $table = 'projects';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'order'
    ];

    public function project_tags()
    {
        return $this->hasMany(ProjectTags::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tags::class, 'project_tags', 'projects_id', 'tag_id');
    }
}
