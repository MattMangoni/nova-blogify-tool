<?php

namespace Mattmangoni\NovaBlogifyTool\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Model fillable fields.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
    ];
}
