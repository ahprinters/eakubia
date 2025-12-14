<?php

namespace App\View\Components\Dashboard;

use Illuminate\View\Component;

class WelcomeBanner extends Component
{
    public $user;
    public $message;

    public function __construct($user=null, $message=null)
    {
        $this->user = $user;
        $this->message = $message;
    }

    public function render()
    {
        return view('components.dashboard.welcome-banner');
    }
}