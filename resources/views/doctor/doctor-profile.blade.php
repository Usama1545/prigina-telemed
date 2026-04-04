<?php $page = 'doctor-profile'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['title' => 'Doctor', 'li_1' => 'Doctor Profile', 'li_2' => 'Doctor Profile'])
    @endcomponent

    <!-- Page Content -->
    <div class="content">
        <div class="container">

            <!-- Doctor Widget -->
            <div class="card doc-profile-card">
                <div class="card-body">
                    <div class="doctor-widget doctor-profile-two">
                        <div class="doc-info-left">
                            <div class="doctor-img">
                                <img src="{{URL::asset('build/img/doctors/doc-profile-02.jpg')}}" class="img-fluid"
                                    alt="User Image">
                            </div>
                            <div class="doc-info-cont">
                                <span class="badge doc-avail-badge"><i class="fa-solid fa-circle"></i>Available </span>
                                <h4 class="doc-name">Dr.Martin Adian <img
                                        src="{{URL::asset('build/img/icons/badge-check.svg')}}" alt="Img"><span
                                        class="badge doctor-role-badge"><i class="fa-solid fa-circle"></i>Dentist</span>
                                </h4>
                                <p>BDS, MDS - Oral & Maxillofacial Surgery</p>
                                <p>Speaks : English, French, German</p>
                                <p class="address-detail"><span class="loc-icon"><i class="feather-map-pin"></i></span>No
                                    14, 15th Cross, Old Trafford, UK <span class="view-text">( View Location )</span></p>
                            </div>
                        </div>
                        <div class="doc-info-right">
                            <ul class="doctors-activities">
                                <li>
                                    <div class="hospital-info">
                                        <span class="list-icon"><img src="{{URL::asset('build/img/icons/watch-icon.svg')}}"
                                                alt="Img"></span>
                                        <p>Full Time, Online Therapy Available</p>
                                    </div>
                                    <ul class="sub-links">
                                        <li><a href="#"><i class="feather-heart"></i></a></li>
                                        <li><a href="#"><i class="feather-share-2"></i></a></li>
                                        <li><a href="#"><i class="feather-link"></i></a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="hospital-info">
                                        <span class="list-icon"><img src="{{URL::asset('build/img/icons/thumb-icon.svg')}}"
                                                alt="Img"></span>
                                        <p><b>94% </b> Recommended</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="hospital-info">
                                        <span class="list-icon"><img
                                                src="{{URL::asset('build/img/icons/building-icon.svg')}}" alt="Img"></span>
                                        <p>Royal Prince Alfred Hospital</p>
                                    </div>
                                    <h5 class="accept-text"><span><i class="feather-check"></i></span>Accepting New Patients
                                    </h5>
                                </li>
                                <li>
                                    <div class="rating">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <span>5.0</span>
                                        <a href="#" class="d-inline-block average-rating">150 Reviews</a>
                                    </div>
                                    <ul class="contact-doctors">
                                        <li><a href="{{url('chat-doctor')}}"><span><img
                                                        src="{{URL::asset('build/img/icons/device-message2.svg')}}"
                                                        alt="Img"></span>Chat</a></li>
                                        <li><a href="{{url('voice-call')}}"><span class="bg-violet"><i
                                                        class="feather-phone-forwarded"></i></span>Audio Call</a></li>
                                        <li><a href="{{url('video-call')}}"><span class="bg-indigo"><i
                                                        class="fa-solid fa-video"></i></span>Video Call</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="doc-profile-card-bottom">
                        <ul>
                            <li>
                                <span class="bg-blue"><img src="{{URL::asset('build/img/icons/calendar3.svg')}}"
                                        alt="Img"></span>
                                Nearly 200+ Appointment Booked
                            </li>
                            <li>
                                <span class="bg-dark-blue"><img src="{{URL::asset('build/img/icons/bullseye.svg')}}"
                                        alt="Img"></span>
                                In Practice for 21 Years
                            </li>
                            <li>
                                <span class="bg-green"><img src="{{URL::asset('build/img/icons/bookmark-star.svg')}}"
                                        alt="Img"></span>
                                15+ Awards
                            </li>
                        </ul>
                        <div class="bottom-book-btn">
                            <p><span>Price : $100 - $200 </span> for a Session</p>
                            <div class="clinic-booking">
                                <a class="apt-btn" href="{{url('booking')}}">Book Appointment</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Doctor Widget -->

            <div class="doctors-detailed-info">
                <ul class="information-title-list">
                    <li class="active">
                        <a href="#doc_bio">Doctor Bio</a>
                    </li>
                    <li>
                        <a href="#experience">Experience</a>
                    </li>
                    <li>
                        <a href="#insurence">Insurances</a>
                    </li>
                    <li>
                        <a href="#services">Treatments</a>
                    </li>
                    <li>
                        <a href="#speciality">Speciality</a>
                    </li>
                    <li>
                        <a href="#availability">Availability</a>
                    </li>
                    <li>
                        <a href="#clinic">Clinics</a>
                    </li>
                    <li>
                        <a href="#membership">Memberships</a>
                    </li>
                    <li>
                        <a href="#awards">Awards</a>
                    </li>
                    <li>
                        <a href="#bussiness_hour">Business Hours</a>
                    </li>
                    <li>
                        <a href="#review">Review</a>
                    </li>
                </ul>
                <div class="doc-information-main">
                    <div class="doc-information-details bio-detail" id="doc_bio">
                        <div class="detail-title">
                            <h4>Doctor Bio</h4>
                        </div>
                        <p>“Highly motivated and experienced doctor with a passion for
                            providing excellent care to patients. Experienced in a wide variety of
                            medical settings, with particular expertise in diagnostics, primary care and emergency
                            medicine. Skilled in using the latest technology to streamline patient care. Committed to
                            delivering compassionate, personalized care to each and every patient.”
                        </p>
                        <a href="#" class="show-more d-flex align-items-center">See More<i
                                class="fa-solid fa-chevron-down ms-2"></i></a>
                    </div>
                    <div class="doc-information-details" id="experience">
                        <div class="detail-title">
                            <h4>Practice Experience</h4>
                        </div>
                        <div class="experience-info">
                            <div class="experience-logo">
                                <span><img src="{{URL::asset('build/img/icons/experience-logo-01.svg')}}" alt="Img"></span>
                            </div>
                            <div class="experience-content">
                                <h5>Cambridge University Hospital, NHS Foundation Trust Cambridge</h5>
                                <ul class="ent-list">
                                    <li>ENT </li>
                                    <li>Cambridge</li>
                                </ul>
                                <ul class="date-list">
                                    <li>Dec 2020 - Jan 2022 </li>
                                    <li>2 Years 2 months</li>
                                </ul>
                                <p>Experienced in a wide variety of medical settings, with particular expertise in
                                    diagnostics, primary care and emergency medicine.</p>
                            </div>
                        </div>
                        <div class="experience-info">
                            <div class="experience-logo">
                                <span><img src="{{URL::asset('build/img/icons/experience-logo-02.svg')}}" alt="Img"></span>
                            </div>
                            <div class="experience-content mb-0">
                                <h5>Hill Medical Hospital, Newcastle</h5>
                                <ul class="ent-list">
                                    <li>ENT </li>
                                    <li>Cambridge</li>
                                </ul>
                                <ul class="date-list">
                                    <li>Dec 2022 - Jan 2022 </li>
                                    <li>1 Years 1 months</li>
                                </ul>
                                <p>Experienced in a wide variety of medical settings, with particular expertise in
                                    diagnostics, primary care and emergency medicine.</p>
                            </div>
                        </div>
                    </div>
                    <div class="doc-information-details" id="insurence">
                        <div class="detail-title slider-nav d-flex justify-content-between align-items-center">
                            <h4>Insurance Accepted (6)</h4>
                            <div class="nav nav-container slide-1"></div>
                        </div>
                        <div class="insurence-logo-slider owl-carousel">
                            <div class="insurence-logo">
                                <span><img src="{{URL::asset('build/img/icons/insurence-logo-01.svg')}}" alt="Img"></span>
                            </div>
                            <div class="insurence-logo">
                                <span><img src="{{URL::asset('build/img/icons/insurence-logo-02.svg')}}" alt="Img"></span>
                            </div>
                            <div class="insurence-logo">
                                <span><img src="{{URL::asset('build/img/icons/insurence-logo-03.svg')}}" alt="Img"></span>
                            </div>
                            <div class="insurence-logo">
                                <span><img src="{{URL::asset('build/img/icons/insurence-logo-04.svg')}}" alt="Img"></span>
                            </div>
                            <div class="insurence-logo">
                                <span><img src="{{URL::asset('build/img/icons/insurence-logo-05.svg')}}" alt="Img"></span>
                            </div>
                            <div class="insurence-logo">
                                <span><img src="{{URL::asset('build/img/icons/insurence-logo-06.svg')}}" alt="Img"></span>
                            </div>
                            <div class="insurence-logo">
                                <span><img src="{{URL::asset('build/img/icons/insurence-logo-03.svg')}}" alt="Img"></span>
                            </div>
                            <div class="insurence-logo">
                                <span><img src="{{URL::asset('build/img/icons/insurence-logo-04.svg')}}" alt="Img"></span>
                            </div>
                        </div>
                    </div>
                    <div class="doc-information-details" id="speciality">
                        <div class="detail-title">
                            <h4>Speciality</h4>
                        </div>
                        <ul class="special-links">
                            <li><a href="#">Orthopedic Consultation</a></li>
                            <li><a href="#">Delivery Blocks</a></li>
                            <li><a href="#">Ultrasound Injection</a></li>
                            <li><a href="#">Tooth Bleaching</a></li>
                            <li><a href="#">Tooth Bleaching</a></li>
                            <li><a href="#">Cosmetic</a></li>
                        </ul>
                    </div>
                    <div class="doc-information-details" id="services">
                        <div class="detail-title">
                            <h4>Services & Pricing</h4>
                        </div>
                        <ul class="special-links">
                            <li><a href="#">Orthopedic Consultation <span>$52</span></a></li>
                            <li><a href="#">Delivery Blocks <span>$24</span></a></li>
                            <li><a href="#">Ultrasound Injection <span>$31</span></a></li>
                            <li><a href="#">Tooth Bleaching <span>$20</span></a></li>
                            <li><a href="#">Tooth Bleaching <span>$15</span></a></li>
                            <li><a href="#">Cosmetic <span>$10</span></a></li>
                        </ul>
                    </div>
                    <div class="doc-information-details" id="availability">
                        <div class="detail-title slider-nav d-flex justify-content-between align-items-center">
                            <h4>Availability</h4>
                            <div class="nav nav-container slide-2"></div>
                        </div>
                        <div class="availability-slots-slider owl-carousel">
                            <div class="availability-date">
                                <div class="book-date">
                                    <h6>Wed Feb 2024</h6>
                                    <span>01:00 - 02:00 PM</span>
                                </div>
                            </div>
                            <div class="availability-date">
                                <div class="book-date">
                                    <h6>Wed Feb 2024</h6>
                                    <span>01:00 - 02:00 PM</span>
                                </div>
                            </div>
                            <div class="availability-date">
                                <div class="book-date">
                                    <h6>Wed Feb 2024</h6>
                                    <span>01:00 - 02:00 PM</span>
                                </div>
                            </div>
                            <div class="availability-date">
                                <div class="book-date">
                                    <h6>Wed Feb 2024</h6>
                                    <span>01:00 - 02:00 PM</span>
                                </div>
                            </div>
                            <div class="availability-date">
                                <div class="book-date">
                                    <h6>Wed Feb 2024</h6>
                                    <span>01:00 - 02:00 PM</span>
                                </div>
                            </div>
                            <div class="availability-date">
                                <div class="book-date">
                                    <h6>Wed Feb 2024</h6>
                                    <span>01:00 - 02:00 PM</span>
                                </div>
                            </div>
                            <div class="availability-date">
                                <div class="book-date">
                                    <h6>Wed Feb 2024</h6>
                                    <span>01:00 - 02:00 PM</span>
                                </div>
                            </div>
                            <div class="availability-date">
                                <div class="book-date">
                                    <h6>Wed Feb 2024</h6>
                                    <span>01:00 - 02:00 PM</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="doc-information-details" id="clinic">
                        <div class="detail-title">
                            <h4>Clinics & Locations</h4>
                        </div>
                        <div class="clinic-loc">
                            <div class="row align-items-center">
                                <div class="col-lg-7">
                                    <div class="clinic-info">
                                        <div class="clinic-img"><img src="{{URL::asset('build/img/clinic/clinic-11.jpg')}}"
                                                alt="Img"></div>
                                        <div class="detail-clinic">
                                            <h5>Sofi’s Clinic - </h5>
                                            <span>$350 / Apponitment</span>
                                            <p>2286 Sundown Lane, Old Trafford 24541, UK</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center avail-time-slot">
                                        <div class="availability-date">
                                            <div class="book-date">
                                                <h6>Monday</h6>
                                                <span>07:00 AM - 09:00 PM</span>
                                            </div>
                                        </div>
                                        <div class="availability-date">
                                            <div class="book-date">
                                                <h6>Tuesday</h6>
                                                <span>07:00 AM - 09:00 PM</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="contact-map d-flex">
                                        <iframe
                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3193.7301009561315!2d-76.13077892422932!3d36.82498697224007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89bae976cfe9f8af%3A0xa61eac05156fbdb9!2sBeachStreet%20USA!5e0!3m2!1sen!2sin!4v1669777904208!5m2!1sen!2sin"
                                            allowfullscreen="" loading="lazy"
                                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clinic-loc mb-0">
                            <div class="row align-items-center">
                                <div class="col-lg-7">
                                    <div class="clinic-info">
                                        <div class="clinic-img"><img src="{{URL::asset('build/img/clinic/clinic-12.jpg')}}"
                                                alt="Img"></div>
                                        <div class="detail-clinic">
                                            <h5>The Family Dentistry Clinic </h5>
                                            <span>$550 / Apponitment</span>
                                            <p>MDS - Periodontology and Oral Implantology, BDS</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center avail-time-slot">
                                        <div class="availability-date">
                                            <div class="book-date">
                                                <h6>Friday</h6>
                                                <span>07:00 AM - 09:00 PM</span>
                                            </div>
                                        </div>
                                        <div class="availability-date">
                                            <div class="book-date">
                                                <h6>Saturday</h6>
                                                <span>07:00 AM - 09:00 PM</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="contact-map d-flex">
                                        <iframe
                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3193.7301009561315!2d-76.13077892422932!3d36.82498697224007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89bae976cfe9f8af%3A0xa61eac05156fbdb9!2sBeachStreet%20USA!5e0!3m2!1sen!2sin!4v1669777904208!5m2!1sen!2sin"
                                            allowfullscreen="" loading="lazy"
                                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="doc-information-details" id="membership">
                        <div class="detail-title">
                            <h4>Membership</h4>
                        </div>
                        <div class="member-ship-info">
                            <span class="mem-check"><i class="fa-solid fa-check"></i></span>
                            <p>Affiliate members include related allied health professionals- evidence based
                                (Dietitians, Physiotherapist, Occupational therapist and Clinical Psychologist) who will
                                team up with allopathic physicians to
                                support the Lifestyle Medicine movement in India through ISLM.
                            </p>
                        </div>
                        <div class="member-ship-info mb-0">
                            <span class="mem-check"><i class="fa-solid fa-check"></i></span>
                            <p>Physician members include the allopathic doctors only (MBBS, MD, MS, DM, MCH, DNB or
                                equivalent degree)
                                who hold a valid medical license as recognized by the Medical Council of India.
                            </p>
                        </div>
                    </div>
                    <div class="doc-information-details" id="awards">
                        <div class="detail-title slider-nav d-flex justify-content-between align-items-center">
                            <h4>Awards</h4>
                            <div class="nav nav-container slide-3"></div>
                        </div>
                        <div class="awards-slider owl-carousel">
                            <div class="award-card">
                                <div class="award-card-info">
                                    <span><img src="{{URL::asset('build/img/icons/bookmark-star.svg')}}" alt="Img"></span>
                                    <h5>Award Name (2021)</h5>
                                    <p>evidence based (Dietitians, Physiotherapist, Occupational therapist and Clinical)</p>
                                </div>
                            </div>
                            <div class="award-card">
                                <div class="award-card-info">
                                    <span><img src="{{URL::asset('build/img/icons/bookmark-star.svg')}}" alt="Img"></span>
                                    <h5>Award Name (2022)</h5>
                                    <p>evidence based (Dietitians, Physiotherapist, Occupational therapist and Clinical)</p>
                                </div>
                            </div>
                            <div class="award-card">
                                <div class="award-card-info">
                                    <span><img src="{{URL::asset('build/img/icons/bookmark-star.svg')}}" alt="Img"></span>
                                    <h5>Award Name (2023)</h5>
                                    <p>evidence based (Dietitians, Physiotherapist, Occupational therapist and Clinical)</p>
                                </div>
                            </div>
                            <div class="award-card">
                                <div class="award-card-info">
                                    <span><img src="{{URL::asset('build/img/icons/bookmark-star.svg')}}" alt="Img"></span>
                                    <h5>Award Name (2024)</h5>
                                    <p>evidence based (Dietitians, Physiotherapist, Occupational therapist and Clinical)</p>
                                </div>
                            </div>
                            <div class="award-card">
                                <div class="award-card-info">
                                    <span><img src="{{URL::asset('build/img/icons/bookmark-star.svg')}}" alt="Img"></span>
                                    <h5>Award Name (2020)</h5>
                                    <p>evidence based (Dietitians, Physiotherapist, Occupational therapist and Clinical)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="doc-information-details" id="bussiness_hour">
                        <div class="detail-title">
                            <h4>Business Hours</h4>
                        </div>
                        <div class="hours-business">
                            <ul>
                                <li>
                                    <div class="today-hours">
                                        <h6>Today</h6>
                                        <span>5 Feb 2024</span>
                                    </div>
                                    <div class="availed">
                                        <span class="badge doc-avail-badge"><i class="fa-solid fa-circle"></i>Available
                                        </span>
                                        <p>07:00 AM - 09:00 PM</p>
                                    </div>
                                </li>
                                <li>
                                    <h6>Monday</h6>
                                    <p>07:00 AM - 09:00 PM</p>
                                </li>
                                <li>
                                    <h6>Tuesday</h6>
                                    <p>07:00 AM - 09:00 PM</p>
                                </li>
                                <li>
                                    <h6>Wednesday</h6>
                                    <p>07:00 AM - 09:00 PM</p>
                                </li>
                                <li>
                                    <h6>Thursday</h6>
                                    <p>07:00 AM - 09:00 PM</p>
                                </li>
                                <li>
                                    <h6>Friday</h6>
                                    <p>07:00 AM - 09:00 PM</p>
                                </li>
                                <li>
                                    <h6>Saturday</h6>
                                    <p>07:00 AM - 09:00 PM</p>
                                </li>
                                <li>
                                    <h6>Sunday</h6>
                                    <p>07:00 AM - 09:00 PM</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="doc-information-details" id="review">
                        <div class="detail-title">
                            <h4>Reviews (200)</h4>
                        </div>
                        <div class="doc-review-card">
                            <div class="user-info-review">
                                <div class="reviewer-img">
                                    <a href="#" class="avatar-img"><img
                                            src="{{URL::asset('build/img/clients/client-13.jpg')}}" alt="Img"></a>
                                    <div class="review-star">
                                        <a href="#">kadajsalamander</a>
                                        <div class="rating">
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <span>5.0 | 2 days ago</span>
                                        </div>
                                    </div>
                                </div>
                                <span class="thumb-icon"><i class="fa-regular fa-thumbs-up"></i>Yes,Recommend for
                                    Appointment</span>
                            </div>
                            <p>Thank you for this informative article! I've had a couple of hit-and-miss experiences with
                                freelancers in the past, and I realize now that I wasn't vetting them properly. Your
                                checklist
                                for choosing the right freelancer is going to be my go-to from now on
                            </p>
                            <a href="#" class="reply d-flex align-items-center"><i
                                    class="fa-solid fa-reply me-2"></i>Reply</a>
                        </div>
                        <div class="doc-review-card">
                            <div class="user-info-review">
                                <div class="reviewer-img">
                                    <a href="#" class="avatar-img"><img
                                            src="{{URL::asset('build/img/clients/client-14.jpg')}}" alt="Img"></a>
                                    <div class="review-star">
                                        <a href="#">Dane jose</a>
                                        <div class="rating">
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <span>5.0 | 1 Months ago</span>
                                        </div>
                                    </div>
                                </div>
                                <span class="thumb-icon"><i class="fa-regular fa-thumbs-up"></i>Yes,Recommend for
                                    Appointment</span>
                            </div>
                            <p>As a freelancer myself, I find this article spot on! It's important for clients to
                                understand what to look for in a freelancer and how to foster a good working relationship.
                                The point about mutual respect
                                and clear communication is key in my experience. Well done
                            </p>
                            <a href="#" class="reply d-flex align-items-center"><i
                                    class="fa-solid fa-reply me-2"></i>Reply</a>
                        </div>
                        <div class="doc-review-card mb-0">
                            <div class="user-info-review">
                                <div class="reviewer-img">
                                    <a href="#" class="avatar-img"><img
                                            src="{{URL::asset('build/img/clients/client-15.jpg')}}" alt="Img"></a>
                                    <div class="review-star">
                                        <a href="#">Dane jose</a>
                                        <div class="rating">
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <span>5.0 | 15 days ago</span>
                                        </div>
                                    </div>
                                </div>
                                <span class="thumb-icon"><i class="fa-regular fa-thumbs-up"></i>Yes,Recommend for
                                    Appointment</span>
                            </div>
                            <p>Great article! I've bookmarked it for future reference. I'd love to read more about managing
                                long-term relationships with freelancers, if you have any tips on that.
                            </p>
                            <a href="#" class="reply d-flex align-items-center"><i
                                    class="fa-solid fa-reply me-2"></i>Reply</a>
                            <div class="replied-info">
                                <div class="user-info-review">
                                    <div class="reviewer-img">
                                        <a href="#" class="avatar-img"><img
                                                src="{{URL::asset('build/img/clients/client-16.jpg')}}" alt="Img"></a>
                                        <div class="review-star">
                                            <a href="#">Robert Hollenbeck</a>
                                        </div>
                                    </div>
                                </div>
                                <p>Thank you for your comment and I will try to make a another post on that topic.
                                </p>
                                <a href="#" class="reply d-flex align-items-center"><i
                                        class="fa-solid fa-reply me-2"></i>Reply</a>
                            </div>
                            <!-- Pagination -->
                            <div class="pagination dashboard-pagination">
                                <ul>
                                    <li>
                                        <a href="#" class="page-link prev-link"><i
                                                class="fa-solid fa-chevron-left me-2"></i>Prev</a>
                                    </li>
                                    <li>
                                        <a href="#" class="page-link active">1</a>
                                    </li>
                                    <li>
                                        <a href="#" class="page-link">2</a>
                                    </li>
                                    <li>
                                        <a href="#" class="page-link">3</a>
                                    </li>
                                    <li>
                                        <a href="#" class="page-link">4</a>
                                    </li>
                                    <li>
                                        <a href="#" class="page-link">5</a>
                                    </li>
                                    <li>
                                        <a href="#" class="page-link">6</a>
                                    </li>
                                    <li>
                                        <a href="#" class="page-link next-link">Next<i
                                                class="fa-solid fa-chevron-right ms-2"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /Pagination -->
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /Page Content -->
@endsection