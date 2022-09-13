<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientMaster extends Model
{
    protected $table = 'client_master';
    use HasFactory;

    public function client_category_name()
    {
        return $this->belongsTo(ClientCategoryMaster::class,'client_category_id');
    }
}
