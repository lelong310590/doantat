<?php
/**
 * Editor.php
 * Created by: trainheartnet
 * Created at: 7/15/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Core\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Str;

class Editor extends Component
{
    public $title;
    public $name;
    public $id;
    public $defaultValue;

    public function __construct($title, $name, $id = '', $defaultValue = '')
    {
        $this->title = $title;
        $this->name = $name;
        $this->id = $id != '' ? $id : Str::slug($name);
        $this->defaultValue = $defaultValue;
    }

    public function render()
    {
        // TODO: Implement render() method.
        return view('dashboard::components.editor');
    }
}
