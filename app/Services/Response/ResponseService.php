<?php

namespace App\Services\Response;


class ResponseService {
    private static function ResponseParams($status, $erros, $data){
        return [
            'status'=>$status,
            'errors'=>(object)$erros,
            'data'=>(object)$data,
        ];
    }

    public static function sendJsonResponse($status, $code = 200, $errors=[], $data=[]){
        return response()->json(self::ResponseParams($status, $errors, $data), $code);
    }
}