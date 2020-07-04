<?php
/**
 * Author: Le Ngoc Long
 * Email: longlengoc90@gmail.com
 * Phone: 078.223.6969
 */

if (!function_exists('is_in_dashboard')) {
    /**
     * @return bool
     */
    function is_in_dashboard() {
        $segment = request()->segment(1);
        if ($segment === config('SOURCE_ADMIN_ROUTE', 'admincp')) {
            return true;
        }

        return false;
    }
}

if (!function_exists('get_status')) {
    function get_status($status) {
        switch ($status) {
            case 'active':
                return '<span class="status-circle btn-success" data-toggle="tooltip" data-placement="top" title="'.trans('core::dashboard.active').'"></span>';
            case 'disable':
                return '<span class="status-circle btn-warning" data-toggle="tooltip" data-placement="top" title="'.trans('core::dashboard.disable').'"></span>';
            default:
                return '<span class="status-circle btn-default" data-toggle="tooltip" data-placement="top" title="'.trans('core::dashboard.disable').'"></span>';
        }
    }
}
