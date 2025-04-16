<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BloodType extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function clients(): HasMany
    {
        return $this->hasMany(Client::class);
    }

    public function donationRequests(): HasMany
    {
        return $this->hasMany(DonationRequest::class);
    }

    public function clientBloodTypes(): BelongsToMany
    {
        return $this->belongsToMany(Client::class);
    }
}
