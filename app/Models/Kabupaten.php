<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    use HasFactory;
    use HasUuids;    
    protected $table = 'm_kabupaten';
    protected $primaryKey = 'id_kabupaten';
    protected $fillable = ['nama_kabupaten'];
    
}
