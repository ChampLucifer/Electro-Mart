<!-- FOOTER -->
<footer id="footer">
    <!-- top footer -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">About Us</h3>
                        <p>{{ $app_setting->meta_description ?? "" }}</p>
                        <ul class="footer-links">
                            <li><a href="#"><i class="fa fa-map-marker"></i>{{ $app_setting->address ?? "" }}</a></li>
                            <li><a href="#"><i class="fa fa-phone"></i>{{ $app_setting->phone1 ?? "" }}</a></li>
                            <li><a href="#"><i class="fa fa-envelope-o"></i>{{ $app_setting->email ?? "" }}</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Categories</h3>
                        <ul class="footer-links">
                            @foreach ($global_cats as $global_cat)
                            <li><a href="{{ url('user/collections/'.$global_cat->slug) }}">{{ $global_cat->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="clearfix visible-xs"></div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Information</h3>
                        <ul class="footer-links">
                            @foreach ($global_brands as $global_brand)
                            <li><a href="{{ url('user/collections/'.$global_brand->slug) }}">{{ $global_brand->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Social Media</h3>
                        <ul class="footer-links">
                            <li><a href="{{ $app_setting->instagram }}"><i class="fa fa-instagram"></i> Instagram</a></li>
                            <li><a href="{{ $app_setting->whatsapp }}"><i class="fa fa-whatsapp"></i> Whatsapp</a></li>
                        
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /top footer -->

    <!-- bottom footer -->
    <div id="bottom-footer" class="section">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <ul class="footer-payments">
                        <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                        <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                    </ul>
                    <span class="copyright">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </span>
                </div>
            </div>
                <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bottom footer -->
</footer>
@stack('scripts')
<!-- /FOOTER -->
@livewireScripts
<!-- jQuery Plugins -->

<script src="{{ url('user_frontend/js/jquery.min.js') }}"></script>
<script src="{{ url('user_frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ url('user_frontend/js/slick.min.js') }}"></script>
<script src="{{ url('user_frontend/js/nouislider.min.js') }}"></script>
<script src="{{ url('user_frontend/js/jquery.zoom.min.js') }}"></script>
<script src="{{ url('user_frontend/js/main.js') }}"></script>
{{-- <livewire:scripts /> --}}
<script>
$(document).ready(function() {
  $('.parent_cat').on('click',function() {
    $('.submenu').toggle();
  });
});




</script>
</body>
</html>