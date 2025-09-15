<?php

namespace App\Traits;

use App\Mail\AccountMail;
use App\Mail\InvoiceMail;
use App\Models\Customer;
use App\Models\CustomerSubscription;
use App\Models\MailConfiguration;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;


trait MailTrait
{



    protected function setMailConfiguration($configuration)
    {


        // 1: getConfiguration
        if ($configuration?->host) {


            // 1.2: mailers
            Config::set('mail.mailers.smtp.host', $configuration?->host);
            Config::set('mail.mailers.smtp.port', $configuration?->port);
            Config::set('mail.mailers.smtp.username', $configuration?->username);
            Config::set('mail.mailers.smtp.password', "{$configuration?->password}");
            Config::set('mail.mailers.smtp.encryption', $configuration?->encryption);

            Config::set('mail.from.name', $configuration?->senderName);
            Config::set('mail.from.address', $configuration?->senderEmail);



        } // end if



    } // end function












    // ---------------------------------------------------------------------
    // ---------------------------------------------------------------------
    // ---------------------------------------------------------------------
    // ---------------------------------------------------------------------







    public function sendInvoiceMail($id, $email)
    {


        // 1: setConfiguration
        $configuration = MailConfiguration::first();



        if ($configuration?->host) {

            $this->setMailConfiguration($configuration);

            // 1.2: prepMail
            // Mail::to($email)->send(new InvoiceMail($id));


        } // end if



    } // end function








    // ---------------------------------------------------------------------
    // ---------------------------------------------------------------------







    public function sendAccountMail($id, $email)
    {


        // 1: setConfiguration
        $configuration = MailConfiguration::first();


        if ($configuration?->host) {


            $this->setMailConfiguration($configuration);


            // 1.2: checkMultipleSubscriptions
            $customer = Customer::find($id);


            if ($customer?->subscriptions?->count() == 1) {

                // Mail::to($email)->send(new AccountMail($id));

            } // end if



        } // end if





    } // end function



} // end trait

