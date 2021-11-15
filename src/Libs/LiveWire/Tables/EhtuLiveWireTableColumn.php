<?php
namespace Ehtu\EhtuBlade\Libs\LiveWire\Tables;


class EhtuLiveWireTableColumn
{
    public function __construct(

        public string $name = '',

        public string $type = 'dbField', // dbField, actions, dbFieldComposed, calculus

        // enum : dbField, dbFieldComposed, actions, calculus

        public ?string $displayName = null,
        public bool $isKey = false,


        public string $fieldType = 'string', // int, string, bool, date, datetime, bloob, double, decimal, ...

        public array $actionsDefaultEnbled = ['delete', 'edit'],

        public bool $isSortable = true,
        public bool $isSearchable = true,

        public string $cssTDHeaderClass = '',
        public string $cssTDClass = '',
        public string $cssHideByScreenSizeLowerThan = ''
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
}