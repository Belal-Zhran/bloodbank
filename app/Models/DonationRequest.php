<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DonationRequest extends Model
{
    use HasFactory;
    protected $fillable = [ 'name',
                            'age',
                            'blood_type_id',
                            'bags_num',
                            'hospital_address',
                            'hospital_name',
                            'city_id',
                            'phone',
                            'notes',
                            'client_id'
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
    public function bloodType(): BelongsTo
    {
        return $this->belongsTo(BloodType::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    //notification
    public function notification(): hasOne
    {
        return $this->hasOne(Notification::class);
    }

}
