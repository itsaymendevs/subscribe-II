<?php

namespace App\Livewire\Subscribe\Helpers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class GetAccess extends Component
{

    public function mount($id, Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $redirectURL = $request?->redirect ?? null;


        // 1: getUser
        $user = User::find($id);


        // 1.2: checkUser
        if ($user) {

            Session::put('hasUserAccess', $user->id);


            // 1.3: redirect
            if ($redirectURL ?? null) {

                $this->redirect(url: $redirectURL);

            } else {


                // 1.4: remove
                Session::forget('logged-customer');
                Session::forget('reToken');
                $this->redirect(route('subscribe.customization'));

            } // end if





            // :: throw 404
        } else {


            Session::forget('hasUserAccess');
            abort(404);


        } // end if


    } // end function




    // --------------------------------------------------------------



    public function render()
    {
        return view('livewire.subscribe.helpers.get-access');

    } // end function


} // end class

