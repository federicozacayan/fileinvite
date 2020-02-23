<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels; 

class DocumentRequest extends Mailable implements ShouldQueue 
{
    public $files;
    public $left;
    public $isPast;
    public $progress;
    public $bgColor;

    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->files = $data['files'];
        $this->left = $data['left'];
        $this->isPast = $data['isPast'];
        $this->progress = $data['progress'];
        $this->bgColor = $data['bgColor'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admin.process.updateM');
    }
}
