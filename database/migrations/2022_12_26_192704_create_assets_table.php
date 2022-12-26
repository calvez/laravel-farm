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
                $table->id();
                $table->string('name', 256)->nullable()->default('name');
                $table->enum(
                    'status',
                    [
                        'active', 'archived',
                    ]
                )->nullable();
                $table->unsignedBigInteger('type_id');
                $table->json('geometry')->nullable();
                $table->json('intrinsic_geometry')->nullable();
                $table->boolean('is_location')->nullable()->default(false);
                $table->unsignedBigInteger('flag_id');
                $table->boolean('is_fixed')->nullable()->default(false);
                $table->text('notes')->nullable();
                $table->json('id_tags')->nullable();
                $table->json('data')->nullable();
                $table->timestamps();
                $table->softDeletes();

                $table->foreign('type_id')
                    ->references('id')->on('asset_types')
                    ->onDelete('cascade');

                $table->foreign('flag_id')
                    ->references('id')->on('flags')
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
