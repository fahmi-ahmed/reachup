<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    
    
    protected $fillable = [
        "name",
        "mobile",
        "address",
        "type",
        "rating",
    
    ];
    
    protected $hidden = [
    
    ];
    
    protected $dates = [
        "created_at",
        "updated_at",
    
    ];
    
    
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/admin/companies/'.$this->getKey());
    }

    
}
