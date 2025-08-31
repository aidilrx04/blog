<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class DatabaseChangesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:changes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auto generate database schema from last changes';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $lastcommit = file_get_contents(base_path('utils/js/lastcommit.txt'));

        $changed = trim(shell_exec("git diff --name-only {$lastcommit} HEAD"));

        $files = array_filter(explode("\n", $changed));

        $migrations = [];

        foreach ($files as $file) {
            if (str_starts_with($file, 'database/migrations/')) {
                $migrations[] = $file;
            }
        }

        if (empty($migrations)) {
            $this->info("No changed migrations found.");
            return;
        }

        $dumps = [];

        foreach ($migrations as $migration) {
            Artisan::call('migrate', [
                '--path'     => $migration,
                '--pretend'  => true,
                '--force'    => true,
            ]);

            $output = Artisan::output();

            // split to lines
            $output = explode(PHP_EOL, $output);

            // ignore first 3 lines
            $output = array_slice($output, 3);

            // remove last 2 lines
            $output = array_slice($output, 0, -2);

            $queries = array_slice($output, 1);

            // add sql comment
            $output = array_map(fn($line) => "-- $line", $output);

            // clean queries (strip "-- ") and add semicolon
            $queries = array_map(fn($query) => substr($query, 6) . ';', $queries);

            $dumps = [
                ...$dumps,
                ...$output,
                ...$queries
            ];
        }

        // ensure database/changes directory exists
        $changesDir = base_path('database/changes');
        if (! is_dir($changesDir)) {
            mkdir($changesDir, 0755, true);
        }

        // name dump file by timestamp
        $filename = $changesDir . '/changes_' . date('Ymd_His') . '.sql';

        file_put_contents($filename, implode(PHP_EOL, $dumps));

        $this->info("✅ SQL dump created at: {$filename}");
    }
}
