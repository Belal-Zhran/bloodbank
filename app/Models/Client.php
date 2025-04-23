<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class Client extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [ 'name',
                            'email',
                            'birth_date',
                            'blood_type_id',
                            'last_donation',
                            'city_id',
                            'phone',
                            'password'
    ];

    public function bloodType(): BelongsTo
    {
        return $this->belongsTo(BloodType::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function complaints(): HasMany
    {
        return $this->hasMany(Complaint::class);
    }

    public function donationRequests(): HasMany
    {
        return $this->hasMany(DonationRequest::class);
    }

    public function notifications (): BelongsToMany
    {
        return $this->belongsToMany(Notification::class)->withPivot('is_read')->withTimestamps();
    }

    public function governorates(): BelongsToMany
    {
        return $this->belongsToMany(Governorate::class)->withTimestamps();
    }

    public function clientBloodTypes(): BelongsToMany
    {
        return $this->belongsToMany(BloodType::class)->withTimestamps();
    }

    public function favourites(): BelongsToMany
    {
        return $this->BelongsToMany(Article::class)->withTimestamps();
    }

    protected $hidden = [
        'password', 'remember_token','api_token'
    ];
}
