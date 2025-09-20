<?php

namespace App\Livewire\Subscribe\Customization\Components;

use App\Livewire\Forms\SubscriptionForm;
use App\Models\Allergy;
use App\Models\Exclude;
use App\Traits\HelperTrait;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Livewire\Component;

class CustomizationExcludes extends Component
{


    use HelperTrait;

    // :: variables
    public SubscriptionForm $instance;
    public $allergyLists, $excludeLists;



    public function mount()
    {

        // 1: dependencies
        $this->allergyLists = Allergy::all();
        $this->excludeLists = Exclude::all();


    } // end function



    // ------------------------------------------------------------




    #[On('manageExcludes')]
    public function remount()
    {


        // 1: getExcludes
        $this->instance->excludeLists = session('excludeLists') ?? [];
        $this->instance->allergyLists = session('allergyLists') ?? [];



    } // end function




    // ------------------------------------------------------------




    public function checkExcludes()
    {


        // 1: checkCount
        if (count($this->instance->excludeLists) < 3) {

            $this->skipRender();

        } // end if


    } // end if






    // ------------------------------------------------------------




    public function checkAllergies()
    {


        // 1: checkCount
        if (count($this->instance->allergyLists) < 3) {

            $this->skipRender();

        } // end if


    } // end if






    // ------------------------------------------------------------





    public function confirm()
    {



        // 1: validateExcludes / allergies
        if (count($this->instance->excludeLists ?? []) > 4 || count($this->instance->allergyLists ?? []) > 4) {

            $this->makeAlert('info', "Maximum of four exclusions or allergy groups allowed.");

            return false;

        } // end if







        // 2: create-session
        Session::put('excludeLists', $this->instance->excludeLists);
        Session::put('allergyLists', $this->instance->allergyLists);


        $this->dispatch('syncExcludes');
        $this->dispatch('closeModal', modal: '#excludes--modal .btn-close');


    } // end function




    // ------------------------------------------------------------







    public function render()
    {

        return view('livewire.subscribe.customization.components.customization-excludes');

    } // end function


} // end class
