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
    protected $primaryKey = ['guid', 'company_cd', 'section_cd', 'branch_no'];
    public $incrementing = false;
    public $timestamps = false;

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

    public function user()
    {
        return $this->belongsTo(User::class,'employee_id','guid');
    }
}