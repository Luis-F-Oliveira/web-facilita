<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index()
    {
        $data = Data::with('servant')->paginate(15);

        return view("principal.index", compact('data'));
    }

    public function show(Request $request)
    {
        $query = Data::query()->with('servant');

        if ($request->filled('portaria')) {
            $query->where('order', $request->query('portaria'));
        }

        if ($request->filled('nome')) {
            $query->whereHas('servant', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->query('nome') . '%');
            });
        }

        if ($request->filled('email')) {
            $query->whereHas('servant', function ($q) use ($request) {
                $q->where('email', 'like', '%' . $request->query('email') . '%');
            });
        }

        if ($request->filled('data')) {
            $date = \Carbon\Carbon::createFromFormat('Y-m-d', $request->query('data'))->format('Y-m-d');
            $query->whereDate('created_at', $date);
        }

        $data = $query->paginate(15);

        return view("principal.index", compact('data'));
    }
}
