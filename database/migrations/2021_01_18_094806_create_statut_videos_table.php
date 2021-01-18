<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Traits\Migrations\BaseMigrationTrait;

class CreateStatutVideosTable extends Migration
{
    use BaseMigrationTrait;

    public $table_name = 'statut_videos';
    public $table_comment = 'Statut d une video uploadée';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');

            $table->string('name')->comment('video status name');
            $table->string('code', 100)->unique()->comment('video status code');

            $table->boolean('is_default')->default(false)->comment('determine whether is the default one.');

            $table->timestamps();
        });
        $this->setTableComment($this->table_name,$this->table_comment);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table_name);
    }
}
