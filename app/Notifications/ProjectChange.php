<?php

namespace App\Notifications;

use App\Project\ProjectItemInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProjectChange extends Notification
{
    use Queueable;

    protected string $typeOfChange = "";
    protected ProjectItemInterface $project;

    /**
     * Vytvari novou instanci notifikace k projektu.
     *
     * @return void
     */
    public function __construct(ProjectItemInterface $project, string $typeOfChange)
    {
        $this->typeOfChange = $typeOfChange;
        $this->project = $project;
    }

    /**
     * Vraci komunikacni prostredek.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Vraci mailovou reprezentaci notifikace pripravenou k odeslani.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line($this->getMessage())
                    ->line('Have a nice day!');
    }

    /**
     * Vraci textovou podobu notifikace.
     *
     * @return string
     */
    public function getMessage() {
        $partial = "Your project with name {$this->project->getName()}";

        if ($this->typeOfChange == "update") {
            return "$partial has been updated";
        } else {
            return "$partial  has been deleted";
        }
    }
}
