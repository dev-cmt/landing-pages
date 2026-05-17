@extends('backEnd.admin.layouts.master')

@section('title', 'Landing Pages')

@section('body')
    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content">
                <!-- pageheader -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Landing Pages</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}" class="breadcrumb-link">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Landing Pages</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('admin.landing.pages.create') }}" class="btn btn-success btn-sm mb-3">
                            <i class="fas fa-plus"></i> Add Page
                        </a>
                        <div class="card">
                            <div class="card-body table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%">#</th>
                                            <th style="width: 15%">Image</th>
                                            <th style="width: 30%">Title</th>
                                            <th style="width: 20%">Theme</th>
                                            <th style="width: 10%">Status</th>
                                            <th style="width: 20%">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pages as $key => $page)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>
                                                    @if ($page->theme && $page->theme->imageFile)
                                                        <img src="{{ asset($page->theme->imageFile->file_url) }}" width="80" class="rounded">
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('landing-theme.home', $page->slug) }}" target="_blank">
                                                        {{ $page->title }}
                                                    </a>
                                                </td>
                                                <td>{{ $page->theme->title ?? '-' }}</td>
                                                <td>{{ $page->status ? 'Active' : 'Inactive' }}</td>
                                                <td>
                                                    <a href="{{ route('admin.landing.pages.customize', $page->slug) }}" class="btn btn-primary btn-sm mb-1" target="_blank">
                                                        <i class="fas fa-paint-brush"></i> Customize
                                                    </a>
                                                    <a href="{{ route('admin.landing.pages.edit', $page->id) }}" class="btn btn-info btn-sm mb-1">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <a href="{{ route('admin.landing.pages.delete', $page->id) }}" class="btn btn-danger btn-sm mb-1" onclick="return confirm('Delete this?')">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
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
