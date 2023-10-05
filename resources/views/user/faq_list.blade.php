@extends('layouts.base')
@section('content')

    <div class="d-md-flex d-block align-items-center justify-content-between mt-2 page-header-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style2 mb-0">
                <li class="breadcrumb-item"><a href="javascript:void(0);">トップページ</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">FAQ</a></li>
                <li class="breadcrumb-item active" aria-current="page">FAQ一覧</li>
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
        FAQ一覧
    </div>
    <div class="row">
        <div class="col-xxl-12 col-xl-12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            <div class="card-header  justify-content-between">
                                <div class="card-title">
                                    FAQ一覧
                                </div>
                            </div>
                            <div class="card-body text-end">
                                <form class="row row-cols-lg-auto g-3 align-items-center mb-3">
                                    <div class="col-12 w-10">
                                        <label class="fw-bold">キーワード検索</label>
                                    </div>
                                    <div class="col-12 w-50">
                                        <div class="input-group">
                                            <input type="search" class="form-control border-1 px-2" placeholder="キーワードを入力" aria-label="Username">
                                            <a href="javascript:void(0);" class="input-group-text" id="Search-Grid"><i class="fe fe-search header-link-icon fs-18"></i></a>
                                        </div>
                                    </div>
                                </form>
                                <form class="row row-cols-lg-auto g-3 align-items-center mb-5">
                                    <div class="col-12">
                                        <label class="fw-bold">カテゴリ検索</label>
                                    </div>
                                    <div class="col-12 w-25">
                                        <select class="form-select" id="inlineFormSelectCatParent">
                                            <option selected>大カテゴリ</option>
                                            <option value="1">大カテゴリ０１</option>
                                            <option value="2">大カテゴリ０２</option>
                                            <option value="3">大カテゴリ０３</option>
                                        </select>
                                    </div>
                                    <div class="col-12 w-25">
                                        <select class="form-select" id="inlineFormSelectCatChild">
                                            <option selected>小カテゴリ</option>
                                            <option value="1">小カテゴリ０１</option>
                                            <option value="2">小カテゴリ０２</option>
                                            <option value="3">小カテゴリ０３</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">検索</button>
                                    </div>
                                </form>
                                <div class="col-xxl-12 col-xl-12 col-lg-12 pb-5 px-lg-2 px-5 text-start">
                                    <div class="faq-list">
                                        <a href="faq_view">
                                            <h6 class="text-lg-start fw-semibold mb-2">FAQタイトルがここに表示されます</h6>
                                            <p class="text-muted w-75 mb-0">FAQのQ文章がここに入ります。 FAQのQ文章がここに入ります。 FAQのQ文章がここに入ります。 FAQのQ文章がここに入ります。 FAQのQ文章がここに入。 設定した文字数以降は 「・・・」 で省略···</p>
                                        </a>
                                    </div>
                                    <div class="faq-list">
                                        <a href="faq_view">
                                            <h6 class="text-lg-start fw-semibold mb-2">FAQタイトルがここに表示されます</h6>
                                            <p class="text-muted w-75 mb-0">FAQのQ文章がここに入ります。 FAQのQ文章がここに入ります。 FAQのQ文章がここに入ります。 FAQのQ文章がここに入ります。 FAQのQ文章がここに入。 設定した文字数以降は 「・・・」 で省略···</p>
                                        </a>
                                    </div>
                                    <div class="faq-list">
                                        <a href="#">
                                            <h6 class="text-lg-start fw-semibold mb-2">FAQタイトルがここに表示されます</h6>
                                            <p class="text-muted w-75 mb-0">FAQのQ文章がここに入ります。 FAQのQ文章がここに入ります。 FAQのQ文章がここに入ります。 FAQのQ文章がここに入ります。 FAQのQ文章がここに入。 設定した文字数以降は 「・・・」 で省略···</p>
                                        </a>
                                    </div>
                                    <div class="faq-list">
                                        <a href="#">
                                            <h6 class="text-lg-start fw-semibold mb-2">FAQタイトルがここに表示されます</h6>
                                            <p class="text-muted w-75 mb-0">FAQのQ文章がここに入ります。 FAQのQ文章がここに入ります。 FAQのQ文章がここに入ります。 FAQのQ文章がここに入ります。 FAQのQ文章がここに入。 設定した文字数以降は 「・・・」 で省略···</p>
                                        </a>
                                    </div>
                                    <div class="faq-list">
                                        <a href="#">
                                            <h6 class="text-lg-start fw-semibold mb-2">FAQタイトルがここに表示されます</h6>
                                            <p class="text-muted w-75 mb-0">FAQのQ文章がここに入ります。 FAQのQ文章がここに入ります。 FAQのQ文章がここに入ります。 FAQのQ文章がここに入ります。 FAQのQ文章がここに入。 設定した文字数以降は 「・・・」 で省略···</p>
                                        </a>
                                    </div>
                                    <div class="faq-list">
                                        <a href="#">
                                            <h6 class="text-lg-start fw-semibold mb-2">FAQタイトルがここに表示されます</h6>
                                            <p class="text-muted w-75 mb-0">FAQのQ文章がここに入ります。 FAQのQ文章がここに入ります。 FAQのQ文章がここに入ります。 FAQのQ文章がここに入ります。 FAQのQ文章がここに入。 設定した文字数以降は 「・・・」 で省略···</p>
                                        </a>
                                    </div>
                                    <div class="faq-list">
                                        <a href="#">
                                            <h6 class="text-lg-start fw-semibold mb-2">FAQタイトルがここに表示されます</h6>
                                            <p class="text-muted w-75 mb-0">FAQのQ文章がここに入ります。 FAQのQ文章がここに入ります。 FAQのQ文章がここに入ります。 FAQのQ文章がここに入ります。 FAQのQ文章がここに入。 設定した文字数以降は 「・・・」 で省略···</p>
                                        </a>
                                    </div>
                                    <div class="faq-list">
                                        <a href="#">
                                            <h6 class="text-lg-start fw-semibold mb-2">FAQタイトルがここに表示されます</h6>
                                            <p class="text-muted w-75 mb-0">FAQのQ文章がここに入ります。 FAQのQ文章がここに入ります。 FAQのQ文章がここに入ります。 FAQのQ文章がここに入ります。 FAQのQ文章がここに入。 設定した文字数以降は 「・・・」 で省略···</p>
                                        </a>
                                    </div>
                                    <div class="faq-list">
                                        <a href="#">
                                            <h6 class="text-lg-start fw-semibold mb-2">FAQタイトルがここに表示されます</h6>
                                            <p class="text-muted w-75 mb-0">FAQのQ文章がここに入ります。 FAQのQ文章がここに入ります。 FAQのQ文章がここに入ります。 FAQのQ文章がここに入ります。 FAQのQ文章がここに入。 設定した文字数以降は 「・・・」 で省略···</p>
                                        </a>
                                    </div>
                                    <div class="faq-list">
                                        <a href="#">
                                            <h6 class="text-lg-start fw-semibold mb-2">FAQタイトルがここに表示されます</h6>
                                            <p class="text-muted w-75 mb-0">FAQのQ文章がここに入ります。 FAQのQ文章がここに入ります。 FAQのQ文章がここに入ります。 FAQのQ文章がここに入ります。 FAQのQ文章がここに入。 設定した文字数以降は 「・・・」 で省略···</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="d-grid gap-2 col-3 mx-auto mb-5">
                                    <nav aria-label="..." class="me-3">
                                        <ul class="pagination">
                                            <li class="page-item disabled">
                                                <a class="page-link">前へ</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>
                                            <li class="page-item active" aria-current="page">
                                                <a class="page-link" href="javascript:void(0);">2</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="javascript:void(0);">次へ</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="d-grid gap-2 col-3 mx-auto mb-5">
                                    <a href="{{ route('faq_create') }}"><button class="btn btn-warning btn-wave" type="button">お問い合わせフォームを開く</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
         