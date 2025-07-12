<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class MailConfigurationForm extends Form
{

    // :: variables
    public $username, $password, $port, $mailer, $host, $encryption, $senderName, $senderEmail;
    public $id, $isActive, $broadcastEmail, $broadcastSecondEmail, $broadcastThirdEmail;



} // end form
