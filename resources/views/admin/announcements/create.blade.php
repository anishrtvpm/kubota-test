@extends('layouts.base')
@section('content')

<div class="d-md-flex d-block align-items-center justify-content-between mt-2 page-header-breadcrumb">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style2 mb-0">
            <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">{{ __('home')}}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">{{ __('management_screen')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('announcement_management')}}</li>
        </ol>
    </nav>
    @include('layouts.navigation')
</div>
<div class="alert alert-solid-dark alert-dismissible fade show text-white mt-4">
    {{ __('announcement_management')}}
</div>
<div class="row">
    <div class="col-xxl-12 col-xl-12">
        <div class="row">
            <div class="col-xl-12">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <form method="POST" id="announcement_form" action="{{route('announcement.store')}}" novalidate="novalidate">
                            @csrf
                            <div class="card-body">
                                @if (session('message'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('message') }}
                                    </div>
                                @endif

                                @if (session('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                @php
                                    $tab = 1; // For tabindex
                                @endphp

                                @foreach ($userGroups as $group)
                                    <div class="row">

                                        @if(app()->getLocale() == 'ja')
                                            <h6>{{ $group->group_ja_name }}</h6>
                                        @else
                                            <h6>{{ $group->group_en_name }}</h6>
                                        @endif

                                        <div class="col-md-6 row mb-3">
                                            <label class="col-sm-3 col-form-label fw-bold text-center mt-5">{{ __('label_jp')}}</label>
                                            <div class="col-sm-8">
                                                <textarea class="form-control resize" id="ja_message{{ $group->group_id }}" name="ja_message{{ $group->group_id }}" rows="1" tabindex="{{ $tab++ }}">{{ isset($announcements[$group->group_id]) ? $announcements[$group->group_id]['ja_message'] : ''}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6 row mb-3">
                                            <label class="col-sm-3 col-form-label fw-bold text-center mt-5">{{ __('label_en')}}</label>
                                            <div class="col-sm-8">
                                                <textarea class="form-control resize" id="en_message{{ $group->group_id }}" name="en_message{{ $group->group_id }}" rows="1" tabindex="{{ $tab++ }}">{{ isset($announcements[$group->group_id]) ? $announcements[$group->group_id]['en_message'] : ''}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6 row mb-5 me-1">
                                            <label class="col-sm-3 col-form-label">{{ __('delivery_period')}}</label>
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-text text-muted"> <i class="ri-calendar-line"></i> </div>
                                                        <input type="text" class="form-control flatpickr-input daterange" id="daterange{{ $group->group_id }}" name="daterange{{ $group->group_id }}"
                                                        @if(isset($announcements[$group->group_id]) && $announcements[$group->group_id])
                                                            value="{{ $announcements[$group->group_id]['daterange'] }}"
                                                        @endif
                                                        placeholder="Date range picker" readonly="readonly" tabindex="{{ $tab++ }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="gap-2 col-2 mx-auto mb-5">
                                    <button class="btn btn-warning px-4" type="submit" id="announcement_submit" tabindex="{{ $tab++ }}" title="登録する">{{ __('button_register')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/admin/jquery.validate.js') }}"></script>
<script src="{{ asset('js/admin/announcement_form.js') }}"></script>
@endsection
