# Laravel Livewire Blade  HTML helper 💪🏎️🚨

## Just to make my own life easy with Laravel and Livewire 

Important note: This package it's just an <b>Alpha test</b> and my first Laravel Package so be careful using it! or don't use it at all :S

# Forms and inputs elements
## Input text with validation errors
Example for input text
```html
<x-EhtuBlade::input.text wire:model.lazy="model.attribute" name="attribute" errorTarget="model.attribute"/>
```
## Input Select with validation errors
Input select example:<br/>
💡:keyvalues should be an associative array defined in the Livewire component
```html
<x-EhtuBlade::input.select 
        wire:model.lazy="model.attribute"  
        name="atribute"
        :keyValues="$preuVariacio::PREU_VARIACIONS_ZONES"
        errorTarget="model.attribute" />
```

## Daterange picker with validation errors
DataRangePicker example:
```html
<span>From to  <x-input.date-range-picker wire:model.defer="dateRange" id="dateRange" /></span>
```
**To use dateRangePicker** include the following files in your html header and footer:<br/>
Header:
```html
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
```
Footer:
```html
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
```


Check documentacion about date range picker at http://www.daterangepicker.com/#examples


