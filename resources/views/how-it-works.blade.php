@extends('layouts.mainlayout')

@section('content')

<!-- HEADER -->
<section class="py-5 text-center bg-light">
    <div class="container">
        <h1 class="fw-bold mb-3 text-primary">How It Works</h1>
        <p class="text-muted">
            PriGina Global Telemed makes it simple to get an expert second medical opinion
            from trusted specialists around the world.
        </p>
    </div>
</section>


<!-- STEPS -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center text-center g-4">

            <!-- STEP 1 -->
            <div class="col-md-2">
                <div class="step-card h-100 p-4 position-relative">
                    <span class="step-badge">1</span>

                    <div class="step-icon">
                        <i class="fi fi-rr-upload"></i>
                    </div>

                    <h6 class="fw-semibold mt-3">Submit Your Case</h6>
                    <p class="text-muted small">
                        Share your medical information securely by uploading your records.
                    </p>
                </div>
            </div>

            <!-- STEP 2 -->
            <div class="col-md-2">
                <div class="step-card h-100 p-4 position-relative">
                    <span class="step-badge">2</span>

                    <div class="step-icon">
                        <i class="fi fi-rr-user-md"></i>
                    </div>

                    <h6 class="fw-semibold mt-3">
                        Choose or Get Matched with a Specialist
                    </h6>
                    <p class="text-muted small">
                        Select a physician or let us match you automatically.
                    </p>
                </div>
            </div>

            <!-- STEP 3 -->
            <div class="col-md-2">
                <div class="step-card h-100 p-4 position-relative">
                    <span class="step-badge">3</span>

                    <div class="step-icon">
                        <i class="fi fi-rr-file-medical"></i>
                    </div>

                    <h6 class="fw-semibold mt-3">Receive Second Opinion</h6>
                    <p class="text-muted small">
                        Get a detailed expert review with recommendations.
                    </p>
                </div>
            </div>

            <!-- STEP 4 -->
            <div class="col-md-2">
                <div class="step-card h-100 p-4 position-relative">
                    <span class="step-badge">4</span>

                    <div class="step-icon">
                        <i class="fi fi-rr-video-camera"></i>
                    </div>

                    <h6 class="fw-semibold mt-3">Optional Video Discussion</h6>
                    <p class="text-muted small">
                        Schedule a video call for further clarity.
                    </p>
                </div>
            </div>

            <!-- STEP 5 -->
            <div class="col-md-2">
                <div class="step-card h-100 p-4 position-relative">
                    <span class="step-badge">5</span>

                    <div class="step-icon">
                        <i class="fi fi-rr-heart"></i>
                    </div>

                    <h6 class="fw-semibold mt-3">Make Informed Decisions</h6>
                    <p class="text-muted small">
                        Use expert advice to plan your next steps.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- FEATURES STRIP -->
<section class="py-4">
    <div class="container">
        <div class="row g-3 feature-strip text-center">

            <div class="col-md-3">
                <div class="feature-box">
                    <i class="fi fi-rr-shield-check"></i>
                    <h6>Secure & Confidential</h6>
                    <p class="text-muted small">Your data privacy is our top priority.</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="feature-box">
                    <i class="fi fi-rr-globe"></i>
                    <h6>Global Access</h6>
                    <p class="text-muted small">Connect with specialists worldwide.</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="feature-box">
                    <i class="fi fi-rr-award"></i>
                    <h6>Trusted Specialists</h6>
                    <p class="text-muted small">Board-certified experienced doctors.</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="feature-box">
                    <i class="fi fi-rr-clock"></i>
                    <h6>Convenient & Easy</h6>
                    <p class="text-muted small">Simple process designed for you.</p>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- DISCLAIMER -->
<section class="py-4">
    <div class="container">
        <div class="disclaimer d-flex align-items-center mx-5">
            <i class="fi fi-rr-info"></i>
            <p class="mb-0 ms-3 small">
                PriGina Global Telemed provides second medical opinions for informational
                purposes only and does not replace your primary physician.
            </p>
        </div>
    </div>
</section>
<style>
    /* STEP CARD */
.step-card {
    border: 1px solid #eee;
    border-radius: 12px;
    background: #fff;
    transition: 0.3s;
}

.step-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.05);
}

/* NUMBER BADGE */
.step-badge {
    position: absolute;
    top: -12px;
    left: 50%;
    transform: translateX(-50%);
    background: var(--secondary);
    color: #fff;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* ICON */
.step-icon {
    font-size: 40px;
    color: var(--secondary);
}

/* FEATURE STRIP */
.feature-strip {
    background: #f8f9fb;
    border-radius: 12px;
    padding: 20px;
}

.feature-box i {
    font-size: 28px;
    color: var(--secondary);
    margin-bottom: 10px;
}

/* DISCLAIMER */
.disclaimer {
    background: #f1f5f9;
    padding: 12px 20px;
    border-radius: 8px;
}

.disclaimer i {
    font-size: 20px;
    color: var(--secondary);
}
</style>
@endsection