<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Operations extends Migration
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
                  ->onDelete("null");
            $table->foreignId("recipient_id")
                  ->nullable(false)
                  ->constrained("users", "id")
                  ->onUpdate("cascade")
                  ->onDelete("null");
            $table->float("op_sum")
                  ->nullable(false);    
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
