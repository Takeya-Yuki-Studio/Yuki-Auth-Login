<?php

/**
 * Class ErrorCode
 */
class ErrorCode{
    const OK=200;
    const ApiNotFound=404;
    const AuthRequired=401;
    const BadRequest=400;
    const Accepted=202;
}

function ConvertErrCodeToMsg($err){
    switch($err){
        case ErrorCode::OK: return "OK";
        case ErrorCode::ApiNotFound: return "API Not Found";
        case ErrorCode::AuthRequired: return "Auth Required";
        case ErrorCode::BadRequest: return "Bad Request";
        case ErrorCode::Accepted: return "Request Accepted";
    }
}


