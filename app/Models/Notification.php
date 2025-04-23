<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = ['title','content'];

    public function clients():BelongsToMany
    {
        return $this->belongsToMany(User::class)->withPivot('is_read')->withTimestamps();
    }

    //donationRequest
    public function donationRequest(): belongsTo
    {
        return $this->belongsTo(DonationRequest::class);
    }
}
