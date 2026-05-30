<?php $page = 'index'; ?>
@extends('admin.layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Welcome Admin!</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon text-primary border-primary"><i
                                        class="fe fe-users"></i></span>
                                <div class="dash-count">
                                    <h3>{{ $stats['doctors']['total'] ?? 0 }}</h3>
                                </div>
                            </div>
                            <div class="dash-widget-info">
                                <h6 class="text-muted">Doctors</h6>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary w-50"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon text-success"><i class="fe fe-credit-card"></i></span>
                                <div class="dash-count">
                                    <h3>{{ $stats['patients']['total'] ?? 0 }}</h3>
                                </div>
                            </div>
                            <div class="dash-widget-info">
                                <h6 class="text-muted">Patients</h6>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-success w-50"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon text-danger border-danger"><i
                                        class="fe fe-calendar"></i></span>
                                <div class="dash-count">
                                    <h3>{{ $stats['appointments']['total'] ?? 0 }}</h3>
                                </div>
                            </div>
                            <div class="dash-widget-info">
                                <h6 class="text-muted">Appointments</h6>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-danger w-50"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon text-warning border-warning"><i
                                        class="fe fe-folder"></i></span>
                                <div class="dash-count">
                                    <h3>${{ number_format($stats['revenue']['total'] ?? 0, 2) }}</h3>
                                </div>
                            </div>
                            <div class="dash-widget-info">
                                <h6 class="text-muted">Revenue</h6>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-warning w-50"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-7">
                    <div class="card card-chart">
                        <div class="card-header">
                            <h4 class="card-title">Doctor & Patient Registrations</h4>
                        </div>
                        <div class="card-body">
                            <div id="morrisLine" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-5">
                    <div class="card card-chart">
                        <div class="card-header">
                            <h4 class="card-title">Appointments by Status</h4>
                        </div>
                        <div class="card-body">
                            <div id="morrisAppointments" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 d-flex">
                    <div class="card card-table flex-fill">
                        <div class="card-header">
                            <h4 class="card-title">Doctors List</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>Doctor Name</th>
                                            <th>Speciality</th>
                                            <th>Earned</th>
                                            <th>Reviews</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($doctors as $doctor)
                                            @php
                                                $speciality =
                                                    collect($doctor['specializations'] ?? [])
                                                        ->filter()
                                                        ->implode(', ') ?:
                                                    $doctor['specialization'] ?? '-';
                                                $photo =
                                                    $doctor['photoUrl'] ??
                                                    ($doctor['profilePicture'] ??
                                                        URL::asset('build/admin/img/doctors/doctor-thumb-01.jpg'));
                                                $rating = (float) ($doctor['rating'] ?? 0);
                                            @endphp
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="{{ url('admin/profile') }}"
                                                            class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle" src="{{ $photo }}"
                                                                alt="Doctor Image"></a>
                                                        <a
                                                            href="{{ url('admin/profile') }}">{{ $doctor['name'] ?? ($doctor['displayName'] ?? 'Doctor') }}</a>
                                                    </h2>
                                                </td>
                                                <td>{{ $speciality }}</td>
                                                <td>${{ number_format((float) ($doctor['earned'] ?? ($doctor['totalEarnings'] ?? 0)), 2) }}
                                                </td>
                                                <td>{{ number_format($rating, 1) }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center text-muted">No doctors found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 d-flex">
                    <div class="card card-table flex-fill">
                        <div class="card-header">
                            <h4 class="card-title">Patients List</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>Patient Name</th>
                                            <th>Phone</th>
                                            <th>Last Visit</th>
                                            <th>Paid</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($patients as $patient)
                                            @php
                                                $photo =
                                                    $patient['photoUrl'] ??
                                                    URL::asset('build/admin/img/patients/patient1.jpg');
                                                $lastVisit = $patient['lastVisit'] ?? ($patient['updatedAt'] ?? null);
                                            @endphp
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="{{ url('admin/profile') }}"
                                                            class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle" src="{{ $photo }}"
                                                                alt="Patient Image"></a>
                                                        <a
                                                            href="{{ url('admin/profile') }}">{{ $patient['name'] ?? ($patient['displayName'] ?? 'Patient') }}</a>
                                                    </h2>
                                                </td>
                                                <td>{{ $patient['phone'] ?? ($patient['phoneNumber'] ?? '-') }}</td>
                                                <td>{{ $lastVisit ? \Carbon\Carbon::parse($lastVisit)->format('d M Y') : '-' }}
                                                </td>
                                                <td>${{ number_format((float) ($patient['paid'] ?? ($patient['totalPaid'] ?? 0)), 2) }}
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center text-muted">No patients found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-table">
                        <div class="card-header">
                            <h4 class="card-title">Appointment List</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>Doctor Name</th>
                                            <th>Patient Name</th>
                                            <th>Appointment Time</th>
                                            <th>Status</th>
                                            <th>Payment Status</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($appointments as $appointment)
                                            @php
                                                $speciality =
                                                    $appointment['doctorSpecialty'] ??
                                                    collect($appointment['specializations'] ?? [])
                                                        ->filter()
                                                        ->implode(', ') ?:
                                                    '-';
                                                $date =
                                                    $appointment['appointmentDate'] ?? ($appointment['date'] ?? null);
                                                $time = trim(
                                                    ($appointment['startTime'] ?? ($appointment['time'] ?? '')) .
                                                        ($appointment['endTime'] ?? null
                                                            ? ' - ' . $appointment['endTime']
                                                            : ''),
                                                );
                                            @endphp
                                            <tr>
                                                <td>{{ $appointment['doctorName'] ?? 'Doctor' }}</td>
                                                <td>{{ $appointment['patientName'] ?? 'Patient' }}</td>
                                                <td>{{ $date ? \Carbon\Carbon::parse($date)->format('d M Y') : '-' }} <span
                                                        class="text-primary d-block">{{ $time ?: '-' }}</span></td>
                                                <td>{{ $appointment['status'] ?? 'pending' }}</td>
                                                <td><span
                                                        class="badge mt-2 {{ isset($appointment['paymentStatus']) && $appointment['paymentStatus'] == 'paid' ? 'bg-success' : 'bg-danger' }}">
                                                        {{ isset($appointment['paymentStatus']) ? $appointment['paymentStatus'] : 'Not Paid' }}</span>
                                                </td>
                                                <td>${{ number_format((float) ($appointment['amount'] ?? 0), 2) }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center text-muted">No appointments found.
                                                </td>
                                            </tr>
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

    <script>
        window.adminDashboardCharts = @json($chartData);
    </script>
@endsection
