<?php

namespace App\Http\Controllers;

use App\Models\OvenStatus;

class OvenStatusController extends Controller
{
    public function show()
    {
        return response()->json(OvenStatus::latest()->first());
    }

    public function status()
    {
        return $this->show();
    }
}
