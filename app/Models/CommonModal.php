<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SystemLinks;
class CommonModal extends Model
{
    use HasFactory;

    public function getSystemLinkData(){
        $systemLinks = SystemLinks::join('system_links_categories', 'system_links_categories.category_id', '=', 'system_links.category_id')
        ->select('system_links.*', 'system_links_categories.ja_category_name')
        ->orderByRaw('system_links.sort ASC')
        ->get();
        $groupedItems = [];

        foreach ($systemLinks as $item) {
            $categoryId = $item['ja_category_name'];
            if (!isset($groupedItems[$categoryId])) {
                $groupedItems[$categoryId] = [];
            }
            $groupedItems[$categoryId][] = $item;
        }
        return $groupedItems;
    }
}
