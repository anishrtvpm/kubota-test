@extends('layouts.base')
@section('content')

    <div class="d-md-flex d-block align-items-center justify-content-between mt-2 page-header-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style2 mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">トップページ</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">管理画面</a></li>
                <li class="breadcrumb-item active" aria-current="page">お問い合わせフォーム管理</li>
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
        お問い合わせフォーム編集
    </div>
    <div class="row">
        <div class="col-xxl-12 col-xl-12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="col-md-12 row mb-3">
                                    <label for="text-area" class="col-sm-2 col-form-label col-form-label"><b>フォームNo.</b></label>
                                    <div class="col-sm-2 mb-2">
                                        100
                                    </div>
                                </div>
                                <div class="col-md-12 row mb-3">
                                    <label for="text-area" class="col-sm-2 col-form-label col-form-label">状態</label>
                                    <div class="col-sm-3 mb-2">
                                        <select class="form-select" id="inlineFormSelectCatParent5">
                                            <option selected>公開中</option>
                                            <option value="1">未公開</option>
                                            <option value="2">保留中</option>
                                        </select>
                                    </div>
                                    <label for="text-area" class="col-sm-2 col-form-label col-form-label text-end">言語</label>
                                    <div class="col-sm-3 mb-2">
                                        <select class="form-select" id="inlineFormSelectCatParent1">
                                            <option selected>日本語</option>
                                            <option value="1">日本語</option>
                                            <option value="2">英語</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 row mb-5">
                                    <label for="text-area" class="col-sm-2 col-form-label col-form-label">件名</label>
                                    <div class="col-sm-3 mb-2">
                                        <input type="text" class="form-control" id="input-subject" placeholder="Datalizerの●●●●">
                                    </div>
                                    <label for="text-area" class="col-sm-2 col-form-label col-form-label text-end">宛先アドレス</label>
                                    <div class="col-sm-3 mb-2">
                                        <input type="email" class="form-control" id="input-destination" placeholder="test.mail@kubota.com">
                                    </div>
                                </div>
                                <p><b>[フォーム項目]</b></p>
                                <p>フォームに表示する入力項目を以下で設定してください。</p>
                                <p>ログインユーザー情報が自動的に送信されます。</p>
                                <div class="row">
                                    <div class="col-xl-12 mx-auto">
                                        <div class="card custom-card">
                                            <div class="table-responsive">
                                                <table class="table text-nowrap table-bordered text-center">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">選択</th>
                                                            <th scope="col">位置</th>
                                                            <th scope="col">項目名</th>
                                                            <th scope="col">タイプ</th>
                                                            <th scope="col">最大長</th>
                                                            <th scope="col">必須</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check form-check-md">
                                                                    <input class="form-check-input" type="radio" name="Radio" id="Radio-md">
                                                                </div>
                                                            </td>
                                                            <td>1</td>
                                                            <td class="text-start">電話番号</td>
                                                            <td><select class="form-select" id="autoSizingSelect">
                                                                    <option selected>文字列(電話番号)</option>
                                                                    <option value="1">文字列(電話番号)</option>
                                                                    <option value="2">文字列(単一行)</option>

                                                                </select></td>
                                                            <td>15</td>
                                                            <td><input class="form-check-input" type="checkbox" value="" id="checkebox-lg7" checked=""></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check form-check-md">
                                                                    <input class="form-check-input" type="radio" name="Radio" id="Radio-md">
                                                                </div>
                                                            </td>
                                                            <td>2</td>
                                                            <td class="text-start">件名</td>
                                                            <td><select class="form-select" id="autoSizingSelect">
                                                                    <option selected>文字列(電話番号)</option>
                                                                    <option value="1">文字列(電話番号)</option>
                                                                    <option value="2">文字列(単一行)</option>

                                                                </select></td>
                                                            <td>100</td>
                                                            <td><input class="form-check-input" type="checkbox" value="" id="checkebox-lg8" checked=""></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check form-check-md">
                                                                    <input class="form-check-input" type="radio" name="Radio" id="Radio-md">
                                                                </div>
                                                            </td>
                                                            <td>3</td>
                                                            <td class="text-start">関連問い合わせNo.</td>
                                                            <td><select class="form-select" id="autoSizingSelect">
                                                                    <option selected>文字列(電話番号)</option>
                                                                    <option value="1">文字列(電話番号)</option>
                                                                    <option value="2">文字列(単一行)</option>

                                                                </select></td>
                                                            <td>20</td>
                                                            <td><input class="form-check-input" type="checkbox" value="" id="checkebox-lg9"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check form-check-md">
                                                                    <input class="form-check-input" type="radio" name="Radio" id="Radio-md">
                                                                </div>
                                                            </td>
                                                            <td>4</td>
                                                            <td class="text-start">型式</td>
                                                            <td><select class="form-select" id="autoSizingSelect">
                                                                    <option selected>文字列(電話番号)</option>
                                                                    <option value="1">文字列(電話番号)</option>
                                                                    <option value="2">文字列(単一行)</option>

                                                                </select></td>
                                                            <td>50</td>
                                                            <td><input class="form-check-input" type="checkbox" value="" id="checkebox-lg10" checked=""></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check form-check-md">
                                                                    <input class="form-check-input" type="radio" name="Radio" id="Radio-md">
                                                                </div>
                                                            </td>
                                                            <td>5</td>
                                                            <td class="text-start">機番</td>
                                                            <td><select class="form-select" id="autoSizingSelect">
                                                                    <option selected>文字列(電話番号)</option>
                                                                    <option value="1">文字列(電話番号)</option>
                                                                    <option value="2">文字列(単一行)</option>

                                                                </select></td>
                                                            <td>20</td>
                                                            <td><input class="form-check-input" type="checkbox" value="" id="checkebox-lg11"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check form-check-md">
                                                                    <input class="form-check-input" type="radio" name="Radio" id="Radio-md">
                                                                </div>
                                                            </td>
                                                            <td>6</td>
                                                            <td class="text-start">受付No.</td>
                                                            <td><select class="form-select" id="autoSizingSelect">
                                                                    <option selected>文字列(電話番号)</option>
                                                                    <option value="1">文字列(電話番号)</option>
                                                                    <option value="2">文字列(単一行)</option>

                                                                </select></td>
                                                            <td>20</td>
                                                            <td><input class="form-check-input" type="checkbox" value="" id="checkebox-lg12" checked=""></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check form-check-md text-center">
                                                                    <input class="form-check-input" type="radio" name="Radio" id="Radio-md">
                                                                </div>
                                                            </td>
                                                            <td>7</td>
                                                            <td class="text-start">本文</td>
                                                            <td><select class="form-select" id="autoSizingSelect">
                                                                    <option selected>文字列(電話番号)</option>
                                                                    <option value="1">文字列(電話番号)</option>
                                                                    <option value="2">文字列(単一行)</option>

                                                                </select></td>
                                                            <td>200</td>
                                                            <td><input class="form-check-input" type="checkbox" value="" id="checkebox-lg13"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div class="col-md-12 text-end">
                                                    <div class="btn-list">
                                                        <a href="javascript:void(0);"><button type="button" class="btn btn-primary btn-wave px-3">項目追加</button></a>
                                                        <a href="javascript:void(0);"><button type="button" class="btn btn-danger btn-wave px-4">項目削除</button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gap-2 col-3 mx-auto mb-3">
                                            <button class="btn btn-warning px-4 me-3" type="button">保存する</button>
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
