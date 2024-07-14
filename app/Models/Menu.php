<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class Menu extends Model
{
    use Sluggable;
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'price',
    ];

    public function types(): BelongsToMany
    {
        return $this->belongsToMany(Type::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public static function uploadImage(Request $request, $image = null)
    {
        if ($request->hasFile('image')) {
            if ($image) Storage::delete($image);
            $path = $request->file('image')->store('images/menu');
            $manager = new ImageManager(new Driver());
            $image = $manager->read($path);
            $image->resize(80, 80);
            $image->save($path);

            return asset($path);

        }
        return $image;


    }

    public function getTypes()
    {
        $types = $this->types();

    }

    public function getImage()
    {
        if (!$this->image) {
            return asset("no-image.png");
        }
        return asset("/public/{$this->image}");
    }
}
