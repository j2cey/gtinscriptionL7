<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddParticipantStatutVideoForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 'statut_video_id' => Status::default()->first()->id,
        //  'statut_video_name' => Status::default()->first()->name
        Schema::table('participants', function (Blueprint $table) {
            $table->unsignedBigInteger('statut_video_id')->nullable()->comment('reference du statut de video');
            $table->foreign('statut_video_id')->references('id')->on('statut_videos')->onDelete('set null');

            $table->string('statut_video_name')->nullable()->comment('nom de du statut de video');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('participants', function (Blueprint $table) {
            $table->dropForeign(['statut_video_id']);
        });
    }
}
