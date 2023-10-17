<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InquiryFormConfig extends Model
{
    use HasFactory;

    const UPDATED_AT = 'modified_at';
    /**
     * @var string
     */
    protected $table = 'inquiry_forms_config';

    protected $primaryKey = 'item_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'form_id',
        'sort',
        'ja_item_name',
        'en_item_name',
        'item_type',
        'select_item',
        'max_length',
        'is_required',
        'is_deleted'
    ];

    public function form()
    {
        return $this->belongsTo(InquiryForm::class,'form_id');
    }
}
