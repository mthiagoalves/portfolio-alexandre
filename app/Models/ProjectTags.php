<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTags extends Model
{
    use HasFactory;

    protected $table = 'project_tags';

    protected $fillable = [
        'tag_id',
        'project_id'
    ];

    public function project()
    {
        return $this->belongsTo(Projects::class, 'projects_id');
    }

    public function tag()
    {
        return $this->belongsTo(Tags::class, 'tag_id');
    }
}
