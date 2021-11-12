<?php
namespace App\Listeners;

class VideoCreatedListener
{

    public function onVideoCreatedListener($event)
    {
        dump($event->video->title);
    }
}