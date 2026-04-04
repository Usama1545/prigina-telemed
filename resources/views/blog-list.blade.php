<?php $page = 'blog-list'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['title' => 'Blogs', 'li_1' => 'Blog List', 'li_2' => 'Blog List'])
    @endcomponent

    <!-- Page Content -->
    <div class="content">
        <div class="container">

            <div class="row">

                <div class="col-lg-8 col-md-12">

                    <!-- Blog Post -->
                    <div class="blog">
                        <div class="blog-image">
                            <a href="{{url('blog-details')}}"><img class="img-fluid"
                                    src="{{URL::asset('build/img/blog/blog-list-01.jpg')}}" alt="Post Image"></a>
                            <span class="badge badge-cyan category-slug">Health Tips</span>
                        </div>
                        <div class="blog-content">
                            <ul class="entry-meta meta-item">
                                <li>
                                    <div class="post-author">
                                        <a href="{{url('doctor-profile')}}"><img
                                                src="{{URL::asset('build/img/patients/patient21.jpg')}}"
                                                alt="Post Author"><span>Arthur Hetzel</span></a>
                                    </div>
                                </li>
                                <li><i class="isax isax-calendar-1 me-1"></i>4 Dec 2024</li>
                            </ul>
                            <h3 class="blog-title"><a href="{{url('blog-details')}}">10 Tips for Maintaining a Healthy
                                    Lifestyle Year-Round</a></h3>
                            <p class="mb-0">Discover practical, everyday tips to help you stay healthy throughout the year.
                            </p>
                        </div>
                    </div>
                    <!-- /Blog Post -->

                    <!-- Blog Post -->
                    <div class="blog">
                        <div class="blog-image">
                            <a href="{{url('blog-details')}}"><img class="img-fluid"
                                    src="{{URL::asset('build/img/blog/blog-list-02.jpg')}}" alt="blog-image"></a>
                            <span class="badge badge-cyan category-slug">Technology</span>
                        </div>
                        <div class="blog-content">
                            <ul class="entry-meta meta-item">
                                <li>
                                    <div class="post-author">
                                        <a href="{{url('doctor-profile')}}"><img
                                                src="{{URL::asset('build/img/patients/patient13.jpg')}}"
                                                alt="Post Author"><span>Teresa Baxter</span></a>
                                    </div>
                                </li>
                                <li><i class="isax isax-calendar-1 me-1"></i>22 Jun 2024</li>
                            </ul>
                            <h3 class="blog-title"><a href="{{url('blog-details')}}">Advancements in Medical Technology:
                                    What’s New in Healthcare?</a></h3>
                            <p class="mb-0">From AI in diagnostics to cutting-edge treatments, discover how innovation is
                                use in healthcare.</p>
                        </div>
                    </div>
                    <!-- /Blog Post -->

                    <!-- Blog Post -->
                    <div class="blog">
                        <div class="blog-image">
                            <a href="{{url('blog-details')}}"><img class="img-fluid"
                                    src="{{URL::asset('build/img/blog/blog-list-03.jpg')}}" alt="Post Image"></a>
                            <span class="badge badge-cyan category-slug">Awareness</span>
                        </div>
                        <div class="blog-content">
                            <ul class="entry-meta meta-item">
                                <li>
                                    <div class="post-author">
                                        <a href="{{url('doctor-profile')}}"><img
                                                src="{{URL::asset('build/img/patients/patient20.jpg')}}"
                                                alt="Post Author"><span>Robin Frost</span></a>
                                    </div>
                                </li>
                                <li><i class="isax isax-calendar-1 me-1"></i>14 Apr 2024</li>
                            </ul>
                            <h3 class="blog-title"><a href="{{url('blog-details')}}">Understanding Common Symptoms: When to
                                    See a Doctor</a></h3>
                            <p class="mb-0">Learn how to identify common symptoms and when it's important to seek medical
                                attention.</p>
                        </div>
                    </div>
                    <!-- /Blog Post -->


                    <!-- Blog Pagination -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Pagination -->
                            <div class="pagination dashboard-pagination mt-md-3 mt-0 mb-4">
                                <ul>
                                    <li>
                                        <a href="#" class="page-link prev">Prev</a>
                                    </li>
                                    <li>
                                        <a href="#" class="page-link">1</a>
                                    </li>
                                    <li>
                                        <a href="#" class="page-link active">2</a>
                                    </li>
                                    <li>
                                        <a href="#" class="page-link">3</a>
                                    </li>
                                    <li>
                                        <a href="#" class="page-link">4</a>
                                    </li>
                                    <li>
                                        <a href="#" class="page-link next">Next</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /Pagination -->
                        </div>
                    </div>
                    <!-- /Blog Pagination -->

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