<?php
namespace Ehtu\EhtuBlade\Libs\LiveWire\Tables;


use Ehtu\EhtuBlade\Libs\CRUD\SearchField;

class EhtuLiveWireTableColumn
{
    public function __construct(

        public string $name = '',

        public string $type = EhtuLiveWireTableColumnType::dbField, // dbField, actions, dbFieldComposed, calculus

        // enum: dbField, dbFieldComposed, actions, calculus

        public ?string $displayName = null,
        public bool $isKey = false,


        public string $fieldType = 'string', // int, string, bool, date, datetime, bloob, double, decimal, AUTO

        public array $actionsDefaultEnbled = ['delete', 'edit'],

        public bool $isSortable = true,
        public bool $isSearchable = true,

        public string $cssTDHeaderClass = '',
        public string $cssTDClass = '',
        public string $cssHideByScreenSizeLowerThan = '',
        public bool $isHidden = false,
        public bool $isSortedDefault = false,
        public string $idSortedDefaultOrder = 'desc',
        public ?SearchField $searchField = null,
        public bool $isRelation = false,

        public string $relationName = '',
        public string $relationField = '',
        public string $relationFieldType = 'onetoone', // onetoone, manytoone, manytomany

        public bool $isCalculus = false,
        public string $calculusType = 'sum', // sum, count, avg, max, min

        public bool $hidden = false,

        public string $cssStyle = '',
        public string $cssClass = '',
        public string $cssClassTD = '',
        public string $cssClassTDHeader = '',
        public string $cssClassTDHeaderSorted = '',
        public string $cssClassTDHeaderSortedDefault = '',
        public string $cssClassTDHeaderSortedDefaultAsc = '',

        public string $cssWidth = '',
    )
    {  }

    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    public function setDisplayName(string $displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }

    public function setAsSearchable(bool $val = true)
    {
        $this->searchable = $val;
        return $this;
    }

    public function setFieldType(string $val = 'string')
    {
        $this->fieldType = $val;
        return $this;
    }


}

class EhtuLiveWireTableColumns
{
    public function __construct(
        public array $columns = []
    )
    {  }

    public function add(EhtuLiveWireTableColumn $column)
    {
        $this->columns[] = $column;
        return $this;
    }

    public function getDefaultOrder()
    {
        $defaultOrder = null;
        foreach ($this->columns as $column) {
            if ($column->isSortedDefault) {
                $defaultOrder = $column->name;
                break;
            }
        }
        return $defaultOrder;
    }

    public function getDefaultOrderDirection()
    {
        $defaultOrderDirection = null;
        foreach ($this->columns as $column) {
            if ($column->isSortedDefault) {
                $defaultOrderDirection = $column->idSortedDefaultOrder;
                break;
            }
        }
        return $defaultOrderDirection;
    }

}
