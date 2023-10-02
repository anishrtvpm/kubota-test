@extends('layouts.base')
@section('content')

    <div class="d-md-flex d-block align-items-center justify-content-between mt-2 page-header-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style2 mb-0">
                <li class="breadcrumb-item"><a href="javascript:void(0);">ホーム</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">管理画面</a></li>
                <li class="breadcrumb-item active" aria-current="page">お問い合わせ情報管理</li>
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
        お問い合わせ情報管理
    </div>
    <div class="row">
        <div class="col-xxl-12 col-xl-12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="row">
                                    <h6 class="mb-5">グループ1 機械CF品質本部・国内事業所・研究開発部門</h6>
                                    <div class="col-md-6 row mb-3">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label fw-bold text-center mt-5">JP</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="text-area22" rows="1" style="height: 150px;"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6 row mb-3">
                                        <label for="inputPassword3" class="col-sm-3 col-form-label fw-bold text-center mt-5">EN</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="text-area33" rows="1" style="height: 150px;"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <h6 class="mb-5">グループ2 国内販社</h6>
                                    <div class="col-md-6 row mb-3">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label fw-bold text-center mt-5">JP</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="text-area22" rows="1" style="height: 150px;"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6 row mb-3">
                                        <label for="inputPassword3" class="col-sm-3 col-form-label fw-bold text-center mt-5">EN</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="text-area33" rows="1" style="height: 150px;"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <h6 class="mb-5">グループ3 海外事業所 (K-QUIC利用あり)</h6>
                                    <div class="col-md-6 row mb-3">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label fw-bold text-center mt-5">JP</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="text-area22" rows="1" style="height: 150px;"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6 row mb-3">
                                        <label for="inputPassword3" class="col-sm-3 col-form-label fw-bold text-center mt-5">EN</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="text-area33" rows="1" style="height: 150px;"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <h6 class="mb-5">グループ4 海外事業所 (K-QUIC利用なし)</h6>
                                    <div class="col-md-6 row mb-3">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label fw-bold text-center mt-5">JP</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="text-area22" rows="1" style="height: 150px;"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6 row mb-3">
                                        <label for="inputPassword3" class="col-sm-3 col-form-label fw-bold text-center mt-5">EN</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="text-area33" rows="1" style="height: 150px;"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <h6 class="mb-5">グループ5 M&A</h6>
                                    <div class="col-md-6 row mb-3">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label fw-bold text-center mt-5">JP</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="text-area22" rows="1" style="height: 150px;"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6 row mb-3">
                                        <label for="inputPassword3" class="col-sm-3 col-form-label fw-bold text-center mt-5">EN</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="text-area33" rows="1" style="height: 150px;"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <h6 class="mb-5">グループ6 独立系販社</h6>
                                    <div class="col-md-6 row mb-3">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label fw-bold text-center mt-5">JP</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="text-area22" rows="1" style="height: 150px;"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6 row mb-3">
                                        <label for="inputPassword3" class="col-sm-3 col-form-label fw-bold text-center mt-5">EN</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="text-area33" rows="1" style="height: 150px;"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="gap-2 col-2 mx-auto mb-5">
                                    <button class="btn btn-warning px-4" type="button">登録する</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
