<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ServiceCategoryCard extends Component
{
    public function __construct(
        public string $title = '',
        public string $subtitle = '',
        public string $categoryId = '',
        public bool $isDark = false
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.service-category-card');
    }
}
