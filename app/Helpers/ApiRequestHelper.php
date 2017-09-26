<?php
namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Validator;

class ApiRequestHelper
{
    protected $prefix;
    protected $path;
    protected $routeName;
    protected $params;
    protected $isLog;
    protected $rule;

    public function __construct(Request $request)
    {
        $this->prefix    = 'api';
        $this->path      = $request->route()->getPrefix();
        $this->routeName = $this->getRouteName($request);
        $this->rule      = $this->getValidationRules();
        $this->params    = $request->input();
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
        $validator = Validator::make($this->params, $this->rule);
        if ($validator->fails() || $this->isRedundancedParam()) {
            $this->isLog ? Log::error($validator->errors()) : '';
            return false;
        }
        return true;
    }

    /**
     * check redundanced param
     * @return bool
     */
    protected function isRedundancedParam()
    {
        return (Bool) count(
            array_diff(
                array_keys($this->params), $this->getParamsAccepted()
            )
        );
    }

    /**
     * get validation rule by route name
     * @return array
     */
    protected function getValidationRules()
    {
        if ($rule = config('rule.' . $this->routeName)) {
            return array_filter($rule, function ($item) {
                return $item != 'optional';
            });
        }
        return [];
    }

    /**
     * get list params accepted
     * @return array
     */
    protected function getParamsAccepted()
    {
        if ($params = config('rule.' . $this->routeName)) {
            return array_keys($params);
        }
        return [];
    }

    /**
     * get route name
     * @return string
     */
    protected function getRouteName(Request $request) 
    {
        $route = $request->route()->getAction('as');
        if (is_string($route)) {
            return $route;
        }
    }

}
