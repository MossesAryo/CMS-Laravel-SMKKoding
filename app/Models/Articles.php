<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Articles extends Model
{
    protected $fillable = ['category_id', 'title', 'slug', 'description', 'img', 'views', 'status', 'publish_date'];

    public function Category(): BelongsTo
    {
        return $this->belongsTo(Categories::class);
    }
}
