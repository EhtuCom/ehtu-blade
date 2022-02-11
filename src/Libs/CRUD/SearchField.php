<?php

namespace Ehtu\EhtuBlade\Libs\CRUD;

class SearchField
{
    public $field;
    public $type;
//    public $
    public $value;
    public $defaultValue;
    public $label;

    public function __construct($field, $type, $defaultValue, $label = null)
    {
        $this->field = $field;
        $this->type = $type;

        $this->defaultValue = $defaultValue;
        $this->label = $label;

    }

    public function toArray()
    {
        return (array) $this;
    }
}

class SearchFields
{
    public $fields = [];

    public function addField($field, $type, $defaultValue, $label)
    {
        $this->fields[] = new SearchField($field, $type, $defaultValue, $label);
    }

    public function getFields()
    {
        return $this->fields;
    }

    public function setFieldValue($field, $value)
    {
        foreach ($this->fields as $fieldObject) {
            if ($fieldObject->field == $field) {
                $fieldObject->value = $value;
            }
        }
    }

    public function getFieldValue($field)
    {
        foreach ($this->fields as $fieldObject) {
            if ($fieldObject->field == $field) {
                return $fieldObject->value;
            }
        }
    }

    public function getFieldDefaultValue($field)
    {
        foreach ($this->fields as $fieldObject) {
            if ($fieldObject->field == $field) {
                return $fieldObject->defaultValue;
            }
        }
    }

    public function getFieldLabel($field)
    {
        foreach ($this->fields as $fieldObject) {
            if ($fieldObject->field == $field) {
                return $fieldObject->label;
            }
        }
    }

    public function getFieldType($field)
    {
        foreach ($this->fields as $fieldObject) {
            if ($fieldObject->field == $field) {
                return $fieldObject->type;
            }
        }
    }


}

class SearchFieldTypes
{
    public static $text = "text";
    public static $number = "number";
    public static $date = "date";
    public static $dateBetween = "date";
    public static $select = "select";
    public static $selectMultiple = "selectMultiple";
    public static $checkbox = "checkbox";
    public static $radio = "radio";
}
