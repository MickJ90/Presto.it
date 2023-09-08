<!-- Footer -->
<footer id="footer" class="background-green text-center mt-5 text-white">
    <!-- Grid container -->
    <div class="container p-4">
        <!-- Section: Social media -->
        <section class="mb-4">
            <!-- Facebook -->
            <a class="btn btn-outline-light btn-floating m-1" href="" role="button"><i class="bi bi-facebook"></i></a>

            <!-- Instagram -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                    class="bi bi-instagram"></i></a>

            <!-- Linkedin -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="bi bi-linkedin"></i></a>

            <!-- Github -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="bi bi-github"></i></a>
        </section>
        <!-- Section: Social media -->
        @auth

        @if (!Auth::user()->is_revisor)
        <!-- Section: Form -->
        <section class="">
            <form action="">
                <!--Grid row-->
                <div class="row d-flex justify-content-center">
                    <!--Grid column-->
                    <div class="col-auto">
                        <p class="pt-2">
                            <strong>{{__('ui.workWithUs')}}</strong>
                        </p>
                    </div>
                    <!--Grid column-->



                    <!--Grid column-->
                    <div class="col-auto">
                        <!-- Submit button -->
                        <a href="{{ route('become.revisor')}}" class="btn btn-outline-light mb-4">{{__('ui.becomeRevisor')}}</a>

                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </form>
        </section>
        @endif

        @endauth

        <!-- Section: Form -->

        <!-- Section: Text -->
        <section class="mb-4">
            <p>
                <strong>Presto.it</strong>
            </p>
        </section>
        <!-- Section: Text -->


    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2023 Copyright:
        <a class="text-white" href="/">Crash Team</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->