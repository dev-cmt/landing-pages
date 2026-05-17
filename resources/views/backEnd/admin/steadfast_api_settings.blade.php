@extends('backEnd.admin.layouts.master')

@section('title')
    Stead Fast API Settings
@endsection

@section('body')
    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content ">
                <!-- ============================================================== -->
                <!-- pageheader  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Stead Fast API Settings</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"
                                                class="breadcrumb-link">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Stead Fast API Settings</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader  -->
                <!-- ============================================================== -->
                <form action="{{ route('admin.settings.stead_fast.api.update') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                                id="is_active" {{ $data && $data->is_active == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_active">
                                                Stead Fast API
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="api_key">API Key</label>
                                        <textarea name="api_key" id="api_key" class="form-control">{{ $data && $data->api_key ? $data->api_key : '' }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="secret_key">Secret Key</label>
                                        <textarea name="secret_key" id="secret_key" class="form-control">{{ $data && $data->secret_key ? $data->secret_key : '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-success mt-4">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
