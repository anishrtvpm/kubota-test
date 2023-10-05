@extends('layouts.base')
@section('content')

    <div class="d-md-flex d-block align-items-center justify-content-between mt-2 page-header-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style2 mb-0">
                <li class="breadcrumb-item"><a href="javascript:void(0);">トップページ</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">FAQ</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">FAQ一覧</a></li>
                <li class="breadcrumb-item active" aria-current="page">FAQ No.12345</li>
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
        FAQ No.12345
    </div>
    <div class="row">
        <div class="col-xxl-12 col-xl-12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="d-flex　align-items-center justify-content-between ms-4 mb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="faq-cat">
                                            カテゴリ
                                        </div>
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb breadcrumb-style2 mb-0">
                                                <li class="breadcrumb-item"><a href="javascript:void(0);">カテゴリ１</a></li>
                                                <li class="breadcrumb-item"><a href="javascript:void(0);">カテゴリ２</a></li>
                                            </ol>
                                        </nav>
                                    </div>
                                    <div class="float-end fs-14 text-muted">
                                        <span class="faq-number">FAQ番号：12345678</span>
                                        <span class="d-block question-date">質問日：2023/05/29</span>
                                        <span class="d-block answer-date">回答日：2023/05/30</span>
                                        <span class="d-block faq-responden">回答者：山田太郎</span>
                                    </div>
                                </div>
                                <div class="mb-5">
                                    <div class="col-12 col-md-12 faq-list">
                                        <div class="d-flex">
                                            <span>
                                                <img src="{{ asset('images/extra/faq-question.png') }}" width="32" height="32" class="img-fluid" alt="...">
                                            </span>
                                            <div class="ms-2">
                                                <h6 class="fw-semibold mb-2 mt-2">FAQタイトルがここに表示されます</h6>
                                                <p class=" text-muted">FAQのQ文章がここに入ります。 FAQのQ文章がここに入ります。 FAQのQ文章がここに入ります。 <br>
                                                    FAQのQ文章がここに入ります。 FAQのQ文章がここに入ります。 FAQのQ文章がここに入ります。 <br>
                                                    FAQのQ文章がここに入ります。 FAQのQ文章がここに入ります。 FAQのQ文章がここに入ります。 <br>
                                                    FAQのQ文章がここに入ります。 FAQのQ文章がここに入ります。 FAQのQ文章がここに入ります。</p>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12 col-md-12 faq-list">
                                        <div class="d-flex">
                                            <span>
                                                <img src="{{ asset('images/extra/faq-answer.png') }}" width="32" height="32" class="img-fluid" alt="...">
                                            </span>
                                            <div class="ms-2">
                                                <h6 class="fw-semibold mb-2 mt-2">回答</h6>
                                                <p class=" text-muted">FAQのQ文章がここに入ります。 FAQのQ文章がここに入ります。 FAQのQ文章がここに入ります。 <br>
                                                    FAQのQ文章がここに入ります。 FAQのQ文章がここに入ります。 FAQのQ文章がここに入ります。 <br>
                                                    FAQのQ文章がここに入ります。 FAQのQ文章がここに入ります。 FAQのQ文章がここに入ります。<br>
                                                    FAQのQ文章がここに入ります。 FAQのQ文章がここに入ります。 FAQのQ文章がここに入ります。</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12 faq-list">
                                        <div class="d-flex">
                                            <span>
                                                <img src="{{ asset('images/extra/faq-picture.png') }}" width="32" height="32" class="img-fluid" alt="...">
                                            </span>
                                            <div class="ms-2">
                                                <h6 class="fw-semibold mb-2 mt-2">参考資料</h6>

                                            </div>

                                        </div>
                                        <div class="text-center">
                                            <img src="{{ asset('images/media/media-48.jpg') }}" class="img-fluid" alt="...">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12 faq-list">
                                        <div class="d-flex">
                                            <span>
                                                <img src="{{ asset('images/extra/faq-link.png') }}" width="32" height="32" class="img-fluid" alt="...">
                                            </span>
                                            <div class="ms-2">
                                                <h6 class="fw-semibold mb-2 mt-2">参考URL</h6>
                                                <ul>
                                                    <li class="text-muted"><a href="https://www.kubota.co.jp/sustainability/biz-food/index.html" target="_blank">https://www.kubota.co.jp/sustainability/biz-food/index.html</a></li>
                                                    <li class="text-muted"><a href="https://www.kubota.co.jp/product/ironpipe/products/technology/innovation/" target="_blank">https://www.kubota.co.jp/product/ironpipe/products/technology/innovation/</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12 faq-list">
                                        <div class="d-flex">
                                            <span>
                                                <img src="{{ asset('images/extra/faq-email.png') }}" width="32" height="32" class="img-fluid" alt="...">
                                            </span>
                                            <div class="ms-2">
                                                <h6 class="fw-semibold mb-2 mt-2">ご意見・ご質問フォーム</h6>
                                                <p class="text-muted">このQ&Aで問題が解決しない場合やご意見などございましたら、以下ボタンより問合せフォームに移動して メールをお送りください。</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-grid gap-2 col-4 mx-auto mb-5">
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
         