<?php

namespace App\Http\Controllers\Services;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Service {
    public function save(Request $request, Model $model){
        $model->fill($request->only($model->getFillable()));
        $model->save();
        return $model;
    }
}