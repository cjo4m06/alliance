<?php

namespace App\Http\Controllers;

use App\Entities\Repositories\LootRepository;

class LootController extends Controller
{
    /**
     * @var LootRepository
     */
    protected $lootRepository;

    public function __construct(LootRepository $lootRepository)
    {
        $this->lootRepository = $lootRepository;
    }

    public function index()
    {
        return view('web.loot');
    }
}
