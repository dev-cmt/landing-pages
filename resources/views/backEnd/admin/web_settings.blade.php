@extends('backEnd.admin.layouts.master')

@section('title')
    Web Settings
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('backEnd/assets/vendor/summernote/css/summernote-bs4.css')}}">
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
                            <h2 class="pageheader-title">Web Settings</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}" class="breadcrumb-link">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Web Settings</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader  -->
                <!-- ============================================================== -->
                <form action="{{route('admin.settings.web.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-md-6 col-12">
                            <div class="card">
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="website_phone">Website Phone</label>
                                        <input type="text" class="form-control" name="website_phone" id="website_phone"
                                               value="{{$data->website_phone ?? null}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="website_phone2">Website Phone 2</label>
                                        <input type="text" class="form-control" name="website_phone2" id="website_phone2"
                                               value="{{$data->website_phone2 ?? null}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="website_phone3">Website Phone 3</label>
                                        <input type="text" class="form-control" name="website_phone3" id="website_phone3"
                                               value="{{$data->website_phone3 ?? null}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="website_email">Website Email</label>

                                        <input type="email" class="form-control" name="website_email" id="website_email"
                                               value="{{$data->website_email ?? null}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="website_email">Website Email 2</label>

                                        <input type="email" class="form-control" name="website_email2" id="website_email2"
                                               value="{{$data->website_email2 ?? null}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="website_facebook">Website Facebook Link</label>

                                        <input type="text" class="form-control" name="website_facebook" id="website_facebook"
                                               value="{{$data->website_facebook ?? null}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="website_twitter">Website Twitter Link</label>
                                        <input type="text" class="form-control" name="website_twitter" id="website_twitter"
                                               value="{{$data->website_twitter ?? null}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="website_linkedin">Website Linkedin Link</label>
                                        <input type="text" class="form-control" name="website_linkedin" id="website_linkedin"
                                               value="{{$data->website_linkedin ?? null}}">
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-3">
                                <div class="card-body">
                                    <div class="form-group form-check-inline">
                                        <input type="checkbox" class="form-check-input" id="is_otp" name="is_otp" {{$data->is_otp == 1 ?"checked":""}} value="1">
                                        <label class="mb-1" for="is_otp">Enable OTP in Order?</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="sender_id">SMS Sender</label>
                                        <input type="text" class="form-control" name="sender_id" id="sender_id"
                                               value="{{$data->sender_id ?? null}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="api_key">SMS API Key</label>
                                        <input type="text" class="form-control" name="api_key" id="api_key"
                                               value="{{$data->api_key ?? null}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="otp_message">OTP Message</label>
                                        <textarea class="form-control" name="otp_message" id="otp_message">{{$data->otp_message ?? null}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="website_copyright_text">Website Copyright Text</label>
                                        <textarea class="form-control form-control-textarea" name="website_copyright_text" id="website_copyright_text"
                                        >{!! $data->website_copyright_text ?? null !!}</textarea>
                                    </div>

                                    {{--<div class="form-group">
                                        <label class="col-md-12">Text area</label>
                                        <div class="col-md-12">
                                            <textarea class="form-control" rows="5"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-12">Input Select</label>
                                        <div class="col-sm-12">
                                            <select class="form-control">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </div>--}}

                                    <div class="form-group">
                                        <label>Website Header Logo</label>
                                        <input type="file" class="form-control mb-3" name="website_header_logo">
                                        <input type="hidden" value="{{$data->website_header_logo ?? null}}" name="website_header_logo_old">
                                        <img width="150" src="{{$data->get_logo ? asset($data->get_logo->file_url) : asset('frontEnd/images/no_image.png')}}"
                                             alt="Website Logo">
                                    </div>

                                    <div class="form-group">
                                        <label>Website Favicon</label>
                                        <input type="file" class="form-control mb-3" name="website_favicon">
                                        <input type="hidden" value="{{$data->website_favicon ?? null}}" name="website_favicon_old">
                                        <img width="64" height="64" src="{{$data->get_fav ? asset($data->get_fav->file_url) : asset('frontEnd/images/no_image.png')}}"
                                             alt="Website Logo">
                                    </div>

                                    <div class="form-group">
                                        <label for="website_linkedin">Currency Sign</label>
                                        <input type="text" class="form-control" name="currency_sign" id="currency_sign"
                                               value="{{$data->currency_sign ?? null}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="delivery_info">Bkash Merchant Number</label>
                                        <input type="text" class="form-control" id="bkash_merchant_numb" name="bkash_merchant_numb"
                                               value="{{$data->bkash_merchant_numb}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="fb_pixel">Facebook Pixel Code</label>
                                        <textarea class="form-control form-control-textarea" name="fb_pixel" id="fb_pixel"
                                                  rows="4">{!! $data->fb_pixel ?? null !!}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="gtm_head">GTM Head Script</label>
                                        <textarea class="form-control form-control-textarea" name="gtm_head" id="gtm_head"
                                                  rows="3">{!! $data->gtm_head ?? null !!}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="gtm_body">GTM Body Script</label>
                                        <textarea class="form-control form-control-textarea" name="gtm_body" id="gtm_body"
                                                  rows="3">{!! $data->gtm_body ?? null !!}</textarea>
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


@section('js')
    <script src="{{asset('backEnd/assets/vendor/summernote/js/summernote-bs4.js')}}"></script>
    <script>
        $('.summernote').summernote();
    </script>

@endsection
