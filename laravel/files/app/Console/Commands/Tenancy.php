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
    protected $signature = 'app:tenancy {arg1} {arg2?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Tenant Operations [create-tenant, delete-tenant] [TENANT_ID]";

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
        # Argument Validation
        if(preg_match("/^(create-tenant|delete-tenant)$/", $this->argument("arg1"))) {
            $action        = $this->argument("arg1");
        } else {
            $this->info("Invalid argument");
            return false;
        }

        if(preg_match("/^[a-zA-Z0-9]+$/", $this->argument("arg2"))) {
            $tenant_id     = $this->argument("arg2");
            $tenant_domain = $this->argument("arg2").".localhost";
        } else {
            $this->info("Invalid argument");
            return false;
        }

        # Tenant Operation
        switch($action) {
            case 'create-tenant':
                $tenant = $this->tenant->create(['id' => $tenant_id]);
                $tenant->domains()->create(['domain' => $tenant_domain]);
                $this->info("テナント「{$tenant_id}」を登録し、データベース「tenant{$tenant_id}」を作成しました");
                break;
            case 'delete-tenant':
                $tenant = $this->tenant->find($tenant_id);
                $tenant->delete();
                $this->info("テナント「{$tenant_id}」の登録を削除し、データベース「tenant{$tenant_id}」を削除しました");
                break;
            default:
                $this->info("Invalid action");
                return false;
        }
    }
}

