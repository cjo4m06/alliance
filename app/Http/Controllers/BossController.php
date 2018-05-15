<?php

namespace App\Http\Controllers;

use App\Entities\Repositories\BossRepository;
use Illuminate\Http\Request;

class BossController extends Controller
{
    /**
     * @var BossRepository
     */
    protected $bossRepository;

    public function __construct(BossRepository $bossRepository)
    {
        $this->bossRepository = $bossRepository;
    }

    public function index()
    {
        return view('web.boss');
    }
}
