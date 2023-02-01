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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('pin');
            $table->string('job');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::insert("INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `pin`, `job`, `remember_token`, `created_at`, `updated_at`) VALUES
                    (NULL, 'admin admin', 'admin@example.org', NULL, '0001', 'admin', NULL, NULL, NULL),
                    (NULL, 'user user', 'user@example.org', NULL, '0002', 'user', NULL, NULL, NULL)");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
