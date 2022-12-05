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
        Schema::create('messages', function (Blueprint $table) {
            // génère un id en auto-incrément,unique et non nul
            $table->id();
            // champs created_at et updated_at
            $table->timestamps();
            // contenu du message (+ de 191 caractères, maxi 3000)
            $table->text("contenu", 3000);
            // image et tags associés au message
            $table->string('image');
            $table->string("tags", 50);

            // clé étrangère vers table users : nouvelle syntaxe
            // $table->foreignId('user_id')->constrained();

            // // clé étrangère vers table users : ancienne syntaxe
            // $table->unsignedBigInteger('user_id')->nullable(); // on déclare le champ
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('set null'); // on met en place la contrainte de foreign key

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
};
