<?php

namespace App\Http\Controllers;

use App\Entities\Repositories\AuctionRepository;

class AuctionController extends Controller
{
    /**
     * @var AuctionRepository
     */
    protected $auctionRepository;

    public function __construct(AuctionRepository $auctionRepository)
    {
        $this->auctionRepository = $auctionRepository;
    }

    public function index()
    {
        return view('web.auction');
    }
}
