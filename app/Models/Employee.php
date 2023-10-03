<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Employee extends Authenticatable
{
    use HasFactory;
    /**
     * @var string
     */
    protected $table = 'employee';
    protected $primaryKey = 'guid';
    public $incrementing = false;
    public $timestamps = false;

    // protected $primaryKey = 'guid';

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