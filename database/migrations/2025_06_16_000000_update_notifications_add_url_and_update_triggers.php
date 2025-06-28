<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Tambah kolom url
        Schema::table('notifications', function (Blueprint $table) {
            $table->string('url')->nullable()->after('message');
            $table->index('url');
        });

        // ----- Perbarui trigger -----
        DB::unprepared('DROP TRIGGER IF EXISTS trg_after_transaksi_update');
        DB::unprepared('DROP TRIGGER IF EXISTS trg_after_artikel_insert');
        DB::unprepared('DROP TRIGGER IF EXISTS trg_after_event_insert');
        DB::unprepared('DROP TRIGGER IF EXISTS trg_after_artikel_delete');
        DB::unprepared('DROP TRIGGER IF EXISTS trg_after_event_delete');

        // Trigger transaksi
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

        // Trigger artikel
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

        // Trigger event
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

        // Trigger hapus artikel -> bersihkan notifikasi
        DB::unprepared(<<<SQL
        CREATE TRIGGER trg_after_artikel_delete AFTER DELETE ON artikel
        FOR EACH ROW
        BEGIN
            DELETE FROM notifications
            WHERE type = 'artikel'
              AND url = CONCAT('/artikel/', OLD.artikel_id);
        END;
        SQL);

        // Trigger hapus event -> bersihkan notifikasi
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

    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS trg_after_transaksi_update');
        DB::unprepared('DROP TRIGGER IF EXISTS trg_after_artikel_insert');
        DB::unprepared('DROP TRIGGER IF EXISTS trg_after_event_insert');
        DB::unprepared('DROP TRIGGER IF EXISTS trg_after_artikel_delete');
        DB::unprepared('DROP TRIGGER IF EXISTS trg_after_event_delete');

        Schema::table('notifications', function (Blueprint $table) {
            $table->dropColumn('url');
        });
    }
}; 