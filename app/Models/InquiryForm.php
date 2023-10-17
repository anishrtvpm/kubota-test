<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InquiryForm extends Model
{
    use HasFactory;

    const UPDATED_AT = 'modified_at';
    /**
     * @var string
     */
    protected $table = 'inquiry_forms';

    protected $primaryKey = 'form_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status',
        'subject_en',
        'subject_ja',
        'to_addr',
        'is_deleted'
    ];

    public function formItems()
    {
        return $this->hasMany(InquiryFormConfig::class, 'form_id');
    }
}
