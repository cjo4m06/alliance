<?php

namespace App\Packages\Repository;

use Illuminate\Database\Eloquent\Model;

abstract class Repository
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * 新增一筆資料，可包含預設值
     *
     * @param array $attributes
     * @param array $default
     *
     * @return mixed
     */
    public function createWithDefault(array $attributes, array $default = [])
    {
        $instance = $this->model->newInstance();

        $instance->forceFill($default)
            ->fill($attributes)
            ->save();

        return $instance;
    }

    /**
     * 建立查詢器
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function builder()
    {
        return $this->model->query();
    }

    public function __call($method, $parameters)
    {
        return call_user_func_array([$this->model, $method], $parameters);
    }
}
