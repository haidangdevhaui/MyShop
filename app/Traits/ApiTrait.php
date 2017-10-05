<?php
namespace App\Traits;

use App\Exceptions\ApiException;

trait ApiTrait
{

    /**
     * load model instance
     * @param  string $className
     * @return mixed
     */
    public function loadModel($className)
    {
        return $this->instance($className, 'App\Models\\');
    }

    /**
     * load repository instance
     * @param  string $className
     * @return mixed
     */
    public function loadRepo($className)
    {
        return $this->instance($className, 'App\Repositories\\');
    }

    /**
     * load helper instance
     * @param  string $className
     * @return mixed
     */
    public function loadHelper($className)
    {
        return $this->instance($className, 'App\Helpers\\');
    }

    /**
     * get instance of class
     * @param  string $className
     * @param  string $alias
     * @return mixed
     */
    private function instance($className, $alias)
    {
        $class            = $alias . $className;
        if (!class_exists($class)) {
            throw new ApiException("Class {$class} not exist" , 1);
        }
        $this->$className = new $class;
    }
}
