<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowingsTable extends Migration
{
    public function up()
    {
        Schema::create('borrowings', function (Blueprint $table) {
            $table->id(); // id int(11) AUTO_INCREMENT PRIMARY KEY
            $table->string('borrow_code', 255);
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('customer_id');
            $table->date('borrow_date');
            $table->date('return_date')->nullable();
            $table->timestamps();

            // Foreign keys (optional, if you want relational constraints)
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');

            $table->index('book_id');
            $table->index('customer_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('borrowings');
    }
}
