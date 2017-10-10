<?php
namespace App\Traits;

use App\Exceptions\ApiException;
use App\Repositories\RepositoryException;

trait ApiTrait
{

    /**
     * load model instance
     * @param  string|array $className
     * @return mixed
     */
    final public function loadModel()
    {
        return $this->map('App\Models\\', func_get_args(), 'instanceClass');
    }

    /**
     * load repository instance
     * @param  string|array $className
     * @return mixed
     */
    final public function loadRepository()
    {
        return $this->map('App\Repositories\\', func_get_args(), 'instanceRepo');
    }

    /**
     * load helper instance
     * @param  string $className
     * @return mixed
     */
    final public function loadHelper($className)
    {
        return $this->map('App\Helpers\\', func_get_args(), 'instanceClass');
    }

    /**
     * mapping param to instance
     * @param  string $alias
     * @param  array $param
     * @param  string $callback
     * @return mixed
     */
    final private function map($alias, $param, $callback)
    {
        foreach ($param as $arg) {
            if (is_array($arg)) {
                foreach ($arg as $item) {
                    $this->$callback($item, $alias);
                }
            } else {
                $this->$callback($arg, $alias);
            }
        }
    }

    /**
     * instance of class
     * @param  string $className
     * @param  string $alias
     * @return mixed
     */
    final private function instanceClass($className, $alias, $ext = '')
    {
        $class            = $alias . $className . $ext;
        if (!class_exists($class)) {
            throw new ApiException("Class $class not exist" , 1);
        }
        $this->$className = new $class;
    }

    /**
     * instance of class
     * @param  string $className
     * @param  string $alias
     * @return mixed
     */
    final private function instanceRepo($className, $alias)
    {
        $class            = $alias . $className . 'Repository';
        if (!class_exists($class)) {
            throw new RepositoryException("Repository $class not exist" , 1);
        }
        $modelClass = "\App\Models\\{$className}";
        $this->$className = new $class(new $modelClass);
    }
}
