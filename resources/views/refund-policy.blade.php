<?php $page = 'privacy-policy'; ?>
@extends('layouts.mainlayout')

@section('content')
    @component('components.breadcrumb', ['li_1' => __('app.legal.risk_disclaimer'), 'li_2' => __('app.legal.risk_disclaimer'), 'title' => __('app.legal.risk_disclaimer')])
    @endcomponent

    <div class="terms-section py-5">
        <div class="container">
            @include('legal.partials.translation-notice')
            @includeFirst(['legal.' . app()->getLocale() . '.refund-policy', 'legal.en.refund-policy'])
        </div>
    </div>
@endsection
