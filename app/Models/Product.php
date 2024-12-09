<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    use HasFactory;
    protected $guarded = [];

    public function category(){
        return $this->hasOne(Category::class,"id","category_id");
    }
    protected function status():Attribute{
        return Attribute::make(
            get:fn(string $value) =>($value == 1) ? "Active":"Inactive"
        );
    }
    protected function isFavourite():Attribute{
        return Attribute::make(
            get:fn(string $value) =>($value == 1) ? "Yes":"No"
        );
    }

}