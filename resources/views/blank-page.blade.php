<?php $page = 'blank-page'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['title' => 'Pages', 'li_1' => 'Blank Page', 'li_2' => 'Blank Page'])
    @endcomponent

    <!-- Page Content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h5>Blank Page</h5>
                </div>
            </div>
        </div>

    </div>
    <!-- /Page Content -->
@endsection