<?php
namespace Ehtu\EhtuBlade\Libs\LiveWire\Tables;

//use Carbon\Carbon;

//use App\Http\Traits\LivewirePaginationTrait;

/** @var $this->parent App\Http\Traits\LivewirePaginationTrait */

class EhtuLiveWireTable
{
    public array|EhtuLiveWireTableColumn $columns = array();

    public $editedModel = null;

    public function __construct(
        public $parent,
        public ?string $displayName = null,
        public ?string $targetModel = null,
        public ?string $classModelName = '',
        public bool $showId = false,
        // Sorting
        public string $sortField = '',
        public string $sortDirection = 'asc',
        // Pagination
        public bool $paginationEnabled = true,
        public int $paginationCount = 10,
        public bool $autoDiscoverColumns = false
    )
    {
        if($this->targetModel)
        {

        }
    }

    public function addColumn(EhtuLiveWireTableColumn $column)
    {
        $this->columns[] = $column;
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
            }
        }
        return $arRes;
    }
}


