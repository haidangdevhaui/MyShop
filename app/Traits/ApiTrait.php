<?php
namespace App\Traits;

trait ApiTrait
{

    /**
     * dependency injection class
     * @param  string $className class name
     * @return void
     */
    public function __call($name, $arguments)
    {
        if (!count($arguments)) {
            return false;
        }
        switch ($name) {
            case 'loadModel':
                $alias = '\App\Models\\';
                break;

            case 'loadRepo':
                $alias = '\App\Repositories\\';
                break;

            case 'loadHelper':
                $alias = '\App\Helpers\\';
                break;

            default:
                return false;
                break;
        }
        $className        = $arguments[0];
        $class            = $alias . $className;
        $this->$className = new $class;
    }
}
