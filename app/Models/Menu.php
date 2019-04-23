<?php namespace App\Models;

use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;
use Spatie\MediaLibrary\Media;
use Brackets\Media\HasMedia\HasMediaCollections;
use Brackets\Media\HasMedia\HasMediaCollectionsTrait;
use Illuminate\Database\Eloquent\Model;
use Brackets\Media\HasMedia\HasMediaThumbsTrait;

class Menu extends Model implements HasMediaCollections, HasMediaConversions
{
    
    
    protected $fillable = [
        "company_id",
        "type",
        "name",
        "price",
        "category",
    
    ];
    
    protected $hidden = [
    
    ];
    
    protected $dates = [
        "created_at",
        "updated_at",
    
    ];

    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;

    public function registerMediaCollections()
    {
        $this->addMediaCollection('item_img')
            ->accepts('image/*');
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->autoRegisterThumb200();

        $this->addMediaConversion('detail_hd')
            ->width(1920)
            ->height(1080)
            ->performOnCollections('item_img');
    }
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/admin/menus/'.$this->getKey());
    }


}
