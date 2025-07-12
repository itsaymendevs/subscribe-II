{{-- wrapper --}}
<div>



    {{-- styles --}}
    @section('styles')




    <style>
        :root {


            /* fonts */
            /* --text-font: <?php echo "$globalProfile->textFont" ?>; */

            /* colors */
            --color-primary: <?php echo "$globalProfile->colorPrimary" ?>;
        }
    </style>


    @endsection
    {{-- endSection --}}



</div>
{{-- endWrapper --}}