<?php $page = 'privacy-policy'; ?>
@extends('layouts.mainlayout')

@section('content')
    @component('components.breadcrumb', [
        'li_1' => __('app.legal.terms_conditions'),
        'li_2' => __('app.legal.terms_conditions'),
        'title' => __('app.legal.terms_conditions'),
    ])
    @endcomponent

    <div class="terms-section py-5">
        <div class="container">
            @include('legal.partials.translation-notice')
            @includeFirst(['legal.' . app()->getLocale() . '.terms-conditions', 'legal.en.terms-conditions'])
        </div>
    </div>
@endsection
