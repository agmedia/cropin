<?php

namespace App\Livewire\Back\Catalog;

use App\Models\Back\Catalog\Blog;
use App\Models\Back\Catalog\Category;
use App\Models\Back\Catalog\Gallery\Gallery;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithPagination;

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


    public $should_update = false;


    public function mount()
    {
        $this->addDefaultsToNewItem();

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


    public function editItem(int $key)
    {
        $this->new_item = $this->items[$key];
        $this->should_update = true;
    }


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


    public function cancelEdit()
    {
        $this->should_update = false;
        $this->addDefaultsToNewItem();
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
