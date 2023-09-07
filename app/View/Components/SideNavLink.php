<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SideNavLink extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $link,
        public string $name,
        public ?string $icon = null
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $isActive = request()->url() === $this->link;

        return view( 'components.side-nav-link', compact( 'isActive' ) );
    }
}
