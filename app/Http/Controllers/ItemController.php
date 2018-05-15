<?php

namespace App\Http\Controllers;

use App\Entities\Item;
use App\Entities\Repositories\ItemRepository;
use App\Http\Requests\ItemRequest;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * @var ItemRepository
     */
    protected $itemRepository;

    public function __construct(ItemRepository $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }

    public function index(Request $request)
    {
        $keywords = $request->input('keywords', null);
        $items = $this->itemRepository->getItems($keywords);

        return view('web.item', compact('items', 'keywords'));
    }

    public function store(ItemRequest $request)
    {
        $this->itemRepository->createItem($request->all());

        return back()->with('success', '建立物品成功。');
    }

    public function update(Item $item, Request $request)
    {
        if (! $item->update($request->all())) {
            return back()->withErrors($item->name . ' 物品更新失敗。');
        }

        return back()->with($item->name . ' 物品更新成功。');
    }
}
