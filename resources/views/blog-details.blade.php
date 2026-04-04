<?php $page = 'blog-details'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['title' => 'Blogs', 'li_1' => 'Blog Details', 'li_2' => 'Blog Details'])
    @endcomponent

    <!-- Page Content -->
    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="blog-view">
                        <h3 class="mb-3">10 Tips for Maintaining a Healthy Lifestyle Year-Round</h3>
                        <div class="blog blog-single-post">
                            <div class="blog-image">
                                <a href="javascript:void(0);"><img alt="blog-image"
                                        src="{{URL::asset('build/img/blog/blog-list-01.jpg')}}" class="img-fluid"></a>
                            </div>
                            <div class="blog-info d-md-flex align-items-center justify-content-between flex-wrap">
                                <div class="post-left">
                                    <ul>
                                        <li><span class="badge badge-dark fs-14 fw-medium">Health Tips</span></li>
                                        <li><i class="isax isax-calendar"></i>4 Dec 2023</li>
                                        <li>
                                            <div class="post-author">
                                                <a href="{{url('doctor-profile')}}"><img
                                                        src="{{URL::asset('build/img/doctors/doctor-thumb-02.jpg')}}"
                                                        alt="Post Author"> <span>Dr. Darren Elder</span></a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="blog-views d-flex align-items-center justify-content-md-end">
                                    <span class="badge badge-outline-dark me-2"><i
                                            class="isax isax-message-text me-1"></i>25</span>
                                    <span class="badge badge-outline-primary"><i class="isax isax-eye me-1"></i>90</span>
                                </div>
                            </div>
                            <div class="blog-content">
                                <p>Maintaining a healthy lifestyle year-round is achievable with consistent habits that
                                    support your physical and mental well-being. One of the key pillars is staying hydrated,
                                    as water is essential for digestion, nutrient absorption, and overall bodily functions.
                                    Aim to drink at least eight glasses of water daily, adjusting for factors like weather
                                    and physical activity. A balanced diet is equally important, as it fuels your body with
                                    the nutrients it needs for energy, growth, and repair. Incorporate a variety of fruits,
                                    vegetables, lean proteins, and whole grains to ensure you’re getting a range of vitamins
                                    and minerals.</p>
                                <p>Regular physical activity is another cornerstone of a healthy lifestyle. Engaging in at
                                    least 150 minutes of moderate exercise per week, such as walking or cycling, can boost
                                    your cardiovascular health, strengthen muscles, and improve mood. Equally important is
                                    prioritizing sleep. Getting 7-9 hours of quality sleep each night helps regulate your
                                    mood, enhances mental clarity, and supports physical health. With these tips in mind,
                                    you’ll be on your way to maintaining a healthy lifestyle all year long.</p>
                                <p class="content-block">An extra important note to remember is that consistency is key.
                                    Small, sustainable changes in your daily habits will have a more lasting impact than
                                    short-term, extreme efforts. Prioritize gradual improvements in your routine and be
                                    patient with yourself - lasting health is a marathon, not a sprint.</p>
                            </div>
                        </div>
                        <h4 class="mb-3">About Author</h4>
                        <div class="about-author">
                            <div class="about-author-img">
                                <div class="author-img-wrap">
                                    <a href="{{url('doctor-profile')}}"><img class="img-fluid" alt="Darren Elder"
                                            src="{{URL::asset('build/img/doctors/doctor-thumb-02.jpg')}}"></a>
                                </div>
                            </div>
                            <div class="author-details">
                                <p class="mb-0">As a certified nutritionist and wellness coach, I’m passionate about helping
                                    others achieve a balanced lifestyle and lasting health. My journey into health started
                                    with my own desire to feel better physically and mentally, and along the way, I’ve
                                    learned the importance of consistency and small, sustainable changes. I love exploring
                                    new ways to stay active, experimenting with healthy meals, and sharing tips that are
                                    practical and realistic for people with busy lives.</p>
                            </div>
                        </div>
                        <h4 class="mb-3">Tags</h4>
                        <div class="d-flex align-items-center flex-wrap blog-tags gap-3 mb-4">
                            <a href="javascript:void(0);" class="badge">Health Tips</a>
                            <a href="javascript:void(0);" class="badge">Awareness</a>
                            <a href="javascript:void(0);" class="badge">Health</a>
                            <a href="javascript:void(0);" class="badge">Wellness</a>
                        </div>
                    </div>
                </div>

                <!-- Blog Sidebar -->
                <div class="col-lg-4 col-md-12 sidebar-right theiaStickySidebar">

                    <!-- Search -->
                    <div class="card search-widget">
                        <div class="card-body">
                            <form class="search-form">
                                <div class="input-group">
                                    <input type="text" placeholder="Search..." class="form-control">
                                    <button type="submit" class="btn btn-primary"><i
                                            class="isax isax-search-normal"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /Search -->

                    <!-- Categories -->
                    <div class="card category-widget">
                        <div class="card-body">
                            <h5 class="mb-3">Categories</h5>
                            <ul class="categories">
                                <li><a href="#">Health Care <span>(2)</span></a></li>
                                <li><a href="#">Nutritions <span>(4)</span></a></li>
                                <li><a href="#">Health Tips <span>(5)</span></a></li>
                                <li><a href="#">Medical Research <span>(4)</span></a></li>
                                <li><a href="#">Health Treatment <span>(6)</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /Categories -->

                    <!-- Latest Posts -->
                    <div class="card post-widget">
                        <div class="card-body">
                            <h5 class="mb-3">Latest News</h5>
                            <ul class="latest-posts">
                                <li>
                                    <div class="post-thumb">
                                        <a href="{{url('blog-details')}}">
                                            <img class="img-fluid" src="{{URL::asset('build/img/blog/blog-thumb-11.jpg')}}"
                                                alt="blog-image">
                                        </a>
                                    </div>
                                    <div class="post-info">
                                        <p>06 Nov 2024</p>
                                        <h4>
                                            <a href="{{url('blog-details')}}">Managing Chronic Conditions: Expert Advice for
                                                Better Living</a>
                                        </h4>
                                    </div>
                                </li>
                                <li>
                                    <div class="post-thumb">
                                        <a href="{{url('blog-details')}}">
                                            <img class="img-fluid" src="{{URL::asset('build/img/blog/blog-thumb-12.jpg')}}"
                                                alt="blog-image">
                                        </a>
                                    </div>
                                    <div class="post-info">
                                        <p>15 Nov 2024</p>
                                        <h4>
                                            <a href="{{url('blog-details')}}">Understanding Common Symptoms: When to See a
                                                Doctor</a>
                                        </h4>
                                    </div>
                                </li>
                                <li>
                                    <div class="post-thumb">
                                        <a href="{{url('blog-details')}}">
                                            <img class="img-fluid" src="{{URL::asset('build/img/blog/blog-thumb-13.jpg')}}"
                                                alt="blog-image">
                                        </a>
                                    </div>
                                    <div class="post-info">
                                        <p>08 Dec 2024</p>
                                        <h4>
                                            <a href="{{url('blog-details')}}">Nutrition and Wellness: A Guide to Balanced
                                                Eating</a>
                                        </h4>
                                    </div>
                                </li>
                                <li>
                                    <div class="post-thumb">
                                        <a href="{{url('blog-details')}}">
                                            <img class="img-fluid" src="{{URL::asset('build/img/blog/blog-thumb-14.jpg')}}"
                                                alt="blog-image">
                                        </a>
                                    </div>
                                    <div class="post-info">
                                        <p>17 Dec 2024</p>
                                        <h4>
                                            <a href="{{url('blog-details')}}">Top Preventive Health Measures Everyone Should
                                                Take</a>
                                        </h4>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /Latest Posts -->

                    <!-- Tags -->
                    <div class="card tags-widget">
                        <div class="card-body">
                            <h5 class="mb-3">Tags</h5>
                            <ul class="tags">
                                <li><a href="#" class="tag">Health Tips</a></li>
                                <li><a href="#" class="tag">Awareness</a></li>
                                <li><a href="#" class="tag">Health</a></li>
                                <li><a href="#" class="tag">Wellness</a></li>
                                <li><a href="#" class="tag">Treatments</a></li>
                                <li><a href="#" class="tag">Checkup</a></li>
                                <li><a href="#" class="tag">Prevention</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /Tags -->

                </div>
                <!-- /Blog Sidebar -->

            </div>
        </div>

    </div>
    <!-- /Page Content -->
@endsection