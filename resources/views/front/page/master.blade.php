<!DOCTYPE html>
<html lang="en">
@include ('front.page.header')
  <body>
    <div class="home-header">
      @include('front.page.navbar')
    </div>
    <div class="page-content">
      <div class="home-content">
        @yield('content') 
    </div>
    </div>
    
    <!-- <div class="home-footer">
        <div class="section about-section">
            <div class="field field--name-body field--type-text-with-summary field--label-hidden field--item">
                <div class="footer-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="box-about">
                                    <h3>About us:</h3>
                                    <p class="text-align-justify">Learning English Tests is the global community of students, teachers, examiners, institutions
                                        and English training centres, and is target the #1 website for online English practice.
                                        We are a community-driven website with free real English exams, English tips and numerous
                                        innovative features to make English online testing easier, helping students improve their
                                        English scores online.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <ul class="menu-footer">
                                    <li>
                                        <a href="#">Privacy Policy</a>
                                    </li>
                                    <li>
                                        <a href="#">Terms Conditions</a>
                                    </li>
                                    <li>
                                        <a href="#">Site Map</a>
                                    </li>
                                    <li>
                                        <a class="use-ajax" data-dialog-type="modal" href="#">Contact Us</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <div class="box-about">
                                    <h3>Disclaimer</h3>
                                    <p class="text-align-justify">English is a registered trademark of University of Cambridge, the British Council, and IDP
                                        Education Australia. This site and it's owners are not affiliated, approved or endorsed
                                        by the University of Cambridge ESOL, the British Council, and IDP Education Australia.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <p class="allright">2018 EnglishOnlineTests. All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </div>                -->
    @include ('front.page.script')
    @yield('jquery')
  </body>
</html>