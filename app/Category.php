<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Category
 * @property string $name
 * @package App
 */
class Category extends Model
{
    public $timestamps = false;

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
}
