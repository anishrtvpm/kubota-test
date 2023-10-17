<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;
    const UPDATED_AT = 'modified_at';
    /**
     * @var string
     */
    protected $table = 'announcements';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'group_id',
        'ja_message',
        'en_message',
        'start_date',
        'end_date',
    ];

    /**
     * Fetch announcements by user group
     *
     * @return array
     */
    public function getAnnouncements()
    {
        $result = [];
        $announcements = self::orderBy('group_id', 'asc')->get();
        foreach ($announcements as $announcement) {
            $result[$announcement->group_id]['group_id'] = $announcement->group_id;
            $result[$announcement->group_id]['ja_message'] = $announcement->ja_message;
            $result[$announcement->group_id]['en_message'] = $announcement->en_message;
            $result[$announcement->group_id]['daterange'] = ($announcement->start_date && $announcement->end_date) ? $announcement->start_date . ' から ' . $announcement->end_date : '';
        }
        return $result;

    }

    /**
     * Create new records or updating existing records
     *
     * @param object $request
     * @return mixed
     */
    public function saveRecords($request)
    {
        $userGroup = getActiveUserGroups();

        try {
            foreach ($userGroup as $group) {

                $startDate = $endDate = null;
                if ($request->input('daterange' . $group->group_id)) {
                    $dateRangeArray = explode(' ', $request->input('daterange' . $group->group_id));
                    $startDateTime = new DateTime($dateRangeArray[0]);
                    $endDateTime = isset($dateRangeArray[2]) ? new DateTime($dateRangeArray[2]) : $startDateTime; //When choosing same date as start and end date

                    $startDate = $startDateTime->format('Y-m-d');
                    $endDate = $endDateTime->format('Y-m-d');
                }

                $announcement = self::find($group->group_id) ?: new Announcement;
                $announcement->group_id = $group->group_id;
                $announcement->ja_message = $request->input('ja_message' . $group->group_id);
                $announcement->en_message = $request->input('en_message' . $group->group_id);
                $announcement->start_date = $startDate;
                $announcement->end_date = $endDate;
                if ($announcement->id) {
                    $announcement->modified_user = authUser()->guid;
                } else {
                    $announcement->created_user = authUser()->guid;
                }
                $announcement->save();
            }
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * custom validation rules
     *
     * @param object $request
     * @return array
     */
    public function validateInputData($request)
    {
        $userGroup = getActiveUserGroups();

        $response['error'] = $response['message'] = '';
        foreach ($userGroup as $group) {
            if (!$request['ja_message' . $group->group_id]) {
                $response['error'] = true;
                $response['message'] = (app()->getLocale() == 'ja' ? $group->group_ja_name : $group->group_en_name) . ': ' . __('JP_message_required');
                break;
            }
            if (!$request['en_message' . $group->group_id]) {
                $response['error'] = true;
                $response['message'] = (app()->getLocale() == 'ja' ? $group->group_ja_name : $group->group_en_name) . ': ' . __('EN_message_required');
                break;
            }
            if ($request['ja_message' . $group->group_id] && mb_strlen($request['ja_message' . $group->group_id], 'UTF-8') > 120) {
                $response['error'] = true;
                $response['message'] = (app()->getLocale() == 'ja' ? $group->group_ja_name : $group->group_en_name) . ': ' . __('JP_message_length');
                break;
            }
            if ($request['en_message' . $group->group_id] && strlen($request['en_message' . $group->group_id]) > 120) {
                $response['error'] = true;
                $response['message'] = (app()->getLocale() == 'ja' ? $group->group_ja_name : $group->group_en_name) . ': ' . __('EN_message_length');
                break;
            }
            if (!$request['daterange' . $group->group_id]) {
                $response['error'] = true;
                $response['message'] = (app()->getLocale() == 'ja' ? $group->group_ja_name : $group->group_en_name) . ': ' . __('delivery_period_required');
                break;
            }
        }
        return $response;
    }
}