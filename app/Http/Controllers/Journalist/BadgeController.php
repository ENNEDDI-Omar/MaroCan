<?php

namespace App\Http\Controllers\Journalist;

use App\Http\Controllers\Controller;
use App\Models\AccreditationBadge;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class BadgeController extends Controller
{
    /**
     * Generate a PDF badge for the given accreditation.
     */
    public function generateBadge(AccreditationBadge $badge)
    {
        $pdf = Pdf::loadView('journalist.accreditation_badge');
        $filename = 'badge' . $badge->id . '.pdf';
        $path = storage_path('app/public/badges/' . $filename);
        $pdf->save($path);

        return $pdf->download($filename);
    }

    /**
     * Display the specified badge PDF.
     */
    public function show(AccreditationBadge $badge)
    {
        $filePath = storage_path('app/public/badges/' . $badge->id . '.pdf');
        return response()->file($filePath);
    }
    
    // Implement other methods as needed...
}


