<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class IndSalesCorpsUsers extends Authenticatable
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'ind_sales_corps_users';

    protected $primaryKey = 'guid';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'guid',
        'company_cd',
        'ja_user_name',
        'en_user_name',
        'section',
        'email',
        'phone',
        'language',
        'start_date',
        'end_date',
        'memo',
        'is_deleted'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'employee_id','guid');
    }
}
