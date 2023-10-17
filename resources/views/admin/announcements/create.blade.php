@extends('layouts.base')
@section('content')

<div class="d-md-flex d-block align-items-center justify-content-between page-header-breadcrumb">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style2 mb-0">
            <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">トップページ</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}#manage">管理画面</a></li>
            <li class="breadcrumb-item active" aria-current="page">アナウンス管理</li>
        </ol>
    </nav>
    @include('layouts.navigation')
</div>
<div class="alert alert-solid-dark alert-dismissible fade show text-white mt-4">
    アナウンス管理
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
                                        <h6>{{ $group->group_ja_name }}</h6>
                                        <div class="col-md-6 row mb-3">
                                            <label class="col-sm-3 col-form-label fw-bold text-left text-sm-center mt-5">JP</label>
                                            <div class="col-sm-8">
                                                <textarea class="form-control resize" id="ja_message{{ $group->group_id }}" name="ja_message{{ $group->group_id }}" rows="1" tabindex="{{ $tab++ }}" maxlength="120">{{ isset($announcements[$group->group_id]) ? $announcements[$group->group_id]['ja_message'] : ''}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6 row mb-3">
                                            <label class="col-sm-3 col-form-label fw-bold text-left text-sm-center mt-5">EN</label>
                                            <div class="col-sm-8">
                                                <textarea class="form-control resize" id="en_message{{ $group->group_id }}" name="en_message{{ $group->group_id }}" rows="1" tabindex="{{ $tab++ }}" maxlength="120">{{ isset($announcements[$group->group_id]) ? $announcements[$group->group_id]['en_message'] : ''}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6 row mb-5 me-1">
                                            <label class="col-sm-3 col-form-label custom_label">配信期間</label>
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
                                <div class="gap-2 col-5 col-sm-4 col-md-2 mx-auto mb-5">
                                    <button class="btn btn-warning px-4" type="submit" id="announcement_submit" tabindex="{{ $tab++ }}" title="登録する">登録する</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/admin/jquery.validate.js') }}"></script>
<script src="{{ asset('js/admin/announcement_form.js') }}"></script>
@endsection
