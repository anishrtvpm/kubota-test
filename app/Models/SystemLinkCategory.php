<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemLinkCategory extends Model
{
    use HasFactory;

    protected $table = 'system_links_categories';

    public function systemLinks()
    {
        return $this->hasMany(SystemLinks::class,'category_id','category_id');
    }
}
