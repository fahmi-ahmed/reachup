<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    
    
    protected $fillable = [
        "name",
        "mobile",
        "email",
    
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
        return url('/admin/customers/'.$this->getKey());
    }

    
}
