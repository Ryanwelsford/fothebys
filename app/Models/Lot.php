<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'subject',
        'artist',
        'year',
        'description',
        'price',
        'category',
    ];

    public function cutDescription()
    {
        $desc = $this->description;

        if (strlen($desc) > 50) {
            $desc = substr($desc, 0, 50);
        }

        return $desc;
    }

    public function fillItem(array $array)
    {
        $this->id = $array['id'];
        $this->name = $array['name'];
        $this->subject = $array['subject'];
        $this->artist = $array['artist'];
        $this->year = $array['year'];
        $this->description = $array['description'];
        $this->price = $array['price'];
        $this->category = $array['category'];
    }

    public function images()
    {
        return $this->hasMany(Images::class);
    }

    public function painting()
    {
        return $this->hasOne(Painting::class);
    }

    public function sculpture()
    {
        return $this->hasOne(Sculpture::class);
    }

    public function carving()
    {
        return $this->hasOne(Carving::class);
    }

    public function photo()
    {
        return $this->hasOne(Photo::class);
    }

    public function drawing()
    {
        return $this->hasOne(Drawing::class);
    }

    public function categoryDetails()
    {

        $category = strtolower($this->type());

        return $this->$category();
    }

    public function type()
    {

        if ($this->category == "Photographic Image") {
            return "photo";
        }

        return $this->category;
    }
}
