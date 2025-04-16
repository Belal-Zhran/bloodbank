<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['title',
                           'body',
                           'photo',
                           'category_id'
                        ];

    public function catigory() :belongsTo
    {
        return $this->belongsTo(Catigory::class);
    }

    public function favourites() :BelongsToMany
    {
        return $this->belongsToMany(Client::class)->withTimestamps();
    }
}
