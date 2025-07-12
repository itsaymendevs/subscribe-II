<?php

namespace App\Traits;

use App\Models\BranchTable;
use App\Models\CityDeliveryTime;
use App\Models\CityDistrict;
use App\Models\Container;
use App\Models\Item;
use App\Models\Job;
use App\Models\Label;
use App\Models\Profile;
use App\Models\VendorContainer;
use App\Models\VendorItem;
use App\Models\VendorLabel;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Spatie\Image\Image;
use Livewire\Attributes\On;

trait HelperTrait
{




    // :: globalVariables
    public $removeId, $removeType, $temporaryId;
    public $isUploading = false;





    public function getStoragePath()
    {

        $clientProfile = Profile::first();
        $storagePath = env('APP_STORAGE')."/".$clientProfile->nameURL."/";

        return $storagePath;

    } // end function








    // --------------------------------------------------------------





    #[On('upload:generatedSignedUrl')]
    public function startUploading()
    {

        $this->isUploading = true;

    } // end function






    // --------------------------------------------------------------






    #[On('upload:finished')]
    public function finishUploading()
    {

        $this->isUploading = false;

    } // end function






    // --------------------------------------------------------------







    public function checkUploading()
    {

        if ($this->isUploading) {

            return true;

        } else {

            return false;

        } // end if


    } // end function







    // --------------------------------------------------------------
    // --------------------------------------------------------------
    // --------------------------------------------------------------
    // --------------------------------------------------------------









    protected function getGramToKG()
    {


        return 1000;


    } // end function





    // --------------------------------------------------------------






    protected function getNameURL($name = '')
    {

        return str_replace(" ", "-", strtolower($name));


    } // end function









    // --------------------------------------------------------------
    // --------------------------------------------------------------
    // --------------------------------------------------------------









    protected function getDefaultPreview()
    {


        // 1: getDefaultPreview
        $defaultPreview = url('assets/img/placeholder.png');

        return $defaultPreview;



    } // end function









    // --------------------------------------------------------------











    protected function getSecondDefaultPreview()
    {


        // 1: getDefaultPreview
        $defaultPreview = url('assets/plugins/customer-portal/img/helpers/upload.png');

        return $defaultPreview;



    } // end function









    // --------------------------------------------------------------
    // --------------------------------------------------------------
    // --------------------------------------------------------------










    protected function getCurrentDate()
    {


        // 1: getDate
        return $currentDate = date('Y-m-d');



    } // end function









    // --------------------------------------------------------------







    protected function getNextDate()
    {


        // 1: getDate
        return $tmwDate = date('Y-m-d', strtotime('+1 day'));


    } // end function














    // --------------------------------------------------------------







    protected function getDateByDays($days)
    {


        // 1: getDate
        return $date = date('Y-m-d', strtotime("+{$days} day"));


    } // end function














    // --------------------------------------------------------------







    protected function getDateByDate($originalDate, $days)
    {


        // 1: getDate
        return $date = date('Y-m-d', strtotime("{$originalDate} +{$days} day"));


    } // end function










    // --------------------------------------------------------------
    // --------------------------------------------------------------
    // --------------------------------------------------------------













    public function refreshSelect($childSelectId, $parentModel, $childModel, $parentValue, $isEmpty = false)
    {



        // 1: city - districts
        if ($parentModel == 'city' && $childModel == 'district') {

            $cityDistricts = $parentValue ?
                CityDistrict::where('cityId', $parentValue)
                    ->get(['id', 'name as text'])->toArray() : [];



            // :: makeEmpty
            $isEmpty ? array_unshift($cityDistricts, ['id' => '', 'text' => '']) : null;


            $this->dispatch('refreshSelect', id: $childSelectId, data: $cityDistricts);


        } // end if







        // 2: city - deliveryTime
        if ($parentModel == 'city' && $childModel == 'deliveryTime') {

            $cityDeliveryTimes = $parentValue ?
                CityDeliveryTime::where('cityId', $parentValue)
                    ->get(['id', 'title as text'])->toArray() : [];



            // :: makeEmpty
            $isEmpty ? array_unshift($cityDeliveryTimes, ['id' => '', 'text' => '']) : null;




            $this->dispatch('refreshSelect', id: $childSelectId, data: $cityDeliveryTimes);


        } // end if





    } // end function













    // --------------------------------------------------------------
    // --------------------------------------------------------------
    // --------------------------------------------------------------






