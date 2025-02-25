<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Data;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        try {
            foreach ($request->all() as $order) {
                foreach ($order['servants'] as $servant) {
                    Data::firstOrCreate([
                        'order' => $order['order'],
                        'url' => $order['url'],
                        'servant_id' => $servant['id']
                    ]);
                }
            }

            return response()->json([
               'message' => 'Portarias cadastradas com sucesso!',
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function show(): Collection
    {
        return Data::selectRaw('DATE(created_at) as date')
            ->groupBy('date')
            ->get();
    }
}
