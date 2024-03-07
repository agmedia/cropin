<?php

namespace App\Livewire\Back\Catalog;

use App\Models\Back\Catalog\Blog;
use App\Models\Back\Catalog\Category;
use App\Models\Back\Catalog\Gallery\Gallery;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithPagination;

/**
 *
 */
class ListingMenu extends Component
{
    use WithPagination;

    /**
     * @var string[]
     */
    protected $listeners = ['groupUpdated' => 'groupSelected'];

    /**
     * @var string
     */
    public $menu = '';

    /**
     * @var array
     */
    public $items = [];

    /**
     * @var array
     */
    public $new_item = [];

    /**
     * @var array
     */
    public $groups = [];

    /**
     * @var string
     */
    public $new_group = '';

    /**
     * @var bool
     */
    public $should_update = false;


    /**
     * @return void
     */
    public function mount()
    {
        $this->addDefaultsToNewItem();
        $this->groups = collect();

        if ($this->menu != '') {
            $this->items = json_decode($this->menu, true);

            $this->groups = collect($this->items)->pluck('group')->unique();
        }
    }


    /**
     * @param int $id
     */
    public function addItem(bool $update = false)
    {
        if ( ! $update) {
            array_push($this->items, $this->new_item);
        } else {
            $this->updateItem();
            $this->should_update = false;
        }

        $this->addDefaultsToNewItem();
    }


    /**
     * @param int $key
     *
     * @return void
     */
    public function editItem(int $key)
    {
        $this->new_item = $this->items[$key];
        $this->should_update = true;
    }


    /**
     * @return void
     */
    public function updateItem()
    {
        foreach ($this->items as $key => $item) {
            if ($this->new_item['id'] == $item['id']) {
                $this->items[$key] = $this->new_item;
            }
        }
    }


    /**
     * @param int $id
     */
    public function removeItem(int $key)
    {
        unset($this->items[$key]);
    }


    /**
     * @return void
     */
    public function cancelEdit()
    {
        $this->should_update = false;
        $this->addDefaultsToNewItem();
    }


    /**
     * @return void
     */
    public function addNewGroup()
    {
        if ($this->new_group != '') {
            $this->groups->push($this->new_group);
        }

        $this->new_group = '';
    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {


        return view('livewire.back.catalog.listing-menu', [
            'items' => $this->items
        ]);
    }


    /**
     * @return string
     */
    public function paginationView()
    {
        return 'vendor.pagination.bootstrap-livewire';
    }

    /*******************************************************************************
    *                                Copyright : AGmedia                           *
    *                              email: filip@agmedia.hr                         *
    *******************************************************************************/

    /**
     * @return void
     */
    private function addDefaultsToNewItem()
    {
        $add = [];

        foreach (ag_lang() as $lang) {
            $add[$lang->code] = null;
        }

        $this->new_item = [
            'id' => count($this->items) + 1,
            'group' => null,
            'title' => $add,
            'description' => $add,
            'price' => 0,
            'sort' => 0,
            'status' => true
        ];
    }
}
