@extends('layouts.base')
@section('content')

    <div class="d-md-flex d-block align-items-center justify-content-between mt-2 page-header-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style2 mb-0">
                <li class="breadcrumb-item"><a href="javascript:void(0);">トップページ</a></li>
                <li class="breadcrumb-item active" aria-current="page">お知らせ一覧</li>
            </ol>
        </nav>
        <form class="row row-cols-lg-auto g-3 align-items-center">
            <div class="col-12">
                <label class="fw-bold">クイックナビ</label>
            </div>
            <div class="col-12">
                <select class="form-select" id="inlineFormSelectPref">
                    <option selected value="1">申請フォーマット・テンプレート等一覧</option>
                    <option value="2">各種リンク</option>
                    <option value="3">FAQ一覧</option>
                    <option value="4">お知らせ</option>
                    <option value="5">基幹システム(文書管理)</option>
                </select>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Go</button>
            </div>
        </form>
    </div>
    <div class="alert alert-solid-dark alert-dismissible fade show text-white mt-4">
        お知らせ一覧
    </div>
    <div class="row">
        <div class="col-xxl-12 col-xl-12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            <div class="card-header  justify-content-between">
                                <div class="card-title">
                                    お知らせ一覧
                                </div>
                            </div>
                            <div class="card-body">
                                <form class="row row-cols-lg-auto g-3 align-items-center mb-5">
                                    <div class="col-12">
                                        <label class="fw-bold">システム</label>
                                    </div>
                                    <div class="col-12 w-25">
                                        <select class="form-select" id="inlineFormSelectCatParent">
                                            <option selected>Datalizer1</option>
                                            <option value="1">Datalizer2</option>
                                            <option value="1">Datalizer3</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">検索</button>
                                    </div>
                                </form>
                                <div class="modal fade" id="modaldemo8">
                                    <div class="modal-dialog modal-dialog-centered text-center" role="document">
                                        <div class="modal-content modal-content-demo">
                                            <div class="modal-header">
                                                <h6 class="modal-title">お知らせのタイトルがここに表示されます</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body text-start">
                                                <div class="row">
                                                    <p>お知らせの詳細はここに表示されます。お知らせの詳細はここに表示されます。</p>
                                                    <span>
                                                        <img src="{{ asset('images/media/media-48.jpg') }}" class="img-fluid" style="width: 300px; height:230px;" alt="...">
                                                    </span>
                                                    <br>お知らせの詳細はここに表示されます。お知らせの詳細はここに表示されます。
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12 mx-auto">
                                        <div class="card custom-card">
                                            <div class="table-responsive">
                                                <table id="datatable-basic" class="table text-nowrap table-bordered text-center">
                                                    <thead>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>お知らせ</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>2023/11/11</td>
                                                            <td class="text-start"><a class="modal-effect" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#modaldemo8">調査報告/再発防止報告】●●●●●に伴うサイトメンテナンス(12/15）のお知らせ</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>2023/11/11</td>
                                                            <td class="text-start"><a class="modal-effect" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#modaldemo8">調査報告/再発防止報告］お知らせのタイトルがここに表示されます。お知らせのタイトルがここに表示されます。</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>2023/11/11</td>
                                                            <td class="text-start"><a class="modal-effect" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#modaldemo8">調査報告/再発防止報告］お知らせのタイトルがここに表示されます。お知らせのタイトルがここに表示されます。</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>2023/11/11</td>
                                                            <td class="text-start"><a class="modal-effect" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#modaldemo8">調査報告/再発防止報告】お知らせのタイトルがここに表示されます。お知らせのタイトルがここに表示されます。</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>2023/11/11</td>
                                                            <td class="text-start"><a class="modal-effect" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#modaldemo8">調査報告/再発防止報告］お知らせのタイトルがここに表示されます。お知らせのタイトルがここに表示されます。</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>2023/11/11</td>
                                                            <td class="text-start"><a class="modal-effect" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#modaldemo8">IFlash Reportlお知らせのタイトルがここに表示されます。お知らせのタイトルがここに表示されます。</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>2023/11/11</td>
                                                            <td class="text-start"><a class="modal-effect" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#modaldemo8">調査報告/再発防止報告］お知らせのタイトルがここに表示されます。お知らせのタイトルがここに表示されます。</a></td>
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
            </div>
        </div>
    </div>
@endsection
