<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqArticle extends Model
{
    use HasFactory;

    protected $table = 'faqs_data';
    const UPDATED_AT = 'modified_at';
    protected $primaryKey = 'faq_id';
    public function getFaqArticles(){
        return  FaqArticle::where('status', config('constants.public'))
            ->orderBy('sort', 'asc')
            ->get();
    }
}
