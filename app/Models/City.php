<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'governorate_id'];



    public function governorate():belongsTo
    {
        return $this->belongsTo(Governorate::class);
    }
    public function clients():HasMany
    {
        return $this->hasMany(Client::class);
    }

    public function donationRequests():HasMany
    {
        return $this->hasMany(DonationRequest::class);
    }
}
