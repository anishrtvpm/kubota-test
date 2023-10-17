<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Organization extends Model
{
    use HasFactory;
    const UPDATED_AT = 'modified_at';
    /**
     * @var string
     */
    protected $table = 'organization';

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
    ];

    /**
     * Get organizations affiliated to user
     *
     * @return mixed
     */
    public function getUserAffiliations($email)
    {

        $language = app()->getLocale();
        $section = 'org.' . $language . '_name';
        return DB::table('employee as emp')
        ->join('organization as org',function ($join) {
            $join->on('emp.company_cd', '=', 'org.company_cd')
                    ->on('emp.section_cd', '=', 'org.section_cd')
                    ->on('emp.branch_no', '=', 'org.branch_no');
        })
        ->select(
            'emp.primary_flg as primary_flag',
            'emp.company_cd as company_cd',
            'emp.section_cd as section_cd',
            'emp.branch_no as branch_no',
            $section . ' as section_name',
        )
        ->where('emp.email',$email)
        ->get();
        
    }
}