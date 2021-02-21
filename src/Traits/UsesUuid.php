<?php

namespace AmrNRD\Commentable\Traits;

use Illuminate\Support\Str;

trait UsesUuid
{

    /**
     * Customize the model primary key base on config value
     *
     * @return bool
     */
    public function getIncrementing()
    {
        if(config('cf.allow_uuid')){
            return false;
        }

        return true;
    }

    /**
     * Get Key Type
     *
     * @return string
     */
    public function getKeyType()
    {
        if(config('cf.allow_uuid')){
            return 'string';
        }
        return 'int';
    }

    /**
     * Setup Saving Boot
     *
     * @return void
     */
    protected static function bootUsesUuid()
    {
        static::creating(function ($model) {
            if (!$model->getKey() && config('cf.allow_uuid')) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }
}
