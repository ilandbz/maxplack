<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagenPopup extends Model
{
    use HasFactory;
    protected $fillable =['nombreImagen', 'popup_id'];


}
