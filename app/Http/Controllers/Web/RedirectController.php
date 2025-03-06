<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Data;

class RedirectController extends Controller
{
    public function index(string $id)
    {
        $data = Data::find($id);

        if (empty($data)) {
            return abort(404, 'Registro não encontrado');
        }

        return redirect($data->url);
    }
}