    public function levelSelect($levelType, $levelFilterId = null, $value, $levelId = null)
    {





        // 1: city
        if ($levelType == 'city') {



            if ($value) {

                $districts = CityDistrict::where('cityId', $value)?->get(['id', 'name as text'])?->toArray() ?? [];

                $deliveryTimes = CityDeliveryTime::where('isActive', true)?->where('cityId', $value)
                        ?->get(['id', 'title as text'])?->toArray() ?? [];

            } // end if






            // B: validateEmpty
            count($districts ?? []) ? array_unshift($districts, ['id' => '', 'text' => '']) : null;
            count($deliveryTimes ?? []) ? array_unshift($deliveryTimes, ['id' => '', 'text' => '']) : null;




            // C: refreshSelect
            if ($levelId) {


                $this->dispatch('refreshSelect', id: ".level--two[data-id='{$levelId}']", data: $districts ?? ['id' => '', 'text' => '']);

                $this->dispatch('refreshSelect', id: ".level--two-second[data-id='{$levelId}']", data: $deliveryTimes ?? ['id' => '', 'text' => '']);


            } else {

                $this->dispatch('refreshSelect', id: '.level--two', data: $districts ?? ['id' => '', 'text' => '']);
                $this->dispatch('refreshSelect', id: '.level--two-second', data: $deliveryTimes ?? ['id' => '', 'text' => '']);

            } // end if




        } // end if










    } // end function












    // --------------------------------------------------------------
    // --------------------------------------------------------------
    // --------------------------------------------------------------









    protected function makeRequest($requestURL, $instance)
    {




        // 1: URL - token
        $requestURL = env('APP_API').$requestURL;
        $requestDB = env('APP_DB');
        // $token = session('token');



        // 2: sendRequest
        $response = Http::post($requestURL, [
            'instance' => $instance,
            'database' => $requestDB,
        ])->json();





        // 3: convertToObject
        $response = json_decode(json_encode($response));

        return $response;


    } // end function









    // --------------------------------------------------------------
    // --------------------------------------------------------------
    // --------------------------------------------------------------











    protected function makeAlert($type, $message = '', $confirmMethod = '')
    {



        // 1: removeType (custom)
        if ($type == 'remove') {


            // $this->alert('question', 'This item and related items will be permanently removed', [
            //     'position' => 'bottom',
            //     'timer' => '',
            //     'toast' => true,
            //     'width' => '400',
            //     'showConfirmButton' => true,
            //     'showCancelButton' => true,
            //     'confirmButtonText' => 'Remove',
            //     'cancelButtonText' => 'Cancel',
            //     'confirmButtonColor' => '#dc3545',
            //     'cancelButtonColor' => '#d3d3d3',
            //     'onConfirmed' => $confirmMethod,
            // ]);



            // 2: questionType
        } elseif ($type == 'question') {


            // $this->alert('question', $message, [
            //     'position' => 'bottom',
            //     'timer' => '',
            //     'toast' => true,
            //     'width' => '400',
            //     'showConfirmButton' => true,
            //     'showCancelButton' => true,
            //     'confirmButtonText' => 'Confirm',
            //     'cancelButtonText' => 'Cancel',
            //     'confirmButtonColor' => '#87b2a9',
            //     'cancelButtonColor' => '#d3d3d3',
            //     'onConfirmed' => $confirmMethod,
            // ]);




            // 3: success - info
        } else {

            // $this->alert($type, $message, [
            //     'position' => 'top',
            //     'timer' => 1500,
            //     'toast' => true,
            //     'width' => '400',
            //     'timerProgressBar' => true,
            // ]);

        } // end if





    } // end function










    // --------------------------------------------------------------
    // --------------------------------------------------------------
    // --------------------------------------------------------------










    protected function uploadFile($instanceFile, $path, $key = 'ITM', $width = 600, $height = 600, $skipResize = false, $method = 'contain')
    {


        // 1: getFileName
        $fileName = $key.'-'.date('h.iA').rand(10, 10000).rand(10, 10000).rand(10, 10000).'.'.$instanceFile->getClientOriginalExtension();





        // -----------------------------------------------------
        // -----------------------------------------------------
        // -----------------------------------------------------
        // -----------------------------------------------------






        // 2.1: optimize
        $clientProfile = Profile::first();

        if ($fileName && env('APP_ENV') != 'local') {


            // 2.1.1: createDirectory
            Storage::disk('public')->makeDirectory("{$clientProfile->nameURL}/$path");



            // 2.2: saveFile
            Image::load($instanceFile->path())
                ->optimize()
                ->save(storage_path("app/public/{$clientProfile->nameURL}/{$path}/{$fileName}"));



        } else {

            $instanceFile->storeAs("{$clientProfile->nameURL}/$path", $fileName, "public");

        } // end if





        return $fileName;



    } // end function










