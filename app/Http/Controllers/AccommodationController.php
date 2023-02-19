<?php

namespace App\Http\Controllers;

use App\Models\Accommodation;
use App\Services\AccommodationSearchService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AccommodationController extends Controller
{
    public function index(Request $request, AccommodationSearchService $accommodationService)
    {
        $filters = $request->only($accommodationService->params());
        $accommodations = $accommodationService->search($filters);

        return Inertia::render('Accommodation/Index', [
            'accommodations' => $accommodations
        ]);
    }

    public function show(Request $request, Accommodation $accommodation)
    {
        $accommodation->load('host', 'images');

        return Inertia::render('Accommodation/Show', [
            'accommodation' => $accommodation
        ]);
    }

    public function calculatePrice(Request $request, int $accommodation)
    {
        $accommodation = Accommodation::find($accommodation);
        $dates = $request->only(['start_date', 'end_date']);
        $days = Carbon::parse($dates['start_date'])->diffInDays(Carbon::parse($dates['end_date']));
        $days = $days * $accommodation->price;
        
        return response()->json([
            'price' => $days
        ]);
    }
}
