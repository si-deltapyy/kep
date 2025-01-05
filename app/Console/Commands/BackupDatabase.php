<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class BackupDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Backup the database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dbHost = env('DB_HOST');
        $dbName = env('DB_DATABASE');
        $dbUser = env('DB_USERNAME');
        $dbPass = env('DB_PASSWORD');

        $backupPath = base_path('../folder/backup');
        $fileName = "backup_" . date('Ymd_His') . ".sql";
        $filePath = $backupPath . '/' . $fileName;

        // Ensure the backup directory exists
        if (!is_dir($backupPath)) {
            mkdir($backupPath, 0755, true);
        }

        // Use full path to mysqldump
        $mysqldumpPath = 'C:/xampp/mysql/bin/mysqldump.exe';
        $command = "$mysqldumpPath -h $dbHost -u $dbUser -p$dbPass $dbName > \"$filePath\"";

        $output = [];
        $returnVar = null;

        exec($command, $output, $returnVar);

        if ($returnVar !== 0) {
            $this->error('Failed to backup the database. Command output: ' . implode("\n", $output));
            return Command::FAILURE;
        }

        $this->info('Database backup completed: ' . $fileName);
        return Command::SUCCESS;
}

}
