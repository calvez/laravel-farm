<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // Name
        // Status
        // Flags
        // Geometry
        // Intrinsic geometry
        // Is location
        // Is fixed
        // Notes
        // ID Tags
        // Data

        Schema::create(
            'assets',
            function (Blueprint $table) {
                $table->uuid('id')->primary();
                $table->string('name', 256)->nullable()->default('name');
                $table->enum(
                    'status',
                    [
                        'active', 'archived'
                    ]
                )->nullable();
                $table->uuid('type_id');
                $table->timestamps();

                $table->foreign('type_id')
                    ->references('id')->on('asset_types')
                    ->onDelete('cascade');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assets');
    }
};
