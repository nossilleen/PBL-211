<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Buat tabel notifications
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->enum('type', ['transaksi', 'artikel', 'event']);
            $table->string('title');
            $table->text('message');
            $table->timestamp('read_at')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('user')->onDelete('cascade');
            $table->index('user_id');
        });

        // Trigger: setelah update status transaksi
        DB::unprepared(<<<SQL
        DROP TRIGGER IF EXISTS trg_after_transaksi_update;
        CREATE TRIGGER trg_after_transaksi_update AFTER UPDATE ON transaksi
        FOR EACH ROW
        BEGIN
            IF NEW.status <> OLD.status THEN
                INSERT INTO notifications (user_id, type, title, message, created_at, updated_at)
                VALUES (
                    NEW.user_id,
                    'transaksi',
                    CONCAT('Status Pesanan #', NEW.transaksi_id, ' diperbarui'),
                    CONCAT('Pesanan Anda sekarang ', NEW.status),
                    NOW(),
                    NOW()
                );
            END IF;
        END;
        SQL);

        // Trigger: setelah artikel baru dibuat
        DB::unprepared(<<<SQL
        DROP TRIGGER IF EXISTS trg_after_artikel_insert;
        CREATE TRIGGER trg_after_artikel_insert AFTER INSERT ON artikel
        FOR EACH ROW
        BEGIN
            INSERT INTO notifications (user_id, type, title, message, created_at, updated_at)
            SELECT u.user_id,
                   'artikel',
                   CONCAT('Artikel Baru: ', NEW.judul),
                   CONCAT('Baca artikel \"', NEW.judul, '\" sekarang.'),
                   NOW(),
                   NOW()
            FROM user u
            WHERE u.role = 'nasabah';
        END;
        SQL);

        // Trigger: setelah event baru dibuat
        DB::unprepared(<<<SQL
        DROP TRIGGER IF EXISTS trg_after_event_insert;
        CREATE TRIGGER trg_after_event_insert AFTER INSERT ON events
        FOR EACH ROW
        BEGIN
            INSERT INTO notifications (user_id, type, title, message, created_at, updated_at)
            SELECT u.user_id,
                   'event',
                   CONCAT('Event Baru: ', NEW.title),
                   CONCAT('Ikuti event \"', NEW.title, '\" pada ', DATE_FORMAT(NEW.date, '%d %M %Y')), 
                   NOW(),
                   NOW()
            FROM user u
            WHERE u.role = 'nasabah';
        END;
        SQL);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS trg_after_transaksi_update;');
        DB::unprepared('DROP TRIGGER IF EXISTS trg_after_artikel_insert;');
        DB::unprepared('DROP TRIGGER IF EXISTS trg_after_event_insert;');

        Schema::dropIfExists('notifications');
    }
}; 