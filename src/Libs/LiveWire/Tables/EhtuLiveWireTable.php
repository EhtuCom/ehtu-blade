<?php
namespace Ehtu\EhtuBlade\Libs\LiveWire\Tables;

//use Carbon\Carbon;

//use App\Http\Traits\LivewirePaginationTrait;

/** @var $this->parent App\Http\Traits\LivewirePaginationTrait */

class EhtuLiveWireTable
{
    public array|EhtuLiveWireTableColumn $columns = array();

    public $editedModel = null;

    /** @var $this->parent Ehtu\EhtuBlade\Traits\EhtuCRUDTrait */

    public function __construct(

        public $parent,
        public ?string $targetModel = null,
        public ?string $classModelName = '',
        public ?string $displayName = null,
        public bool $showId = false,
        // Sorting
        public string $sortField = '',
        public string $sortDirection = 'desc',
        // Pagination
        public bool $paginationEnabled = true,
        public int $paginationCount = 10,
        public bool $autoDiscoverColumns = false,
        //    protected $listeners = ['closeEdit', 'delete', 'edit'];


        public bool $actionEditEnabled = true,
        public bool $actionCreateEnabled = true,
        public bool $actionViewEnabled = true,

        public bool $actionDeleteEnabled = true,
        public bool $actionDeleteConfirm = true,

        public bool $actionsShowColumn = true,
        public string $actionsColumnDisplayName = 'Actions',
        public bool $actionsShowOnHover = true,


    )
    {

        if($this->targetModel)
        {

        }
    }


    public function addColumn(EhtuLiveWireTableColumn $column)
    {
        $this->columns[] = $column;
        return $this;

    }

    public function getSelectFields()
    {
        $arRes = [];
        foreach ($this->columns as $column)
        {
            /* @var $column \App\Libs\Ehtu\EhtuLiveWireTableColumn */
            if($column->type == 'dbField')
            {
                array_push($arRes, $column->name);
            } else
            {
                array_push($arRes, $column->name);
            }
        }
        return $arRes;
    }

    public function getPrimaryKeyName()
    {
        // get primary key name from eloquent model by name $
        $model = new $this->classModelName;
        return $model->getKeyName();
    }

    public function sayHello()
    {
        return 'Hello';
    }

}

// class enum search types
class EhtuLiveWireTableColumnType
{
    const dbField = 'dbField';
    const int = 'int';
    const uuid = 'uuid';
    const text = 'text';
    const date = 'date';

    const datetime = 'datetime';
    const time = 'time';
    const number = 'number';
    const boolean = 'boolean';
    const select = 'select';
    const checkbox = 'checkbox';

    const action = 'action';
}

//enum EhtuLiveWireTableColumnType : string
//{
//    int,
//    uuid,
//    dbField,
//    text,
//    date,
//    datetime,
//    time,
//    number,
//    boolean,
//    select,
//    checkbox,
//    action
//}

