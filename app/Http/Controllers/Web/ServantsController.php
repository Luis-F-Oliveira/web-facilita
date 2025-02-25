<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Imports\ServantsImport;
use App\Models\Servants;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;

class ServantsController extends Controller
{
    public function index(): View
    {
        $data = Servants::paginate(15);

        return view('servants.index', compact('data'));
    }

    public function create(): View
    {
        return view('servants.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            "enrollment" => "required|integer|unique:servants,enrollment",
            "contract" => "required|integer",
            "name" => "required|string|regex:/^[a-zA-Z\s]+$/u|max:50",
            "email" => "required|email|max:50|unique:servants,email"
        ]);

        $request->merge([
            'name' => strtoupper($request->input('name'))
        ]);

        Servants::create($request->all());

        return Redirect::route('servants');
    }

    public function edit(string $id): View
    {
        $data = Servants::find($id);

        return view('servants.edit', [
            'data' => $data
        ]);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            "enrollment" => [
                "required","integer",
                Rule::unique('servants', 'enrollment')->ignore($id)
            ],
            "contract" => "required|integer",
            "name" => "required|string|regex:/^[a-zA-Z\s]+$/u|max:50",
            "email" => [
                "required","email","max:50",
                Rule::unique('servants', 'email')->ignore($id)
            ]
        ]);

        return Redirect::route('servants');
    }

    public function filter(Request $request): View
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

        return view('servants', compact('data', 'filters'));
    }

    public function import(Request $request): RedirectResponse
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx|max:2048'
        ]);

        Excel::import(new ServantsImport, $request['file']);

        return Redirect::route('servants');
    }
}
