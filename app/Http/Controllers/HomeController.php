<?php

namespace App\Http\Controllers;

use App\Models\Spbu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Display the landing page with business units section.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Get all active SPBUs for display, ordered by established_year
        $spbus = Spbu::where('is_active', true)
            ->orderBy('established_year', 'asc') // Oldest first
            ->get();

        // Define accent colors for each position
        $accentColors = [
            'rgb(38, 198, 249)', // Blue for first position
            'rgb(153, 172, 48)', // Green/Yellow for second position
            'rgb(186, 49, 59)',  // Red for third position
            'rgb(223, 223, 227)' // Light gray for fourth position
        ];

        // Determine layout groups based on number of SPBUs
        $layoutGroups = $this->organizeSpbusIntoLayoutGroups($spbus, $accentColors);

        return [
        'spbus' => $spbus,
        'layoutGroups' => $layoutGroups
         ];
    }

    /**
     * Organize SPBUs into layout groups for the business units section
     * Each group specifies width, accent color, and which SPBU to display
     *
     * @param  \Illuminate\Database\Eloquent\Collection  $spbus
     * @param  array  $accentColors
     * @return array
     */
    public function organizeSpbusIntoLayoutGroups($spbus, $accentColors)
    {
        $totalSpbus = $spbus->count();
        $layoutGroups = [];
        $spbuIndex = 0;

        // Add SPBUs to layout groups with different widths and colors
        while ($spbuIndex < $totalSpbus) {
            // First row pattern (wide + narrow)
            if ($spbuIndex < $totalSpbus) {
                $layoutGroups[] = [
                    'width' => 'wide',  // 715px
                    'color' => $accentColors[0],
                    'spbu' => $spbus[$spbuIndex],
                ];
                $spbuIndex++;
            }

            if ($spbuIndex < $totalSpbus) {
                $layoutGroups[] = [
                    'width' => 'narrow', // 505px
                    'color' => $accentColors[1],
                    'spbu' => $spbus[$spbuIndex],
                ];
                $spbuIndex++;
            }

            // Second row pattern (narrow + wide)
            if ($spbuIndex < $totalSpbus) {
                $layoutGroups[] = [
                    'width' => 'narrow', // 505px
                    'color' => $accentColors[2],
                    'spbu' => $spbus[$spbuIndex],
                ];
                $spbuIndex++;
            }

            if ($spbuIndex < $totalSpbus) {
                $layoutGroups[] = [
                    'width' => 'wide',  // 715px
                    'color' => $accentColors[3],
                    'spbu' => $spbus[$spbuIndex],
                ];
                $spbuIndex++;
            }

            // If we need to add more SPBUs, restart the color pattern
            if ($spbuIndex < $totalSpbus) {
                // Rotate colors for next set of SPBUs
                $accentColors = array_merge(array_slice($accentColors, 1), [array_shift($accentColors)]);
            }
        }

        return $layoutGroups;
    }
}