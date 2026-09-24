<?php $page = 'legal-notice'; ?>
@extends('layouts.mainlayout')

@section('content')
    @component('components.breadcrumb', ['li_1' => __('app.legal.legal_notice'), 'li_2' => __('app.legal.legal_notice'), 'title' => __('app.legal.legal_notice')])
    @endcomponent

    <div class="terms-section py-5">
        <div class="container">
            @include('legal.partials.translation-notice')
            @includeFirst(['legal.' . app()->getLocale() . '.legal-notice', 'legal.en.legal-notice'])
        </div>
    </div>
@endsection
