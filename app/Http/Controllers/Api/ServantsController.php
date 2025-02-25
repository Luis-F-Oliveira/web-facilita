<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Servants;
use Illuminate\Database\Eloquent\Collection;

class ServantsController extends Controller
{
    public function index(): Collection
    {
        return Servants::select('id', 'name')->get();
    }
}
