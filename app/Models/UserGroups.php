<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGroups extends Model
{
    use HasFactory;
    /**
     * @var string
     */
    protected $table = 'user_groups';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'group_ja_name',
        'group_en_name'
    ];

}