<?php $page = 'reviews'; ?>
@extends('admin.layout.mainlayout')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Reviews</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Reviews</li>
                    </ul>
                </div>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="datatable table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>Patient Name</th>
                                        <th>Doctor Name</th>
                                        <th>Ratings</th>
                                        <th>Description</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($reviews as $review)
                                        @php
                                            $rating = max(0, min(5, (int) round($review['rating'] ?? 0)));
                                            $patientPhoto = $review['patientPhotoUrl'] ?? URL::asset('build/admin/img/patients/patient1.jpg');
                                            $doctorPhoto = $review['doctorPhotoUrl'] ?? URL::asset('build/admin/img/doctors/doctor-thumb-01.jpg');
                                            $date = $review['createdAt'] ?? $review['date'] ?? null;
                                        @endphp
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{ url('admin/profile') }}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{ $patientPhoto }}" alt="Patient Image"></a>
                                                    <a href="{{ url('admin/profile') }}">{{ $review['patientName'] ?? 'Patient' }}</a>
                                                </h2>
                                            </td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{ url('admin/profile') }}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{ $doctorPhoto }}" alt="Doctor Image"></a>
                                                    <a href="{{ url('admin/profile') }}">{{ $review['doctorName'] ?? 'Doctor' }}</a>
                                                </h2>
                                            </td>
                                            <td>
                                                @for($i = 1; $i <= 5; $i++)
                                                    <i class="fe {{ $rating >= $i ? 'fe-star text-warning' : 'fe-star-o text-secondary' }}"></i>
                                                @endfor
                                            </td>
                                            <td>{{ $review['comment'] ?? $review['description'] ?? '-' }}</td>
                                            <td>{{ $date ? \Carbon\Carbon::parse($date)->format('d M Y') : '-' }}</td>
                                            <td>
                                                <form method="POST" action="{{ route('admin.reviews.delete', $review['id']) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm bg-danger-light" onclick="return confirm('Delete this review?')">
                                                        <i class="fe fe-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr><td colspan="6" class="text-center text-muted">No reviews found.</td></tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
