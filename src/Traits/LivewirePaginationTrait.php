<?php
namespace Ehtu\EhtuBlade\Traits;

use App\Libs\Ehtu\EhtuLiveWireTable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder; // necessary??

trait LivewirePaginationTrait
{
    public $columns = [];
    private EhtuLiveWireTable $ehtuTable;
    public string $modelName;
    public $tableTitle = "Edit";
    //
    //public $ehtuLWCrudTargetObjectName = '';
    //public $ehtuLWCrudTargetObjectsName = '';
    //public $ehtuLWCrudVisibleColumns = [];
    //public $ehtuLWCrudColumnsHeaderNames = [];
    public $totalRows = 0;

    public $ehtuLWCrudIdName = 'id';

    //public $eLWCResults = [];

    public $search = [];
    public int $paginationCount = 10;
    public array $paginationPossibleCounts = [5, 10, 25, 50, 100];
    public $sortField = "nom";
    public $sortOrder = "asc";

    // BASIC FILTERS:
    public string $dateFrom = '';
    public string $dateTo   = '';
    public string $dateRange = '';

    public bool $editFormVisible = true;

    public $searchDefault = [];

    protected $paginationTheme = 'bootstrap';

    /** SEARCH PAGINATE...  */
    public function sortBy($field)
    {
        $this->sortField = $field;
        $this->sortOrder = ($this->sortOrder == "asc") ? "desc" : "asc";
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
        return $targetSorted->orderBy($this->sortField, $this->sortOrder);
    }
    /** SEARCH PAGINATE END  */

    //*** ADD EDIT MODAL ****/

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
        if(! isset($this->ehtuTable)) $this->setupEhtuTable();
        //$dbQuery = PreuVariacio::query();
        $dbQuery = call_user_func($this->ehtuTable->classModelName . '::query');
        $dbQuery->select($this->ehtuTable->getSelectFields());
        $dbQuery = $this->applySearch($dbQuery);
        $dbQuery = $this->applyOrderBy($dbQuery);

        $this->totalRows  = $dbQuery->count();

        //$this->eLWCResults = $dbQuery->paginate($this->paginationCount);
        return view('livewire.tepeuve.preusvariacions',
            [
                'ehtuTable' => $this->ehtuTable,
                'rows'     => $dbQuery->paginate($this->paginationCount),
                'totalRows' => $this->totalRows,
            ]
        );

        //eLWCResults
    }

    private function formDateRangeSplitDates()
    {
        $from = '';
        $to = '';
        list($from, $to) = explode(' - ', $this->dateRange, );
        $this->dateFrom = Carbon::createFromFormat('Y-m-d', $from)->startOfDay();
        $this->dateTo = Carbon::createFromFormat('Y-m-d', $to)->endOfDay();
    }
}
