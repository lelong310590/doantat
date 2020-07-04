<?php
/**
 * Author: Le Ngoc Long
 * Email: longlengoc90@gmail.com
 * Phone: 078.223.6969
 * Class DashboardController
 * @package AluCMS\Core\Http\Controllers
 */

namespace AluCMS\Core\Http\Controllers;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function getIndex()
    {
        return view('dashboard::index');
    }
}
