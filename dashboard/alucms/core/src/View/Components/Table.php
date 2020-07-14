<?php
/**
 * Table.php
 * Created by: trainheartnet
 * Created at: 7/7/20
 * Contact me at: longlengoc90@gmail.com
 */

namespace AluCMS\Core\View\Components;

use Illuminate\View\Component;

class Table extends Component
{
    public $type;
    public $head;
    public $tabledata;
    public $tablefield;
    public $action;
    public $relations;

    public function __construct(
        $type = 'light',
        $head = ['Tiêu đề'],
        $tabledata,
        $tablefield,
        $action = [],
        $relations = []
    )
    {
        $this->type = $type;
        $this->head = $head;
        $this->tabledata =  $tabledata;
        $this->tablefield =  $tablefield;
        $this->action = $action;
        $this->relations = $relations;
    }

    public function render()
    {
        // TODO: Implement render() method.
        return view('dashboard::components.table');
    }
}
