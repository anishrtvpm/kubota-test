@extends('layouts.base')
@section('content')

    <div class="d-md-flex d-block align-items-center justify-content-between mt-2 page-header-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style2 mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">ホーム </a></li>
                <li class="breadcrumb-item"><a href="#">管理画面</a></li>
                <li class="breadcrumb-item active" aria-current="page">システムリンク管理</li>
            </ol>
        </nav>
        @include('layouts.navigation')
    </div>
    <div class="alert alert-solid-dark alert-dismissible fade show text-white mt-4">
      システムリンク管理
    </div>
    <div class="row">
        <div class="col-xxl-12 col-xl-12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card mb-5">
                        
                        <div class="card-body">
                            <div class="row  mb-3">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary"data-bs-effect="effect-scale" data-bs-toggle="modal" href="#modaldemo8" style="float: right;">新規追加</button>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-xl-12">
                                    <table id="systemLinksTable" class="table table-bordered text-nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>カテゴリ</th>
                                                <th>表示順</th>
                                                <th>システム名(JP)</th>
                                                <th>システム名(EN)</th>
                                                <th>URL(JP)</th>
                                                <th>URL(EN)</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/admin/system_links.js') }}"></script>
@endsection
         