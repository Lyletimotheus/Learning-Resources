<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'founded', 'description']; //Which columns can be mass assigned
    // protected $hidden = ['id', 'name', 'founded', 'description']; // This is if we want to hide sensitive information such as id's, passwords, remember_me token
    protected $visible = ['name', 'founded']; //This is if we want to whitelist properties (show the following attributes to the user).
    // protected $timestamps = true;
    // protected $dateFormat = 'h:m:s';

    public function carModels() {
        return $this->hasMany(CarModel::class);
    }
    
}