    // --------------------------------------------------------------
    // --------------------------------------------------------------
    // --------------------------------------------------------------










    protected function replaceFile($instanceFile, $path, $fileName, $key = 'ITM', $width = 600, $height = 600, $skipResize = false, $method = 'contain')
    {




        // 1: remove
        $clientProfile = Profile::first();

        if (! empty($fileName)) {

            Storage::disk('public')->delete("{$clientProfile->nameURL}/{$path}/{$fileName}");

        } // end if





        // 2: getFileName
        $fileName = $key.'-'.date('h.iA').rand(10, 10000).rand(10, 10000).rand(10, 10000).'.'.$instanceFile->getClientOriginalExtension();






        // -----------------------------------------------------
        // -----------------------------------------------------
        // -----------------------------------------------------
        // -----------------------------------------------------







        // 2.1: optimize
        if ($fileName && env('APP_ENV') != 'local') {





            // 2.1.1: createDirectory
            Storage::disk('public')->makeDirectory("{$clientProfile->nameURL}/$path");



            // 2.2: saveFile
            Image::load($instanceFile->path())
                ->optimize()
                ->save(storage_path("app/public/{$clientProfile->nameURL}/{$path}/{$fileName}"));



        } else {

            $instanceFile->storeAs("{$clientProfile->nameURL}/$path", $fileName, "public");

        } // end if





        return $fileName;



    } // end function











    // --------------------------------------------------------------
    // --------------------------------------------------------------
    // --------------------------------------------------------------









    protected function removeFile($fileName, $path)
    {


        // 1: remove
        if (! empty($fileName)) {

            $clientProfile = Profile::first();

            Storage::disk('public')->delete("{$clientProfile->nameURL}/{$path}/{$fileName}");

        } // end if




        return true;


    } // end function
















    // --------------------------------------------------------------
    // --------------------------------------------------------------
    // --------------------------------------------------------------








    protected function makeSerial($characters, $currentCount)
    {


        // 1: convert
        $currentCount = intval($currentCount);



        // 1.2: defineAndConcat
        if ($currentCount < 10) {

            return $characters.'-000'.($currentCount + 1);

        } elseif ($currentCount < 100) {

            return $characters.'-00'.($currentCount + 1);

        } elseif ($currentCount < 1000) {

            return $characters.'-0'.($currentCount + 1);

        } elseif ($currentCount < 10000) {

            return $characters.'-'.($currentCount + 1);

        } // end if




    } // end function









    // --------------------------------------------------------------
    // --------------------------------------------------------------
    // --------------------------------------------------------------









    function formatBytes($bytes, $precision = 1)
    {


        // ::rootOfFormat
        $kilobyte = 1024;
        $megabyte = $kilobyte * 1024;
        $gigabyte = $megabyte * 1024;



        // 1: bytes
        if ($bytes < $kilobyte) {
            return $bytes.' B';


            // 2: kiloBytes
        } elseif ($bytes < $megabyte) {
            return round($bytes / $kilobyte, $precision).' KB';


            // 3: megaBytes
        } elseif ($bytes < $gigabyte) {
            return round($bytes / $megabyte, $precision).' MB';


            // 4: gigaBytes
        } else {

            return round($bytes / $gigabyte, $precision).' GB';

        } // end if


    } // end function









    // --------------------------------------------------------------







    function differentInDays($fromDate, $untilDate)
    {



        // 1: convertToMilliseconds
        $fromDate = strtotime($fromDate);
        $untilDate = strtotime($untilDate);




        // 1.2: sub - round
        $difference = $untilDate - $fromDate;

        return round($difference / (60 * 60 * 24));





    } // end function













    // --------------------------------------------------------------







    function makeGroupToken()
    {


        return date('dmYhisA');


    } // end function









    // --------------------------------------------------------------







    function makeRegularToken()
    {

        return date('dmYhis');


    } // end function






    // --------------------------------------------------------------







    function runQueue()
    {


        // 1: getJobs
        $jobs = Job::all();


        foreach ($jobs ?? [] as $job) {

            Artisan::call('queue:work');

        } // end loop


    } // end function








} // end trait
