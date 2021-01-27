<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class CrimeByCountryChart extends BaseChart
{
    /**
     * Handles the HT requesTPt for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public ?string $routeName = 'crime_by_country';
    public ?string $prefix = '';
    public ?array $middlewares = ['web'];


    public function handler(Request $request): Chartisan
    {
        return Chartisan::build()
            ->labels(['First', 'Second', 'Third'])
            ->dataset('Sample', [1, 2, 3])
            ->dataset('Sample 2', [3, 2, 1]);
    }
}