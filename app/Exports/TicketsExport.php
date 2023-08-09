<?php

namespace App\Exports;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\StreamedResponse;

class TicketsExport implements Responsable
{
    protected $tickets;

    public function __construct(Collection $tickets)
    {
        $this->tickets = $tickets;
    }

    public function toResponse($request)
    {
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=tickets.csv',
        ];

        $output = fopen('php://output', 'w');
        fputcsv($output, ['Type d\'intervention', 'Statut', 'Date demandée', 'Code client']);

        foreach ($this->tickets as $ticket) {
            fputcsv($output, [
                $ticket->type_intervention,
                $ticket->statut,
                $ticket->date_demande,
                $ticket->code_client,
            ]);
        }

        fclose($output);

        return new StreamedResponse(function () use ($output) {
            fclose($output);
        }, 200, $headers);
    }
}
