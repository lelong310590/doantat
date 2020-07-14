<?php
/**
 * FlashMessages.php
 * Created by: trainheartnet
 * Created at: 7/7/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Core\Supports;


class FlashMessages
{

    /**
     * return flash_message to views
     * @param $mess
     *
     * @return array
     */
    public static function returnMessage($mess)
    {
        $m = self::convert_flash_message($mess);
        return [
            'message' => $m,
            'type' => $mess
        ];
    }

    public static function convert_flash_message($mess = 'create')
    {
        switch ($mess) {
            case 'create':
                $m = trans('dashboard::dashboard.alert.create.success');
                break;
            case 'edit':
                $m = trans('dashboard::dashboard.alert.edit.success');
                break;
            case 'delete':
                $m = trans('dashboard::dashboard.alert.delete.success');
                break;
            default:
                $m = trans('dashboard::dashboard.alert.create.success');
        }

        return $m;
    }
}
