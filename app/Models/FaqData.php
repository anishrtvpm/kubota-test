<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqData extends Model
{
    use HasFactory;
    //テーブル名の指定
    protected $table = 'faqs_data';
    //主キー
    protected $primaryKey = 'faq_id';
    //IDの自動増分をしない
    public $incrementing = false;
    //Framework指定のタイムスタンプは使用しない
    public $timestamps = false;

    protected $Fillable = [
      'faq_id',
      'category_id',
      'sort',
      'title',
      'q_message',
      'a_message',
      'search_qa_message',
      'image_path1',
      'image_path2',
      'image_path3',
      'reference_url',
      'question_date',
      'answer_date',
      'responder',
      'status',
      'language',
      'display_group',
      'is_deleted',
      'created_user',
      'modified_at',
      'modified_user',
    ];

    public function category()
    {
        return $this->belongsTo(FaqCategory::class,'category_id');
    }

    
}
