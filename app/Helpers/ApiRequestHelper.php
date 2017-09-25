<?php
namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Valivator;

class ApiRequestHelper
{
    protected $prefix;
    protected $path;
    protected $routeName;
    protected $params;
    protected $isLog;

    public function __construct(Request $request)
    {
        $this->prefix    = 'api';
        $this->path      = $request->route()->getPrefix();
        $this->routeName = $request->route()->getAction('as');
        $this->params    = $request->only($this->getListParams());
        $this->isLog     = true;
    }

    /**
     * check api prefix
     * @return boolean
     */
    public function isApiPrefix()
    {
        $arrayPath = explode('/', $this->path);
        if (!count($arrayPath)) {
            return false;
        }
        return $this->prefix == $arrayPath[0];
    }

    /**
     * validate api param
     * @return array||Valivator
     */
    public function validate()
    {
        $result = (object) [
            'error'       => false
        ];
        $validator = Validator::make($this->params, $this->getValidationRules());
        if ($validator->fails()) {
            $this->isLog ? Log::error($validator->errors()) : '';
            $result->error = true;
        }
        return $result;
    }

    /**
     * get list params
     * @return array
     */
    protected function getListParams()
    {
        return array_keys($this->getValidationRules());
    }

    /**
     * get validation rule by route name
     * @return array
     */
    protected function getValidationRules()
    {
        return array_filter(config('rule.' . $this->routeName), function($item) {
            return $item != 'optional';
        });
    }

    /**
     * get protected method
     * @param  $key
     * @return string
     */
    public function __get($key)
    {
        return $this->$key;
    }
}
