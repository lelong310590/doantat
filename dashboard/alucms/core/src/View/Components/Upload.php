<?php
/**
 * Upload.php
 * Created by: trainheartnet
 * Created at: 7/16/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Core\View\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class Upload extends Component
{
    public $title;
    public $name;
    public $id;
    public $defaultValue;
    public $type;


    public function __construct($title, $name, $id = '', $defaultValue = '', $type = 0)
    {
        $this->title = $title;
        $this->name = $name;
        $this->id = $id != '' ? $id : Str::slug($name);
        $this->defaultValue = $defaultValue;
        $this->type = $type;
    }

    public function render()
    {
        // TODO: Implement render() method.
        return view('dashboard::components.upload');
    }
}
