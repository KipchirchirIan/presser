<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_posts', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('The Primary Key for the table');
            $table->string('post_title', 100)->comment('The title of the post');
            $table->text('post_content')->comment('The content of the post');
            $table->string('post_status', 50)->comment('The status of the post, i.e. published, draft,scheduled');
            $table->unsignedBigInteger('post_author')->index('post_author')->comment('The author of the post');
            $table->timestamps();

            $table->foreign('post_author')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_posts');
    }
}
