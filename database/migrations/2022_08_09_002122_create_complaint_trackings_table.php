<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintTrackingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaint_trackings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('complaint_id')->constrained('complaints');
            $table->foreignId('dept_user_id')->nullable()->constrained('users');
            $table->foreignId('dept_id')->constrained('departments');
            $table->foreignId('division_id')->nullable()->constrained('divisions');
            $table->string('dept_remarks')->nullable();
            $table->enum('complaint_status',  ['Pending', 'Forwarded', 'Resolved', 'Closed']);
            $table->string('custom_complaint_id')->nullable();
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
        Schema::dropIfExists('complaint_trackings');
    }
}
