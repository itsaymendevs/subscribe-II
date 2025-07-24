<div>




    {{-- head --}}
    @section('head')

    <title>Terms & Conditions</title>

    @endsection
    {{-- endHead --}}





    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}




    {{-- colors --}}
    <livewire:subscribe.components.colors key='colors' />




    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}





    {{-- wrapper --}}
    <section class="blog2 section-padding" style="min-height: 91vh">
        <div class="container">
            <div class="row">





                {{-- pageTitle --}}
                <div class="col-12">
                    <div class="section-title text-center mb-4"><span class='fw-700'>{{
                            env('APP_CLIENT_NAME') }}</span> Terms and Conditions</div>
                </div>



                {{-- -------------------------------------- --}}
                {{-- -------------------------------------- --}}





                {{-- terms --}}
                <div class="col-12">
                    <div class="terms--wrapper">


                        {{-- section --}}
                        <h3 class='text-white'>Introduction</h3>
                        <p class="mb-30">Welcome to {{ env('APP_CLIENT_OFFICIAL_NAME') }}! These Terms and Conditions
                            outline the rules and regulations for the use of&nbsp; {{ env('APP_CLIENT_NAME') }}'s
                            website, products, and services. By accessing this website, we assume you accept these Terms
                            and Conditions in full. Do not continue to use {{ env('APP_CLIENT_NAME') }}'s website or
                            services if you do not agree to all the Terms and Conditions stated on this page</p>




                        {{-- ------------------------------------ --}}
                        {{-- ------------------------------------ --}}
                        {{-- ------------------------------------ --}}




                        {{-- section --}}
                        <h3 class='text-white'>General Terms</h3>
                        <p class="term--point">Meals are intended for the next day or should be consumed on the same day
                            they
                            are delivered</p>

                        <p class="term--point">The driver's waiting time at the agreed
                            delivery location is 10 minutes from the time of arrival. If the customer does not
                            respond to the call, the meals will be stored at the nearest {{ env('APP_CLIENT_NAME')
                            }} branch</p>


                        <p class="term--point">Clients must pay in full 3 business days
                            before the desired start date (new or renewal). Otherwise, delivery will not
                            proceed</p>


                        <p class="term--point">Customers may cancel within the first 5
                            days of the meal plan. The unused balance will be refunded, minus a 200 AED cancellation
                            fee. No refunds after the 7th day.</p>



                        <p class="term--point">Refunds are processed using the original
                            payment method and take 5–15 working days</p>


                        <p class="term--point">Each confirmed and paid referral earns a free snack on the client's next
                            renewed
                            plan</p>


                        <p class="term--point">Corporate discounts apply only under a formal agreement with {{
                            env('APP_CLIENT_NAME') }}</p>





                        {{-- ------------------------------------ --}}
                        {{-- ------------------------------------ --}}
                        {{-- ------------------------------------ --}}




                        {{-- section --}}
                        <h3 class='text-white mt-5'>Allergen Policy</h3>
                        <p class="term--point">{{ env('APP_CLIENT_NAME') }} accommodates
                            allergen and dislike requests to the best of its ability</p>


                        <p class="term--point">However, our kitchen is not a certified
                            allergen-free facility. Cross-contamination, while minimized, may occur</p>


                        <p class="term--point">We do not accommodate high-risk or
                            life-threatening medical allergies (e.g., severe nut or shellfish allergies)</p>

                        <p class="term--point">Customers with serious medical conditions
                            must consult their doctor before subscribing and understand they assume full
                            responsibility for their dietary choices</p>


                        <p class="term--point">{{ env('APP_CLIENT_NAME') }} is not liable
                            for any allergic reactions due to shared kitchen environments or unintentional
                            traces</p>





                        {{-- ------------------------------------ --}}
                        {{-- ------------------------------------ --}}
                        {{-- ------------------------------------ --}}




                        {{-- section --}}
                        <h3 class='text-white mt-5'>Refund & Cancellation Policy</h3>

                        <p class="term--point">Refunds are only eligible within the first
                            5 days of service, covering only the unused days</p>

                        <p class="term--point">A 200 AED cancellation fee will be
                            deducted from the refund amount</p>

                        <p class="term--point">No refunds will be processed after day 7
                            of the subscription</p>

                        <p class="term--point">Refunds will be made through the original
                            method of payment</p>

                        <p class="term--point">Refund requests must be initiated via
                            official {{ env('APP_CLIENT_NAME') }} customer service channels</p>

                        <p class="term--point">The cost of the bag will be deducted from
                            the refunded amount</p>





                        {{-- ------------------------------------ --}}
                        {{-- ------------------------------------ --}}
                        {{-- ------------------------------------ --}}




                        {{-- section --}}
                        <h3 class='text-white mt-5'>Delivery Policy</h3>

                        <p class="term--point">All deliveries will be made in thermal
                            cooler bags with ice packs to preserve freshness. A refundable deposit of 150 AED is
                            required for the cooler bags. This will be refunded at the end of the subscription upon
                            the return of all bags in good condition to ensure consistency with Clause No. 6 related
                            to the Refund and Cancellation Policy</p>



                        <p class="term--point">Deliveries will be placed at the client's
                            doorstep during the agreed delivery time window. Clients must leave the empty cooler bag
                            at the doorstep for collection during the next delivery</p>


                        <p class="term--point">There is no delivery on Saturdays. Friday delivery will include two meal
                            sets to cover Friday and Saturday</p>



                        <p class="term--point">Delivery changes must be requested at
                            least 3 business days in advance</p>


                        <p class="term--point">Unattended bags are the customer’s
                            responsibility; {{ env('APP_CLIENT_NAME') }} is not liable for loss, theft, or
                            spoilage</p>



                        <p class="term--point">Failed deliveries due to customer absence
                            will be counted as delivered</p>

                        <p class="term--point">{{ env('APP_CLIENT_NAME') }} delivers to
                            most UAE cities but excludes some remote or out-of-town areas</p>

                        <p class="term--point">Clients are responsible for storing all
                            meals in a refrigerator at below 5°C and heating meals for at least 2 minutes in a
                            microwave before consumption</p>


                        <p class="term--point">Please note that the bag is considered an
                            integral part of the subscription. In the event that
                            the client cancels the subscription Kindly ensure this policy is applied when processing
                            any refund requests</p>






                        {{-- ------------------------------------ --}}
                        {{-- ------------------------------------ --}}
                        {{-- ------------------------------------ --}}




                        {{-- section --}}
                        <h3 class='text-white mt-5'>Limitation of Liability</h3>

                        <p class="term--point">{{ env('APP_CLIENT_NAME') }} is not liable
                            for indirect or consequential damages</p>

                        <p class="term--point">{{ env('APP_CLIENT_NAME') }} is not liable
                            for outcomes related to customer’s dietary choices or health conditions</p>

                        <p class="term--point">{{ env('APP_CLIENT_NAME') }} is not liable
                            for loss or damage to unattended deliveries</p>




                        {{-- ------------------------------------ --}}
                        {{-- ------------------------------------ --}}
                        {{-- ------------------------------------ --}}




                        {{-- section --}}
                        <h3 class='text-white mt-5'>Privacy Policy</h3>

                        <p class="term--point">By accessing or using our services, you
                            agree to be bound by these Terms and Conditions and all other policies posted on our
                            site</p>


                        <p class="term--point">{{ env('APP_CLIENT_NAME') }} reserves the
                            right to change or
                            modify these Terms and Conditions at any time without prior notice. Your continued use
                            of the website constitutes your acceptance of the updated terms</p>



                        <p class="term--point">Any updates to terms will be communicated
                            through the website, and continued use of services after updates constitutes
                            acceptance</p>



                        {{-- ------------------------------------ --}}
                        {{-- ------------------------------------ --}}
                        {{-- ------------------------------------ --}}




                        {{-- section --}}
                        <h3 class='text-white mt-5'>General Privacy Policy</h3>

                        <p class="term--point">{{ env('APP_CLIENT_NAME') }} values your
                            privacy and is
                            committed to protecting your personal information. For more details, please review our
                            Privacy Policy, which is incorporated into these Terms and Conditions</p>





                        {{-- ------------------------------------ --}}
                        {{-- ------------------------------------ --}}
                        {{-- ------------------------------------ --}}




                        {{-- section --}}
                        <h3 class='text-white mt-5'>Use of the Website</h3>

                        <p class="term--point">Customers must be 18+ or have guardian
                            consent</p>

                        <p class="term--point">Use the website for lawful purposes
                            only</p>


                        <p class="term--point">{{ env('APP_CLIENT_NAME') }} reserves the
                            right to refuse service or terminate accounts for misuse</p>


                        <p class="term--point">{{ env('APP_CLIENT_NAME') }} does not
                            guarantee the website will be error-free or uninterrupted</p>



                        {{-- ------------------------------------ --}}
                        {{-- ------------------------------------ --}}
                        {{-- ------------------------------------ --}}




                        {{-- section --}}
                        <h3 class='text-white mt-5'>Products and Services</h3>

                        <p class="term--point">Meal plans are valid for 90 days from the
                            first delivery</p>

                        <p class="term--point">Meal selection and dislikes are
                            customizable within the plan range; customizations beyond this may incur extra
                            fees</p>

                        <p class="term--point">Subscription changes (upgrades, downgrades) must be settled within 3
                            business days</p>




                        {{-- ------------------------------------ --}}
                        {{-- ------------------------------------ --}}
                        {{-- ------------------------------------ --}}




                        {{-- section --}}


                        {{-- meal-selection --}}
                        @if (env('APP_CLIENT') == 'BeHealthy')

                        <h3 class='text-white mt-5'>Meal Selection Policy</h3>

                        <p class="term--point">To maintain a consistent quality of
                            service and streamlined operations, all meal selections must be made exclusively through
                            our platform. This approach ensures uniformity in experience, quality control, and
                            organizational efficiency for all clients</p>

                        @endif
                        {{-- end if --}}





                        {{-- ------------------------------------ --}}
                        {{-- ------------------------------------ --}}
                        {{-- ------------------------------------ --}}




                        {{-- section --}}
                        <h3 class='text-white mt-5'>Governing Law</h3>

                        <p class="term--point">These Terms and Conditions are governed by
                            the laws of the United Arab Emirates</p>



                        {{-- ------------------------------------ --}}
                        {{-- ------------------------------------ --}}
                        {{-- ------------------------------------ --}}




                        {{-- section --}}
                        <h3 class='text-white mt-5'>Health Disclaimer</h3>

                        <p class="term--point">Customers should consult a physician
                            before starting any diet plan</p>

                        <p class="term--point">{{ env('APP_CLIENT_NAME') }} does not
                            offer medical advice or diagnose conditions</p>


                        <p class="term--point">Subscribing to {{ env('APP_CLIENT_NAME')
                            }} is at the customer’s own risk</p>




                        {{-- ------------------------------------ --}}
                        {{-- ------------------------------------ --}}
                        {{-- ------------------------------------ --}}




                        {{-- section --}}
                        <h3 class='text-white mt-5'>Contact Information</h3>

                        <p class="term--point">For questions or disputes, please contact
                            {{ env('APP_CLIENT_NAME') }} Customer Service via our website or official WhatsApp {{
                            $globalProfile?->whatsapp }} /email. {{
                            $globalProfile?->email }}</p>



                    </div>
                </div>




                {{-- -------------------------------------- --}}
                {{-- -------------------------------------- --}}





            </div>
            {{-- endRow --}}




        </div>
    </section>
    {{-- endPlans --}}







</div>
{{-- endWrapper --}}