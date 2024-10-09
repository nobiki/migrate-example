<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Tenant;
use App\Models\User;

class Tenancy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:tenancy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function __construct(Tenant $tenant, User $user)
    {
        parent::__construct();

        $this->tenant = $tenant;
        $this->user = $user;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tenant1 = $this->tenant->create(['id' => 'foo']);
        $tenant1->domains()->create(['domain' => 'foo.localhost']);

        $tenant2 = $this->tenant->create(['id' => 'bar']);
        $tenant2->domains()->create(['domain' => 'bar.localhost']);

        $this->tenant->all()->runForEach(function () {
            $this->user->factory()->create();
        });
    }
}

