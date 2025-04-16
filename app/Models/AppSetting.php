<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppSetting extends Model
{
    use HasFactory;
    protected $fillable = [
                            'phone',
                            'email',
                            'facebook',
                            'twitter',
                            'instagram',
                            'youtube',
                            'about_app',
                        ];
}
