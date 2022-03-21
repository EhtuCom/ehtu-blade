<?php
namespace Ehtu\EhtuBlade\Traits;

//use Ehtu\EhtuBlade\Libs\LiveWire\Tables;
use Carbon\Carbon;
use Ehtu\EhtuBlade\Libs\LiveWire\Tables\EhtuLiveWireTable;
use Illuminate\Database\Eloquent\Builder;
use function PHPUnit\Framework\isEmpty;

// necessary??

trait EhtuCRUDTrait
{

    public $columns = [];
    private EhtuLiveWireTable $ehtuTable;
    public string $modelName;
    public $tableTitle = "Edit";

    public $totalRows = 0;



    public $ehtuLWCrudIdName = 'id';

    //public $eLWCResults = [];


    public int $paginationCount = 25;
    public array $paginationPossibleCounts = [10, 25, 50, 100];

    public string $sortField = '';
    public string $sortDirection = '';

    // BASIC FILTERS:
    public $searchDefault = [];
    public $search = [];
    // to remove?
    public string $dateFrom = '';
    public string $dateTo   = '';
    public string $dateRange = '';

    public bool $editFormVisible = true;

    protected $paginationTheme = 'bootstrap';

    public bool $ehtuCrudLoaded = false;




    public function getListeners()
    {
        return $this->listeners + ['closeEdit', 'delete', 'edit'];
    }

    /*******************************************************************/
    /** SEARCH PAGINATE...  */

    public function sortBy($sortField)
    {
        $this->sortField = $sortField;
        $this->sortDirection = ($this->sortDirection == "asc") ? "desc" : "asc";

    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updateThis()
    {
        $this->resetPage();
    }

    public function updatedPaginationCount()
    {
        $this->resetPage();
    }


    public function clearAll()
    {
        $this->search = $this->searchDefault;
        $this->resetPage();
    }

    private function applySearch(\Illuminate\Database\Eloquent\Builder $targetSearched)
    {
        foreach ($this->search as $searchItem => $searchItemValue)
        {
            // Todo - add more search types
            $targetSearched = ($this->search[$searchItem]) ? $targetSearched->where($searchItem, 'like', '%' . $searchItemValue . '%') : $targetSearched;
        }
//        $users = ($this->search['name']) ? $users->where('name', 'like', '%' . $this->search['name'] . '%') : $users;
//        $users = ($this->search['email']) ? $users->where('email', 'like', '%' . $this->search['email'] . '%') : $users;
//        $users = ($this->search['id']) ? $users->where('id', '=', $this->search['id']) : $users;
//        $users = ($this->search['role_id']) ? $users->where('role_id', '=', $this->search['role_id']) : $users;
        return $targetSearched;
    }

    private function applyOrderBy($targetSorted)
    {
        //$this->addDebug('key??: ' . $this->ehtuTable->getPrimaryKeyName());
        $this->sortDefaults();
        return $targetSorted->orderBy($this->sortField, $this->sortDirection);
    }

    private function sortDefaults()
    {
        if(empty($this->sortField))
        {
            if(empty($this->ehtuTable->sortField))
            {
                $this->sortField = $this->ehtuTable->getPrimaryKeyName();
            } else
            {
                $this->sortField = $this->ehtuTable->sortField;
            }
        }

        if(empty($this->sortDirection))
        {
            $this->sortDirection = $this->ehtuTable->sortDirection ?? 'desc';
        }
    }


    /** SEARCH PAGINATE END  */
    /*******************************************************************/


    //*** ADD EDIT MODAL ****/

    public function create()
    {
        $this->modalOpen();
    }


    public function modalOpen()
    {
        //$this->editFormVisible = true;
        $this->emit('modalOpen');
    }

    public function modalClose()
    {
        //$this->editFormVisible = false;
        $this->emit('modalClose');
    }

    public function hydrate()
    {
        $this->resetValidation();
    }

    //*** ADD EDIT MODAL ...END ****/

    public function render()
    {
        if(!isset($this->ehtuTable)) $this->setupEhtuTable();

        $dbQuery = call_user_func($this->ehtuTable->classModelName . '::query');

        $dbQuery->select($this->ehtuTable->getSelectFields());
        $dbQuery->with('distribuidora');
        $dbQuery = $this->applySearch($dbQuery);
        $dbQuery = $this->applyOrderBy($dbQuery);

        $rows = $dbQuery->paginate($this->paginationCount);

        return view('EhtuBlade::livewire.ehtu-blade.ehtu-blade-auto-crud',
            [
                'ehtuTable' => $this->ehtuTable,
                'rows'     => $rows,
            ]
        );
    }

    // Search eloquent model fields

    public function modelGetColumnsAndTypes()
    {
        $model = new $this->ehtuTable->classModelName;
        $columns = $model->getConnection()->getSchemaBuilder()->getColumnListing($model->getTable());
        $columnsAndTypes = [];
        foreach ($columns as $column)
        {
            $columnsAndTypes[$column] = $model->getConnection()->getDoctrineColumn($model->getTable(), $column)->getType()->getName();
        }
        return $columnsAndTypes;
    }

    private function formDateRangeSplitDates()
    {
        $from = '';
        $to = '';
        list($from, $to) = explode(' - ', $this->dateRange, );
        $this->dateFrom = Carbon::createFromFormat('Y-m-d', $from)->startOfDay();
        $this->dateTo = Carbon::createFromFormat('Y-m-d', $to)->endOfDay();
    }

    // Debug stuff
    public string $debug = '';

    public function addDebug($msg)
    {
        // Check if in laravel debug mode
        if (config('app.debug')) {
            $this->debug .= $msg . '❤️';
        }
    }
}
