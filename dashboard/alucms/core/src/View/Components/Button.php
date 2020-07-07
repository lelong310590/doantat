<?php
/**
 * Button.php
 * Created by: trainheartnet
 * Created at: 7/6/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Core\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public $title;

    public function __construct($title)
    {
        $this->title = $title;
    }

    public function render()
    {
        // TODO: Implement render() method.
        return view('dashboard::components.button');
    }
}
