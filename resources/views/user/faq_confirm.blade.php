@extends('layouts.base')
@section('content')

    <div class="d-md-flex d-block align-items-center justify-content-between mt-2 page-header-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style2 mb-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">ホーム</a></li>
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">FAQ</a></li>
                <li class="breadcrumb-item"><a href="{{ route('faq_list') }}">FAQ一覧</a></li>
                <li class="breadcrumb-item"><a href="{{ route('faq_view') }}">FAQ No.12345</a></li>
                <li class="breadcrumb-item active" aria-current="page">お問い合わせ</li>
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
        お問い合わせ確認
    </div>
    <div class="row">
        <div class="col-xxl-12 col-xl-12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="d-flex　align-items-center justify-content-between mb-5">
                                    <p class="text-muted faq-list">FAQ No.12345「<a href="#" class="link">FAQタイトルがここに表示されます</a>」についてのご質問・ご連絡は下記のフォームよりお送り下さい。</p>
                                    <p><span class="must-text">必須</span>の項目は必須入力です。</p>
                                </div>
                                <div class="mb-5">
                                    <div class="row">
                                        <h6>ユーザー情報</h6>
                                        <label class="col-sm-2 col-form-label col-form-label">GUID</label>
                                        <div class="col-sm-10 mb-2">
                                            <label class="col-sm-2 col-form-label col-form-label">XXXXXXXXX</label>
                                        </div>
                                        <label class="col-sm-2 col-form-label col-form-label">従業員名</label>
                                        <div class="col-sm-10 mb-2">
                                            <label class="col-sm-2 col-form-label col-form-label">竹内 弘文</label>
                                        </div>
                                        <label class="col-sm-2 col-form-label col-form-label">所属</label>
                                        <div class="col-sm-10 mb-2">
                                            <select class="form-select" id="inlineFormSelectCatParent">
                                                <option selected>機械FC品質本部</option>
                                                <option value="1">機械FC品質本部A</option>
                                                <option value="2">機械FC品質本部B</option>
                                                <option value="3">機械FC品質本部C</option>
                                            </select>
                                        </div>
                                        <label class="col-sm-2 col-form-label col-form-label">言語</label>
                                        <div class="col-sm-10 mb-2">
                                            <label class="col-sm-2 col-form-label col-form-label">日本語</label>
                                        </div>
                                        <label class="col-sm-2 col-form-label col-form-label">メールアドレス<span class="must">必須</span></label>
                                        <div class="col-sm-10 mb-2">
                                            <input type="email" class="form-control" id="input-email" placeholder="例）email@kubota.com">
                                        </div>
                                        <label class="col-sm-2 col-form-label col-form-label">電話番号</label>
                                        <div class="col-sm-10 mb-5">
                                            <input type="tel" class="form-control" id="input-tel" placeholder="例）06012345678">
                                        </div>

                                        <h6>お問い合わせ内容</h6>
                                        <label class="col-sm-2 col-form-label col-form-label">システム<span class="must">必須</span></label>
                                        <div class="col-sm-10 mb-2">
                                            <input type="text" class="form-control" id="input-system" value="G-Wish">
                                        </div>
                                        <label class="col-sm-2 col-form-label col-form-label">カテゴリ<span class="must">必須</span></label>
                                        <div class="col-sm-10 mb-2">
                                            <input type="text" class="form-control" id="input-system" value="ワレンティ申請">
                                        </div>
                                        <label class="col-sm-2 col-form-label col-form-label">件名<span class="must">必須</span></label>
                                        <div class="col-sm-10 mb-2">
                                            <input type="text" class="form-control" id="input-field1">
                                        </div>
                                        <label class="col-sm-2 col-form-label col-form-label">関連問い合わせNo.<span class="must">必須</span></label>
                                        <div class="col-sm-10 mb-2">
                                            <input type="text" class="form-control" id="input-field2">
                                        </div>
                                        <label class="col-sm-2 col-form-label col-form-label">型式<span class="must">必須</span></label>
                                        <div class="col-sm-10 mb-2">
                                            <input type="text" class="form-control" id="input-field3">
                                        </div>
                                        <label class="col-sm-2 col-form-label col-form-label">機番<span class="must">必須</span></label>
                                        <div class="col-sm-10 mb-2">
                                            <input type="text" class="form-control" id="input-field4">
                                        </div>
                                        <label class="col-sm-2 col-form-label col-form-label">受付No.<span class="must">必須</span></label>
                                        <div class="col-sm-10 mb-2">
                                            <input type="text" class="form-control" id="input-field5">
                                        </div>
                                        <label for="text-area" class="col-sm-2 col-form-label col-form-label" placeholder="メッセージを入力してください">メッセージ<span class="must">必須</span></label>
                                        <div class="col-sm-10 mb-2">
                                            <textarea class="form-control" id="text-area" rows="1" style="height: 175px;"></textarea>
                                        </div>
                                        <label for="formFile" class="col-sm-2 col-form-label col-form-label">添付ファイル</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="file" id="formFile">
                                        </div>
                                    </div>
                                </div>
                                <div class="gap-2 col-3 mx-auto mb-5">
                                    <button class="btn btn-primary px-4 me-3" type="button">一次保存</button>
                                    <button class="btn btn-warning px-4" type="button">確認画面</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
         