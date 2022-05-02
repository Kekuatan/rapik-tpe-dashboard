<?php

namespace App\Traits;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

trait ApiCrudTrait
{
    abstract function model();
    abstract function validationRules($resource_id = 0);

    public function index()
    {
        return $this->model()::all();
    }

    public function store(Request $request)
    {
        $validatorRules = $this->validationRules();
        $payload = $request->only(array_keys($validatorRules));
        $validator = Validator::make($payload, $validatorRules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        return $this->model()::create($payload);
    }

    public function show($resource_id)
    {
        return $this->model()::findOrFail($resource_id);
    }

    public function update(Request $request, $resource_id)
    {
        $response = $this->model()::findOrFail($resource_id);

        $validatorRules = $this->validationRules();
        $payload = $request->only(array_keys($validatorRules));
        $validator = Validator::make($payload, $validatorRules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $response->update($payload);
        return response()->json($response);
    }

    public function destroy($resource_id)
    {
        $resource = $this->model()::findOrFail($resource_id);

        return $resource->delete();
    }
}
