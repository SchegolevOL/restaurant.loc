<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

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
        'address',
        'rating',
        'salary',
        'description',
    ];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['first_name', 'last_name', 'patronymic']
            ]
        ];
    }
    public static function uploadImage(Request $request, $image = null)
    {

        if ($request->hasFile('photo')) {
            if ($image)Storage::delete($image);
            $path=$request->file('photo')->store('images/chief');
            $manager = new ImageManager(new Driver());
            $image = $manager->read($path);
            $image->resize(200,200);
            $image->save($path);

            return asset($path);

        }
        return $image;


    }

    public function getImage()
    {
        if (!$this->image) {
            return asset("no-image.png");
        }
        return asset("/public/{$this->image}");
    }
}
