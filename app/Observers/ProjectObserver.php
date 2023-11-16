<?php

namespace App\Observers;

use App\Models\Project;
use App\Services\TransaksiProject\TransaksiProjectService;

class ProjectObserver
{
    protected $transaksiProjectService;

    public function __construct(TransaksiProjectService $transaksiProjectService) {
        $this->transaksiProjectService = $transaksiProjectService;
    }

    /**
     * Handle the Project "created" event.
     */
    public function created(Project $project): void
    {
        $data = [
            'projects_id' => $project->id,
            'tanggal_transaksi' => $project->created_at,
            'deskripsi_transaksi' => 'Uang Modal Proyek ' . $project->name,
            'jenis_transaksi_id' => '3',
            'jumlah' => $project->getTotalAttribute(),
        ];

        $this->transaksiProjectService->create($data);
    }

    /**
     * Handle the Project "updated" event.
     */
    public function updated(Project $project): void
    {
        //
    }

    /**
     * Handle the Project "deleted" event.
     */
    public function deleted(Project $project): void
    {
        //
    }

    /**
     * Handle the Project "restored" event.
     */
    public function restored(Project $project): void
    {
        //
    }

    /**
     * Handle the Project "force deleted" event.
     */
    public function forceDeleted(Project $project): void
    {
        //
    }
}
