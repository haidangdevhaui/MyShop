<?php
namespace App\Helpers;

class ResponseCode
{

    const CODE_SUCCESS               = 1;
    const CODE_SERVER_INTERNAL_ERROR = 'E001';
    const CODE_PARAMETER_INVALID     = 'E002';
    const CODE_PARAMETER_CORRECT     = 'E003';

    const CODE_TOKEN_EXPIRED                  = 'E004';
    const CODE_TOKEN_INVALID                  = 'E005';
    const CODE_TOKEN_ABSENT                   = 'E006';
    const CODE_AUTH_EMAIL_OR_PASSWORD_INVAILD = 'E007';
    const CODE_USER_NOT_FOUND                 = 'E008';

}
