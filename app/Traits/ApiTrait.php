<?php
namespace App\Traits;

use App\Exceptions\ApiException;
use App\Repositories\RepositoryException;

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
    public function loadRepository()
    {
        $args = func_get_args();
        foreach ($args as $arg) {
            if (is_array($arg)) {
                foreach ($arg as $item) {
                    return $this->instanceRepo($item, 'App\Repositories\\');
                }
            } else {
                return $this->instanceRepo($arg, 'App\Repositories\\');
            }
        }
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
     * instance of class
     * @param  string $className
     * @param  string $alias
     * @return mixed
     */
    private function instance($className, $alias, $ext = '')
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
    private function instanceRepo($className, $alias)
    {
        $class            = $alias . $className . 'Repository';
        if (!class_exists($class)) {
            throw new RepositoryException("Repository $class not exist" , 1);
        }
        $modelClass = "\App\Models\\{$className}";
        $this->$className = new $class(new $modelClass);
    }
}
