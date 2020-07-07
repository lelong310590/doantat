<?php
/**
 * InputComponent.php
 * Created by: trainheartnet
 * Created at: 7/4/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Core\View\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class Input extends Component
{
    public $title;
    public $name;
    public $id;
    public $defaultValue;
    public $status;

    public function __construct($title, $name, $id = '', $defaultValue = '', $status = '')
    {
        $this->title = $title;
        $this->name = $name;
        $this->id = $id != '' ? $id : Str::slug($name);
        $this->defaultValue = $defaultValue;
        $this->status = $status;
    }

    public function render()
    {
        // TODO: Implement render() method.
        return view('dashboard::components.input');
    }
}
