<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SegarkanDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'segarkan';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Melakukan Migrate Fresh Dan Database Seeding';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->line('===========================');
        $this->info('Command Sedang Dieksekusi');
        $this->line('===========================');
        $this->call('migrate:fresh');
        $this->line('===========================');
        $this->info('Migrasi Selesai,Sedang Seeding');
        $this->line('===========================');
        $this->call('db:seed');
        $this->line('===========================');
        $this->info('Selesai');
        $this->line('===========================');
    }
}
