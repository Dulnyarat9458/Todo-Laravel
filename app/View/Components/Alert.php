<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    public $headtext;
    public $bodytext;

    public function __construct(string $headtext, string $bodytext)
    {
        $this->headtext = $headtext;
        $this->bodytext = $bodytext;
    }

    public function render(): View
    {
        $text = [
            'headtext' => $this->headtext,
            'bodytext' => $this->bodytext,
        ];

        return view('components.alert',compact('text'));
    }
}
