<?php

namespace App\Providers;

use App\Models\HutangBarang;
use App\Models\HutangUang;
use App\Models\PemesanBus;
use App\Models\Project;
use App\Models\SuratPerintahJalan;
use App\Models\Transaksi;
use App\Models\TransaksiProject;
use App\Models\TransaksiTravel;
use App\Observers\HutangBarangObserver;
use App\Observers\HutangUangObserver;
use App\Observers\PemesanBusObserver;
use App\Observers\ProjectObserver;
use App\Observers\SuratPerintahJalanObserver;
use App\Observers\TransaksiObserver;
use App\Observers\TransaksiProjectObserver;
use App\Observers\TransaksiTravelObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        SuratPerintahJalan::observe(SuratPerintahJalanObserver::class);
        PemesanBus::observe(PemesanBusObserver::class);
        Transaksi::observe(TransaksiObserver::class);
        TransaksiTravel::observe(TransaksiTravelObserver::class);
        Project::observe(ProjectObserver::class);
        TransaksiProject::observe(TransaksiProjectObserver::class);
        HutangUang::observe(HutangUangObserver::class);
        HutangBarang::observe(HutangBarangObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
