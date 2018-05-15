<?php

namespace App\Entities\Repositories;

use App\Entities\Report;
use App\Packages\Repository\Repository;

class ReportRepository extends Repository
{
    public function __construct(Report $report)
    {
        $this->model = $report;
    }
}
