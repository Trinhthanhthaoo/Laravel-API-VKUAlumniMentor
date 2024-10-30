<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMentorMenteeListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mentor_mentee_list', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mentee_id')->constrained('mentee_info')->onDelete('cascade');
            $table->foreignId('mentor_id')->constrained('mentor_info')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mentor_mentee_list');
    }
};
