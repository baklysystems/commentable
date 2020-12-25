<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Kalnoy\Nestedset\NestedSet;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            if(config('commentable.allow_uuid')){
                $table->uuid('id')->primary();
                $table->uuidMorphs('commentable');
                $table->uuid('user_id');
                
                // $table->nestedSet()
                $table->uuid('parent_id')->nullable();
            }else{
                $table->id('id');
                $table->morphs('commentable');
                $table->unsignedBigInteger('user_id');

                // $table->nestedSet();
                $table->unsignedBigInteger('parent_id')->nullable();
            }

            $table->unsignedInteger('_lft')->default(0);
            $table->unsignedInteger('_rgt')->default(0);

            $table->text('body');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
