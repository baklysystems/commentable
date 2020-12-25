<?php

/*
 * This file is part of Laravel Commentable.
 *
 * (c) Brian Faust <hello@basecode.sh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
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
    'user' => \App\Domains\User\Entities\User::class
];
