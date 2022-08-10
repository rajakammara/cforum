<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfileToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('can_forward_issue')->default(false);
            $table->boolean('can_close_issue')->default(false);
            $table->boolean('is_deptuser')->default(false);
            $table->foreignId("dept_id")->nullable()->constrained("departments");
            //$table->foreignId("division_id")->nullable()->constrained("divisions");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
