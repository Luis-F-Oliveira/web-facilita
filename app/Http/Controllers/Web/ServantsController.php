<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Servants;
use Illuminate\Http\Request;

class ServantsController extends Controller
{
    public function index()
    {
        $data = Servants::paginate(15);

        return view('servants.index', compact('data'));
    }

    public function show(Request $request)
    {
        $filters = $request->only(['name', 'email', 'enrollment', 'contract', 'active']);

        $query = Servants::query();

        foreach ($filters as $field => $value) {
            if (!empty($value)) {
                if ($field === 'active') {
                    $query->where($field, $value);
                } else {
                    $query->where($field, 'LIKE', '%' . $value . '%');
                }
            }
        }

        $data = $query->paginate(15)->appends($request->query());

        return view('servants.index', compact('data', 'filters'));
    }

    public function edit(string $id)
    {
        $data = Servants::find($id);

        return view('servants.edit', [
            'data' => $data
        ]);
    }
}
