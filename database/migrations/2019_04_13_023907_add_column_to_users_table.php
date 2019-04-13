<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('staff_name')->nullable();
            $table->date('staff_birth')->nullable();
            $table->integer('staff_age')->nullable();
            $table->integer('staff_height')->nullable();
            $table->integer('staff_weight')->nullable();
            $table->boolean('staff_role_reception')->nullable();
            $table->boolean('staff_role_housekeeping')->nullable();
            $table->boolean('staff_role_food_and_beverage')->nullable();
            $table->string('staff_pos')->nullable();
            $table->text('staff_address')->nullable();
            $table->text('staff_address2')->nullable();
            $table->text('staff_address3')->nullable();
            $table->text('staff_province')->nullable();
            $table->string('staff_phone')->nullable();
            $table->string('staff_status')->nullable();
            $table->string('staff_previous_job')->nullable();
            $table->string('staff_pic')->nullable();
            $table->string('staff_citizen')->nullable();
            $table->string('staff_note')->nullable();
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
            $table->dropColumn([
                'staff_name',
                'staff_birth',
                'staff_age',
                'staff_height',
                'staff_weight',
                'staff_role_reception',
                'staff_role_housekeeping',
                'staff_role_food_and_beverage',
                'staff_role_food_and_beverage',
                'staff_address',
                'staff_address2',
                'staff_address3',
                'staff_province',
                'staff_phone',
                'staff_status',
                'staff_previous_job',
                'staff_pic',
                'staff_citizen',
                'staff_citizen',
                'staff_note',
            ]);
        });
    }
}
