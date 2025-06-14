<?php

use App\Enums\PaymentStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('course_id')->constrained()->cascadeOnDelete();
            $table->foreignId('bank_id')->constrained()->cascadeOnDelete();
            $table->decimal('amount', 10, 2);
            $table->string('account_number');
            $table->enum('status', [PaymentStatus::PENDING->value, PaymentStatus::COMPLETED->value, PaymentStatus::FAILED->value])->default(PaymentStatus::PENDING->value);
            $table->string('payment_proof');
            $table->timestamps();

            $table->unique(['user_id', 'course_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::table('payments', function (Blueprint $table) {
            $table->dropForeign(['course_id']);
        });

        Schema::table('payments', function (Blueprint $table) {
            $table->dropForeign(['bank_id']);
        });

        Schema::dropIfExists('payments');
    }
};
