@extends('layouts.base')
@section('content')

    <div class="d-md-flex d-block align-items-center justify-content-between mt-2 page-header-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style2 mb-0">
                <li class="breadcrumb-item"><a href="javascript:void(0);">ポータルトップ </a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">管理画面</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">独立系販社一覧 </a></li>
                <li class="breadcrumb-item active" aria-current="page">リンクカテゴリ一覧</li>
            </ol>
        </nav>
        @include('layouts.navigation')
    </div>
    <div class="alert alert-solid-dark alert-dismissible fade show text-white mt-4">
    独立系販社一覧
    </div>
    <div class="row">
        <div class="col-xxl-12 col-xl-12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card mb-5">

                        <div class="card-body">

                            <div class="row  mb-3">
                                
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary"  style="float: right;"><a href="{{route('independent_company_permission_settings')}}" >新規カテゴリ追加</a></button>
                                </div>
                            </div>
                            
                            
                            <div class="row datatable_scroll">
                                <div class="col-xl-12">
                                    <table id="datatable-basic" class="table table-bordered text-nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>会社名</th>
                                                <th>略称</th>
                                                <th>代表者名</th>
                                                <th>住所</th>
                                                <th>電話番号</th>
                                                <th>URL</th>
                                                <th>有効開始日</th>
                                                <th>有効終了日</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><a  href="{{route('independent_company_permission_settings')}}">1234567890</a></td>
                                                <td>申請フフォーマット</td>
                                                <td><a href="#" target="_blank">●●●●●●●●●申請書</a></td>
                                                <td><a href="#" target="_blank"><i class="bi bi-file-earmark-pdf-fill fs-18 btn-outline-danger"></i>PDFファイル</a></td>
                                                <td>概要説明をここに表示</td>
                                                <td>概要説明をここに表示</td>
                                                <td>概要説明をここに表示</td>
                                                <td>概要説明をここに表示</td>
                                                <td>概要説明をここに表示</td>
                                                
                                            </tr>
                                            <tr>
                                                <td><a  href="{{route('independent_company_permission_settings')}}">2345678900</a></td>
                                                <td>申請フフォーマット</td>
                                                <td><a href="#" target="_blank">●●●●●●●●●申請書</a></td>
                                                <td><a href="#" target="_blank"><i class="bi bi-file-earmark-pdf-fill fs-18 btn-outline-danger"></i>PDFファイル</a></td>
                                                <td>概要説明をここに表示</td>
                                                <td>概要説明をここに表示</td>
                                                <td>概要説明をここに表示</td>
                                                <td>概要説明をここに表示</td>
                                                <td>概要説明をここに表示</td>
                                               
                                            </tr>
                                            <tr>
                                                <td><a  href="{{route('independent_company_permission_settings')}}">3456789010</a></td>
                                                <td>申請フフォーマット</td>
                                                <td><a href="#" target="_blank">●●●●●●●●●申請書</a></td>
                                                <td><a href="#" target="_blank"><i class="bi bi-file-earmark-pdf-fill fs-18 btn-outline-danger"></i>PDFファイル</a></td>
                                                <td>概要説明をここに表示</td>
                                                <td>概要説明をここに表示</td>
                                                <td>概要説明をここに表示</td>
                                                <td>概要説明をここに表示</td>
                                                <td>概要説明をここに表示</td>
                                               
                                            </tr>
                                            <tr>
                                                <td><a  href="{{route('independent_company_permission_settings')}}">4567890120</a></td>
                                                <td>申請フフォーマット</td>
                                                <td><a href="#" target="_blank">●●●●●●●●●申請書</a></td>
                                                <td><a href="#" target="_blank"><i class="bi bi-file-earmark-pdf-fill fs-18 btn-outline-danger"></i>PDFファイル</a></td>
                                                <td>概要説明をここに表示</td>
                                                <td>概要説明をここに表示</td>
                                                <td>概要説明をここに表示</td>
                                                <td>概要説明をここに表示</td>
                                                <td>概要説明をここに表示</td>
                                                
                                            </tr>
                                            <tr>
                                                <td><a  href="{{route('independent_company_permission_settings')}}">5678901230</a></td>
                                                <td>申請フフォーマット</td>
                                                <td><a href="#" target="_blank">●●●●●●●●●申請書</a></td>
                                                <td><a href="#" target="_blank"><i class="bi bi-file-earmark-pdf-fill fs-18 btn-outline-danger"></i>PDFファイル</a></td>
                                                <td>概要説明をここに表示</td>
                                                <td>概要説明をここに表示</td>
                                                <td>概要説明をここに表示</td>
                                                <td>概要説明をここに表示</td>
                                                <td>概要説明をここに表示</td>
                                                
                                            </tr>
                                            <tr>
                                                <td><a  href="{{route('independent_company_permission_settings')}}">6789012340</a></td>
                                                <td>申請フフォーマット</td>
                                                <td><a href="#" target="_blank">●●●●●●●●●申請書</a></td>
                                                <td><a href="#" target="_blank"><i class="bi bi-file-earmark-pdf-fill fs-18 btn-outline-danger"></i>PDFファイル</a></td>
                                                <td>概要説明をここに表示</td>
                                                <td>概要説明をここに表示</td>
                                                <td>概要説明をここに表示</td>
                                                <td>概要説明をここに表示</td>
                                                <td>概要説明をここに表示</td>
                                                
                                            </tr>
                                            <tr>
                                                <td><a  href="{{route('independent_company_permission_settings')}}">1111111111</a></td>
                                                <td>申請フフォーマット</td>
                                                <td><a href="#" target="_blank">●●●●●●●●●申請書</a></td>
                                                <td><a href="#" target="_blank"><i class="bi bi-file-earmark-pdf-fill fs-18 btn-outline-danger"></i>PDFファイル</a></td>
                                                <td>概要説明をここに表示</td>
                                                <td>概要説明をここに表示</td>
                                                <td>概要説明をここに表示</td>
                                                <td>概要説明をここに表示</td>
                                                <td>概要説明をここに表示</td>
                                                
                                            </tr>
                                            
                                        </tbody>
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
         