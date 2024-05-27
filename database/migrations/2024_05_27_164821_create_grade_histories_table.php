<?php

// database/migrations/xxxx_xx_xx_create_grade_histories_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewGradeHistoriesTable extends Migration
{
    public function up()
    {
        Schema::create('grade_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('grade_id')->constrained()->onDelete('cascade');
            $table->integer('old_grade');
            $table->integer('new_grade');
            $table->foreignId('modified_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('grade_histories');
    }
}

