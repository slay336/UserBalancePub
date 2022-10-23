<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operations', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")
                  ->nullable(false)      
                  ->constrained("users", "id")
                  ->onUpdate("cascade")
                  ->onDelete("set null");
            $table->foreignId("recipient_id")
                  ->nullable(false)
                  ->constrained("users", "id")
                  ->onUpdate("cascade")
                  ->onDelete("set null");
            $table->float("op_sum")
                  ->nullable(false);
            $table->text("description")
                  ->nullable(true);
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
        Schema::dropIfExists('operations');
    }
}
