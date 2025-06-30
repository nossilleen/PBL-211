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
            $table->string('url')->nullable();
            $table->timestamp('read_at')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('user')->onDelete('cascade');
            $table->index('user_id');
            $table->index('url');
        });

        // ---------------- Trigger definitions ----------------
        // Drop existing triggers (if any) to avoid duplicate errors
        DB::unprepared('DROP TRIGGER IF EXISTS trg_after_transaksi_update');
        DB::unprepared('DROP TRIGGER IF EXISTS trg_after_artikel_insert');
        DB::unprepared('DROP TRIGGER IF EXISTS trg_after_event_insert');
        DB::unprepared('DROP TRIGGER IF EXISTS trg_after_artikel_delete');
        DB::unprepared('DROP TRIGGER IF EXISTS trg_after_event_delete');

        // Trigger transaksi update
        DB::unprepared(<<<SQL
        CREATE TRIGGER trg_after_transaksi_update AFTER UPDATE ON transaksi
        FOR EACH ROW
        BEGIN
            IF NEW.status <> OLD.status THEN
                INSERT INTO notifications (user_id, type, title, message, url, created_at, updated_at)
                VALUES (
                    NEW.user_id,
                    'transaksi',
                    CONCAT('Status Pesanan #', NEW.transaksi_id, ' diperbarui'),
                    CONCAT('Pesanan Anda sekarang ', NEW.status),
                    '/profile#pesanan',
                    NOW(),
                    NOW()
                );
            END IF;
        END;
        SQL);

        // Trigger artikel insert
        DB::unprepared(<<<SQL
        CREATE TRIGGER trg_after_artikel_insert AFTER INSERT ON artikel
        FOR EACH ROW
        BEGIN
            INSERT INTO notifications (user_id, type, title, message, url, created_at, updated_at)
            SELECT u.user_id,
                   'artikel',
                   CONCAT('Artikel Baru: ', NEW.judul),
                   CONCAT('Baca artikel "', NEW.judul, '" sekarang.'),
                   CONCAT('/artikel/', NEW.artikel_id),
                   NOW(),
                   NOW()
            FROM user u
            WHERE u.role = 'nasabah';
        END;
        SQL);

        // Trigger event insert
        DB::unprepared(<<<SQL
        CREATE TRIGGER trg_after_event_insert AFTER INSERT ON events
        FOR EACH ROW
        BEGIN
            INSERT INTO notifications (user_id, type, title, message, url, created_at, updated_at)
            SELECT u.user_id,
                   'event',
                   CONCAT('Event Baru: ', NEW.title),
                   CONCAT('Ikuti event "', NEW.title, '" pada ', DATE_FORMAT(NEW.date, '%d %M %Y')),
                   CONCAT('/events/', NEW.id),
                   NOW(),
                   NOW()
            FROM user u
            WHERE u.role = 'nasabah';
        END;
        SQL);

        // Trigger artikel delete -> bersihkan notifikasi terkait
        DB::unprepared(<<<SQL
        CREATE TRIGGER trg_after_artikel_delete AFTER DELETE ON artikel
        FOR EACH ROW
        BEGIN
            DELETE FROM notifications
            WHERE type = 'artikel'
              AND url = CONCAT('/artikel/', OLD.artikel_id);
        END;
        SQL);

        // Trigger event delete -> bersihkan notifikasi terkait
        DB::unprepared(<<<SQL
        CREATE TRIGGER trg_after_event_delete AFTER DELETE ON events
        FOR EACH ROW
        BEGIN
            DELETE FROM notifications
            WHERE type = 'event'
              AND url = CONCAT('/events/', OLD.id);
        END;
        SQL);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS trg_after_transaksi_update');
        DB::unprepared('DROP TRIGGER IF EXISTS trg_after_artikel_insert');
        DB::unprepared('DROP TRIGGER IF EXISTS trg_after_event_insert');
        DB::unprepared('DROP TRIGGER IF EXISTS trg_after_artikel_delete');
        DB::unprepared('DROP TRIGGER IF EXISTS trg_after_event_delete');

        Schema::dropIfExists('notifications');
    }
}; 