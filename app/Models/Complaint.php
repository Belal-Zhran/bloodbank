<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Complaint extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'client_id'];
    public function client() : BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
