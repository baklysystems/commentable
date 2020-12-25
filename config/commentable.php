<?php

/**
 * This file is part of Laravel Commentable.
 */
return [

    /*
    |--------------------------------------------------------------------------
    | Custom model
    |--------------------------------------------------------------------------
    |
    | This option allows for the extension of the commentable model, by pointing it to a model
    |
    */
    'model' => \AmrNRD\Commentable\Models\Comment::class,
    'user' => \App\Domains\User\Entities\User::class,


    /*
    |--------------------------------------------------------------------------
    | Allow UUID
    |--------------------------------------------------------------------------
    |
    | This option change the id to UUID
    |
    */
    'allow_uuid' => false,
];
