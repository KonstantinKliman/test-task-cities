<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\City\StoreRequest;
use App\Http\Resources\CityResource;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function store(StoreRequest $request)
    {
        $data = [
            'name' => $request->validated('name')
        ];

        $city = City::query()->create($data);

        return new CityResource($city);
    }

    public function destroy(int $id)
    {
        City::destroy($id);
    }
}
