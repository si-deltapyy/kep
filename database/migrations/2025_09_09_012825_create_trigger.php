<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
        CREATE TRIGGER before_document_insert
        AFTER INSERT ON document
        FOR EACH ROW
        BEGIN
            INSERT INTO log_document (note, doc_id, user_id, doc_status, created_at, updated_at)
            VALUES ( null, NEW.id, NEW.user_id, default, NOW(), NOW());
        END;
        ');

        DB::unprepared('
        CREATE TRIGGER after_document_insert
        AFTER UPDATE ON Dummy
        FOR EACH ROW
        BEGIN
            IF OLD.doc_status <> NEW.doc_status THEN
                UPDATE log_document
                SET doc_status = NEW.doc_status, updated_at = NOW()
                WHERE doc_id = NEW.id;
            END IF;
        END;
        ');

        DB::unprepared('
        CREATE TRIGGER after_user_reg
        AFTER INSERT ON user
        FOR EACH ROW
        BEGIN
            INSERT INTO profile_user (user_id, name, phone_number, gender, status, prodi_id, nik, address, created_at, updated_at)
            VALUES (NEW.id, NEW.name, default, default, default, default, default, default, NOW(), null);
        END;
        ');

        // DB::unprepared('
        //     CREATE TRIGGER after_document_update
        //     AFTER UPDATE ON dummy
        //     FOR EACH ROW
        //     BEGIN
        //         IF OLD.doc_status <> NEW.doc_status THEN
        //             UPDATE document
        //             JOIN log_document AS ld ON ld.doc_id = document.id
        //             SET ld.doc_status = "on-review",
        //              ld.updated_at = NOW(),
        //              document.updated_at = NOW()
        //             WHERE document.doc_group = NEW.doc_group;
        //         END IF;
        //     END;
        // ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS before_document_insert');
        DB::unprepared('DROP TRIGGER IF EXISTS after_document_update');
        DB::unprepared('DROP TRIGGER IF EXISTS after_user_reg');
    }
};