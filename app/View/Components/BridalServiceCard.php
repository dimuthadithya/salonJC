<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BridalServiceCard extends Component
{
    public function __construct(
        public string $title = '',
        public string $price = '',
        public string $duration = '',
        public array $features = [],
        public string $packageType = '',
        public int $serviceId = 0
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.bridal-service-card');
    }
}
