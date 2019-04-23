<?php namespace App\Models;

use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;
use Spatie\MediaLibrary\Media;
use Brackets\Media\HasMedia\HasMediaCollections;
use Brackets\Media\HasMedia\HasMediaCollectionsTrait;
use Illuminate\Database\Eloquent\Model;
use Brackets\Media\HasMedia\HasMediaThumbsTrait;

class User extends Model implements HasMediaCollections, HasMediaConversions
{
    
    
    protected $fillable = [
        "name",
        "email",
        "email_verified_at",
        "mobile",
        "description",
        "service_type",
        "address",
        "rating",
    
    ];
    
    protected $hidden = [
        "remember_token",
    
    ];
    
    protected $dates = [
        "email_verified_at",
        "created_at",
        "updated_at",
    
    ];
    
    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;

    public function registerMediaCollections()
    {
        $this->addMediaCollection('user_img')
            ->accepts('image/*');
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->autoRegisterThumb200();

        $this->addMediaConversion('detail_hd')
            ->width(1920)
            ->height(1080)
            ->performOnCollections('user_img');
    }

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/admin/users/'.$this->getKey());
    }


}
