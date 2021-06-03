<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'founded', 'description', 'image_path']; //Which columns can be mass assigned
    // protected $hidden = ['id', 'name', 'founded', 'description']; // This is if we want to hide sensitive information such as id's, passwords, remember_me token
    protected $visible = ['name', 'founded']; //This is if we want to whitelist properties (show the following attributes to the user).
    // protected $timestamps = true;
    // protected $dateFormat = 'h:m:s';

    public function carModels() {
        return $this->hasMany(CarModel::class);
    }

    public function headquarter() {
        return $this->hasOne(Headquarter::class);
    }
    // Define a has many relationship

    public function engines() {
        return $this->hasManyThrough(
            Engine::class,
            CarModel::class,
            'car_id', //Foreign key on CarModel table
            'model_id'//Foreign key on Engine table
        ); //Takes 2 Arguments (1. The name of the model and 2. The name of the intermediate model )
    }

    //Define a has one through relationship
    public function productionDate() {
        return $this->hasOneThrough(
            CarProductionDate::class,
            CarModel::class,
            'car_id',
            'model_id'
        ); // We need to pass in 2 arguments (1. The model we would like to access and 2.  )
    }

    public function products() {
        return $this->belongsToMany(Product::class);
    }
    
}
