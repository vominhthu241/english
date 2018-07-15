@extends('front.page.master') @section('content')
<div class="row margin-bottom-40 ">
    <div class="col-md-12 home-banner">
        <h1>Learning English</h1>
        <h2>Free online English practice tests for 2018</h2>
        <button type="button" class="btn btn-danger">General Training</button>
    </div>
    <div class="col-md-12 section why-section">
        <div class="container">
            <div class="section-caption">
                <span>Why use English Online Tests?</span>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="our-test-item" style="height: 175px;">
                        <div class="ot-icon">
                            <img alt="" src="../assets/global/img/english/icon_h2.png">
                        </div>
                        <h3>Take recent actual English Tests</h3>
                        <p>Real English Listening and English Reading tests based on actual English tests and following the
                            Cambridge English book format.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="our-test-item" style="height: 175px;">
                        <div class="ot-icon">
                            <img alt="" src="../assets/global/img/english/icon_h8.png">
                        </div>
                        <h3>Community-driven</h3>
                        <p>Created by our community of English teachers, previous English examiners and English exam takers.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="our-test-item" style="height: 175px;">
                        <div class="ot-icon">
                            <img alt="" src="../assets/global/img/english/icon_h5.png">
                        </div>
                        <h3>Comprehensive analytics tool</h3>
                        <p>Our English Analytics is a tool that allow you to set a target English band score, analyse your progress,
                            find how to improve.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="our-test-item" style="height: 190px;">
                        <div class="ot-icon">
                            <img alt="" src="../assets/global/img/english/icon_h3_0.png">
                        </div>
                        <h3>View English Score and Answer Explanations</h3>
                        <p>After taking our English mock tests with real audio, you can check your Listening or Reading band
                            score and view your answer sheets.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="our-test-item" style="height: 190px;">
                        <div class="ot-icon">
                            <img alt="" src="../assets/global/img/english/icon_h6.png">
                        </div>
                        <h3>FREE to use</h3>
                        <p>Our online English tests are always free. We are here to help users for study abroad, immigration
                            and finding jobs.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="our-test-item" style="height: 190px;">
                        <div class="ot-icon">
                            <img alt="" src="../assets/global/img/english/icon_h1_0.png">
                        </div>
                        <h3>Increase your English band score</h3>
                        <p>Using our online tests for English preparation is proven to help students improve by 0.5 - 1.5 .</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="col-md-12 section lasted-section">
        <div class="container">
            <div class="region region-content-middle">
                <section id="block-latestcollection-2" class="block block-iot-English block-latestcollection clearfix">
                    <div class="section-caption">
                        <span>Latest English test releases:</span>
                    </div>
                    <div class="book-home">
                        <div class="row row-fix">
                            @foreach ($lastedtest as $lasted)
                            <div class="col-md-3 col-sm-6 col-xs-12 col-fix">
                                <div class="book-item" style="height: 368px;">
                                    <a href="{{ asset('test/view/'.$lasted->id) }}">
                                        <img alt="" src="../assets/global/img/english/Recent_vol5_1.png"> 
                                        <h3> {{ $lasted->name }}</h3>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <div class="col-md-12 section about-section">
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
</div>
@endsection('content')