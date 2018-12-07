<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['name', 'surname'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function book()
    {
        return $this->hasMany(Book::class);
    }
}
