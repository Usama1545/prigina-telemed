<?php $page = 'qualification-experience'; ?>
@extends('admin.layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Qualification & Experience</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Qualification & Experience</li>
                        </ul>
                    </div>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show">
                    {{ $errors->first() }}
                </div>
            @endif

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <h5 class="card-title">Qualification</h5>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#add_qualification">Add Qualification</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-center mb-0">
                                    <thead>
                                        <th>
                                            #
                                        </th>
                                        <th> isActive</th>
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </thead>
                                    <tbody>
                                        @forelse ($qualifications as $qualification)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><span
                                                        class="badge {{ $qualification['isActive'] ?? false ? 'bg-success-light' : 'bg-danger-light' }}">{{ $qualification['isActive'] ?? false ? 'Active' : 'Inactive' }}</span>
                                                </td>
                                                <td>{{ $qualification['name'] }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-warning"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#edit_qualification_{{ $qualification['id'] }}"><i
                                                            class="fe fe-edit"></i></button>

                                                    <form method="POST"
                                                        action="{{ route('admin.qualification-experience.delete', $qualification['id']) }}"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" name="type" value="qualification">
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Delete this qualification?')"><i
                                                                class="fe fe-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>

                                            <!-- Edit Qualification Modal -->
                                            <div class="modal fade" id="edit_qualification_{{ $qualification['id'] }}"
                                                tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content border-0 shadow-lg">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title fw-bold">Edit Qualification</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <form method="POST"
                                                            action="{{ route('admin.qualification-experience.update', $qualification['id']) }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="type" value="qualification">
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label class="form-label fw-semibold">Name</label>
                                                                    <input type="text" name="name"
                                                                        class="form-control"
                                                                        value="{{ $qualification['name'] }}" required>
                                                                </div>
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="isActive" value="1"
                                                                        {{ ($qualification['isActive'] ?? false) ? 'checked' : '' }}>
                                                                    <label class="form-check-label">Active</label>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer border-0">
                                                                <button type="button" class="btn btn-light"
                                                                    data-bs-dismiss="modal">Cancel</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Edit Qualification Modal -->
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center text-muted">No qualifications
                                                    found.</td>
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
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <h5 class="card-title">Experience</h5>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#add_experience">Add Experience</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-center mb-0">
                                    <thead>
                                        <th>
                                            #
                                        </th>
                                        <th> isActive</th>
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </thead>
                                    <tbody>
                                        @forelse ($experienceRanges as $experience)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><span
                                                        class="badge {{ $experience['isActive'] ?? false ? 'bg-success-light' : 'bg-danger-light' }}">{{ $experience['isActive'] ?? false ? 'Active' : 'Inactive' }}</span>
                                                </td>
                                                <td>{{ $experience['name'] }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-warning"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#edit_experience_{{ $experience['id'] }}"><i
                                                            class="fe fe-edit"></i></button>

                                                    <form method="POST"
                                                        action="{{ route('admin.qualification-experience.delete', $experience['id']) }}"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" name="type" value="experience_range">
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Delete this experience range?')"><i
                                                                class="fe fe-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>

                                            <!-- Edit Experience Modal -->
                                            <div class="modal fade" id="edit_experience_{{ $experience['id'] }}"
                                                tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content border-0 shadow-lg">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title fw-bold">Edit Experience</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <form method="POST"
                                                            action="{{ route('admin.qualification-experience.update', $experience['id']) }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="type" value="experience_range">
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label class="form-label fw-semibold">Name</label>
                                                                    <input type="text" name="name"
                                                                        class="form-control"
                                                                        value="{{ $experience['name'] }}" required>
                                                                </div>
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="isActive" value="1"
                                                                        {{ ($experience['isActive'] ?? false) ? 'checked' : '' }}>
                                                                    <label class="form-check-label">Active</label>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer border-0">
                                                                <button type="button" class="btn btn-light"
                                                                    data-bs-dismiss="modal">Cancel</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Edit Experience Modal -->
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center text-muted">No experience ranges
                                                    found.</td>
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

    <!-- Add Qualification Modal -->
    <div class="modal fade" id="add_qualification" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Add Qualification</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST" action="{{ route('admin.qualification-experience.store') }}">
                    @csrf
                    <input type="hidden" name="type" value="qualification">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="isActive" value="1" checked>
                            <label class="form-check-label">Active</label>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Add Qualification Modal -->

    <!-- Add Experience Modal -->
    <div class="modal fade" id="add_experience" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Add Experience</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST" action="{{ route('admin.qualification-experience.store') }}">
                    @csrf
                    <input type="hidden" name="type" value="experience_range">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="isActive" value="1" checked>
                            <label class="form-check-label">Active</label>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Add Experience Modal -->
@endsection
