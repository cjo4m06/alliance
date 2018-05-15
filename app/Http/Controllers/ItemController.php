<?php

namespace App\Http\Controllers;

use App\Entities\Repositories\ItemRepository;
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
}
