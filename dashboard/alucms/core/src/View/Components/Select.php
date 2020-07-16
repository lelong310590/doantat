<?php
/**
 * Select.php
 * Created by: trainheartnet
 * Created at: 7/15/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Core\View\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class Select extends Component
{
    public $title;
    public $name;
    public $id;
    public $datavalue;
    public $defaultValue;
    public $status;

    public function __construct($title, $name, $id = '', $datavalue, $defaultValue = '', $status = '')
    {
        $this->title = $title;
        $this->name = $name;
        $this->id = $id != '' ? $id : Str::slug($name);
        $this->datavalue = $datavalue;
        $this->defaultValue = $defaultValue;
        $this->status = $status;
    }

    public function render()
    {
        return view('dashboard::components.select');
    }
}
