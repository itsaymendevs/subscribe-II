{{-- wrapper --}}
<div>



    {{-- styles --}}
    @section('styles')




    <style>
        :root {


            /* body */
            --color-body: <?php echo "$customization->colorBody" ?>;
            --color-text: <?php echo "$colorBodyText" ?>;
            --color-text-dim: <?php echo "$colorBodyTextDim" ?>;

            /* layout */
            --color-layout: <?php echo "$customization->colorLayout" ?>;
            --color-layout-text: <?php echo "$colorLayoutText" ?>;
            --color-layout-text-dim: <?php echo "$colorLayoutTextDim" ?>;

            /* primary + secondary + border */
            --color-primary: <?php echo "$customization->colorPrimary" ?>;
            --color-secondary: <?php echo "$customization->colorSecondary" ?>;
            --color-border: <?php echo "$customization->colorBorder" ?>;
            --color-button-text: <?php echo "$colorButtonText" ?>;

        }
    </style>


    @endsection
    {{-- endSection --}}



</div>
{{-- endWrapper --}}