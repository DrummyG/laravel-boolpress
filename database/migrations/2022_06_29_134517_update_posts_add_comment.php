<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePostsAddComment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            // $table->unsignedBigInteger('user_id');

            // $table->foreign('user_id')
            //     ->references('id')
            //     ->on('users');
            
            $table->foreignId('post_id')->nullable()->constrained()->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
        $table->dropForeign(['comment_id']);
        $table->dropColumn("comment_id");
    });
    }
}
