<?php $page = 'privacy-policy'; ?>
@extends('layouts.mainlayout')

@section('content')
    @component('components.breadcrumb', ['li_1' => __('app.legal.privacy_policy'), 'li_2' => __('app.legal.privacy_policy')])
    @endcomponent

    <div class="terms-section py-5">
        <div class="container">
            @include('legal.partials.translation-notice')
            @includeFirst(['legal.' . app()->getLocale() . '.privacy-policy', 'legal.en.privacy-policy'])
        </div>
    </div>
@endsection
