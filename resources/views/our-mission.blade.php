<?php $page = 'our-mission'; ?>
@extends('layouts.mainlayout')

@section('content')

@component('components.breadcrumb', ['li_1' => __('app.our_mission.title'), 'li_2' => __('app.our_mission.title'), 'title' => __('app.our_mission.title')])
@endcomponent

<!-- Our Mission -->
<div class="terms-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <!-- Header -->
                <div class="terms-text mb-4">
                    <h2 class="text-primary fw-bold">{{ __('app.our_mission.title') }}</h2>

                    <p>
                        {{ __('app.our_mission.p1') }}
                    </p>

                    <p>
                        {{ __('app.our_mission.p2') }}
                    </p>

                    <p>
                        {{ __('app.our_mission.p3') }}
                    </p>

                    <p>
                        {{ __('app.our_mission.p4') }}
                    </p>

                    <p>
                        {{ __('app.our_mission.p5') }}
                    </p>

                    <p>
                        <strong>{{ __('app.our_mission.tagline') }}</strong>
                    </p>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- /Our Mission -->

@endsection
