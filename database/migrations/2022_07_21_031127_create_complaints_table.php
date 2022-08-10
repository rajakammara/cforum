<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained("users");
            $table->foreignId("dept_id")->constrained("departments");
            $table->foreignId("issue_id")->constrained("issues");
            $table->string("user_remarks");
            $table->string("photo");
            $table->enum('complaint_status',  ['Pending', 'Forwarded', 'Resolved', 'Closed'])->default('Pending');
            $table->string('actiontaken_remarks')->nullable();
            $table->string('actiontaken_report')->nullable();
            $table->foreignId("dept_user_id")->nullable()->constrained("users");
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string("user_feedback")->nullable();
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
        Schema::dropIfExists('complaints');
    }
}
