{{-- wrapper --}}
<div>



    {{-- styles --}}
    @section('styles')




    <style>
        :root {


            /* fonts */
            /* --text-font: <?php echo "$globalProfile->textFont" ?>; */
            /* #8cb6a0 */
            /* colors */
            --color-primary: <?php echo "$globalProfile->colorPrimary" ?>;
        }
    </style>


    @endsection
    {{-- endSection --}}



</div>
{{-- endWrapper --}}