<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Data;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index()
    {
        $data = Data::with('servant')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view("principal.index", compact('data'));
    }

    public function show(Request $request)
    {
        $query = Data::query()->with('servant');

        $filters = $request->query();

        if (!empty($filters['portaria'])) {
            $query->where('order', 'LIKE', '%' . $filters['portaria'] . '%');
        }

        if (!empty($filters['nome'])) {
            $query->whereHas('servant', function ($q) use ($filters) {
                $q->where('name', 'like', '%' . $filters['nome'] . '%');
            });
        }

        if (!empty($filters['email'])) {
            $query->whereHas('servant', function ($q) use ($filters) {
                $q->where('email', 'like', '%' . $filters['email'] . '%');
            });
        }

        if (!empty($filters['data'])) {
            $date = Carbon::createFromFormat('Y-m-d', $filters['data'])->format('Y-m-d');
            $query->whereDate('created_at', $date);
        }

        $data = $query->paginate(15)->appends($request->query());

        return view("principal.index", compact('data', 'filters'));
    }
}
