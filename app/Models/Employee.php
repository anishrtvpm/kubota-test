<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    /**
     * @var string
     */
    protected $table = 'employee';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_cd',
        'section_cd',
        'branch_no',
        'ja_name',
        'email',
        'disp_section',
        'office_name',
        'start_date',
        'language',
    ];
}