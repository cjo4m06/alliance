<?php

namespace App\Http\Controllers;

use App\Entities\Repositories\ReportRepository;

class ReportController extends Controller
{
    /**
     * @var ReportRepository
     */
    protected $reportRepository;

    public function __construct(ReportRepository $reportRepository)
    {
        $this->reportRepository = $reportRepository;
    }

    public function index()
    {
        return view('web.report');
    }
}
