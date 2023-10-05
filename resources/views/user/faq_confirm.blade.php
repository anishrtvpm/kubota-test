@extends('layouts.base')
@section('content')

    <div class="d-md-flex d-block align-items-center justify-content-between mt-2 page-header-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style2 mb-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">トップページ</a></li>
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
                                            <label class="col-sm-2 col-form-label col-form-label">機械FC品質本部</label>
                                        </div>
                                        <label class="col-sm-2 col-form-label col-form-label">言語</label>
                                        <div class="col-sm-10 mb-2">
                                            <label class="col-sm-2 col-form-label col-form-label">日本語</label>
                                        </div>
                                        <label class="col-sm-2 col-form-label col-form-label">メールアドレス</label>
                                        <div class="col-sm-10 mb-2">
                                            <label class="col-sm-2 col-form-label col-form-label">email@kubota.com</label>
                                        </div>
                                        <label class="col-sm-2 col-form-label col-form-label">電話番号</label>
                                        <div class="col-sm-10 mb-5">
                                            <label class="col-sm-2 col-form-label col-form-label">06012345678</label>
                                        </div>

                                        <h6>お問い合わせ内容</h6>
                                        <label class="col-sm-2 col-form-label col-form-label">システム</label>
                                        <div class="col-sm-10 mb-2">
                                            <label class="col-sm-10 col-form-label col-form-label">G-Wish</label>
                                        </div>
                                        <label class="col-sm-2 col-form-label col-form-label">カテゴリ</label>
                                        <div class="col-sm-10 mb-2">
                                            <label class="col-sm-10 col-form-label col-form-label">ワレンティ申請</label>
                                        </div>
                                        <label class="col-sm-2 col-form-label col-form-label">件名</label>
                                        <div class="col-sm-10 mb-2">
                                            <label class="col-sm-10 col-form-label col-form-label">ここに件名を表示する</label>
                                        </div>
                                        <label class="col-sm-2 col-form-label col-form-label">関連問い合わせNo.</label>
                                        <div class="col-sm-10 mb-2">
                                            <label class="col-sm-10 col-form-label col-form-label">ここに関連問い合わせNoを表示する</label>
                                        </div>
                                        <label class="col-sm-2 col-form-label col-form-label">型式</label>
                                        <div class="col-sm-10 mb-2">
                                            <label class="col-sm-10 col-form-label col-form-label">ここに型式を表示する</label>
                                        </div>
                                        <label class="col-sm-2 col-form-label col-form-label">機番</label>
                                        <div class="col-sm-10 mb-2">
                                            <label class="col-sm-10 col-form-label col-form-label">ここに機番を表示する</label>
                                        </div>
                                        <label class="col-sm-2 col-form-label col-form-label">受付No.</label>
                                        <div class="col-sm-10 mb-2">
                                            <label class="col-sm-10 col-form-label col-form-label">ここに受付No.を表示する</label>
                                        </div>
                                        <label for="text-area" class="col-sm-2 col-form-label col-form-label" placeholder="メッセージを入力してください">メッセージ</label>
                                        <div class="col-sm-10 mb-2">
                                            <label class="col-sm-10 col-form-label col-form-label">ここにメッセージを表示する</label>
                                        </div>
                                        <label for="formFile" class="col-sm-2 col-form-label col-form-label">添付ファイル</label>
                                        <div class="col-sm-10">
                                        <label class="col-sm-10 col-form-label col-form-label">Filename.pdf</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="gap-2 col-3 mx-auto mb-5">
                                    <button class="btn btn-primary px-4 me-3" type="button">戻る</button>
                                    <button class="btn btn-warning px-4" type="button">確認</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
         