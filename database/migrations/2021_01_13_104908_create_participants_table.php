<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Traits\Migrations\BaseMigrationTrait;

class CreateParticipantsTable extends Migration
{
    use BaseMigrationTrait;

    public $table_name = 'participants';
    public $table_comment = 'liste des participants.';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id();
            $table->baseFields();

            $table->string('nom')->nullable()->comment('nom du participant');
            $table->string('nomgroupe')->nullable()->comment('nom de groupe du participant');
            $table->string('email')->nullable()->comment('adresse email du participant');
            $table->string('phone')->nullable()->comment('numero de phone du participant');
            $table->string('fichierpieceidentite')->nullable()->comment('piece identite du participant');
            $table->string('fichiervideo')->nullable()->comment('video du participant');
            $table->string('complementinfos')->nullable()->comment('complement infos du participant');
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
        Schema::table($this->table_name, function (Blueprint $table) {
            $table->dropBaseForeigns();
        });
        Schema::dropIfExists($this->table_name);
    }
}
