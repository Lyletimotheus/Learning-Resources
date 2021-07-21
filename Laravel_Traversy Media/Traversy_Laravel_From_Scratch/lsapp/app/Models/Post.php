<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // Change Table Name
    protected $table = 'posts';
    // Change the Primary Key -- By default the id is the primary key
    public $primaryKey = 'id'; 
    // Creating timestamps -- By default it is set to true
    public $timeStamps = 'true';
}
