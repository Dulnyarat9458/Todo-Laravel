<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormConfirmModal extends Component
{
    public $headtext;
    public $bodytext;
    public $target;

    public function __construct(string $headtext, string $bodytext, string $target)
    {
        $this->headtext = $headtext;
        $this->bodytext = $bodytext;
        $this->target = $target;
    }

    public function render(): View
    {
        $text = [
            'headtext' => $this->headtext,
            'bodytext' => $this->bodytext,
            'target' => $this->target
        ];

        return view('components.form-confirm-modal',compact('text'));
    }
}


