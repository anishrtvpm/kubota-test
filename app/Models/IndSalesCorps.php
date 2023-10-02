<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndSalesCorps extends Model
{
    use HasFactory;

    protected $table = 'ind_sales_corps';
    protected $primaryKey = 'company_id';
    public $incrementing = false;
    protected $keyType = 'integer';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'company_id',
        'company_name',
        'short_name',
        'head_name',
        'address',
        'phone',
        'url',
        'start_date',
        'end_date',
        'memo',
        'is_deleted',
        'created_at',
        'created_user',
        'modified_at',
        'modified_user'
    ];
}