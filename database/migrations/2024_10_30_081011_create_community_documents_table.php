<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunityDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('community_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mentor_id')->nullable()->constrained('mentor_info')->onDelete('cascade');
            $table->foreignId('mentee_id')->nullable()->constrained('mentee_info')->onDelete('cascade');
            $table->string('title', 255);
            $table->text('content');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
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
        Schema::dropIfExists('community_documents');
    }
};
