<?php
namespace App\Helpers;

class ResponseCode
{

    const CODE_SUCCESS               = 1;
    const CODE_SERVER_INTERNAL_ERROR = 'E001';
    const CODE_PARAMETER_INVALID     = 'E002';
    const CODE_PARAMETER_CORRECT     = 'E003';

    const CODE_AUTH_ERROR                     = 'E004';
    const CODE_AUTH_EMAIL_OR_PASSWORD_INVAILD = 'E005';

}
