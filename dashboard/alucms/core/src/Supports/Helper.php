<?php
/**
 * Author: Le Ngoc Long
 * Email: longlengoc90@gmail.com
 * Phone: 078.223.6969
 * Class Helpers
 * @package AluCMS\Core\Supports
 */

namespace AluCMS\Core\Supports;

class Helper
{
    public static function loadModuleHelpers($dir)
    {
        $helpers = \File::glob($dir . '/../../helpers/*.php');
        foreach ($helpers as $helper) {
            require_once $helper;
        }
    }
}
