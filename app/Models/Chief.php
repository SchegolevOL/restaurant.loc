<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chief extends Model
{
    use Sluggable;
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'patronymic',
        'date_of_birth' ,
        'phone',
        'instagram',
        'facebook',
        'twitter',
        'designation_id',
        'email',
        'image',
    ];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['first_name', 'last_name', 'patronymic']
            ]
        ];
    }
}
