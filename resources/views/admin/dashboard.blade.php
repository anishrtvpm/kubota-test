@extends('layouts.base')
@section('content')

    <div class="alert alert-solid-dark alert-dismissible fade show text-white mt-4">
        アナウンス情報をここに掲載します。アナウンス情報をここに掲載します。
        <button type="button" class="btn-close text-white" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x"></i></button>
    </div>
    <div class="row">
        <div class="col-xxl-12 col-xl-12">
            <div class="card custom-card">
                <div class="card-header  justify-content-between">
                    <div class="card-title">
                    {{ __('system') }}
                    </div>
                </div>
                <br>
                <div class="row px-2">
                    <div class="col-xl-2">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title text-center">
                                        <strong>品質レポート</strong>
                                    </div>
                                    <div class="btn-list">
                                        <a href="#"><button type="button"
                                                class="btn btn-outline-primary w-100">国内品質レポート</button></a>
                                        <a href="#"><button type="button"
                                                class="btn btn-outline-primary w-100">J-MAP</button></a>
                                        <a href="#"><button type="button"
                                                class="btn btn-outline-primary w-100">FlashReport</button></a>
                                        <a href="#"><button type="button"
                                                class="btn btn-outline-primary w-100">重要案件管理</button></a>
                                        <a href="#"><button type="button"
                                                class="btn btn-outline-primary w-100">着荷不良連絡</button></a>
                                        <a href="#"><button type="button"
                                                class="btn btn-outline-primary w-100">クレーム費用<br>集計・配賦</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title text-center">
                                        <strong>ワランティ</strong>
                                    </div>
                                    <div class="btn-list">
                                        <a href="#"><button type="button"
                                                class="btn btn-outline-primary w-100">国内ワランティ</button></a>
                                        <a href="#"><button type="button"
                                                class="btn btn-outline-primary w-100">系統費用処理</button></a>
                                        <a href="#"><button type="button"
                                                class="btn btn-outline-primary w-100">海外ワランティ</button></a>
                                        <a href="#"><button type="button"
                                                class="btn btn-outline-primary w-100">KWRS</button></a>
                                        <a href="#"><button type="button"
                                                class="btn btn-outline-primary w-100">キャンペーン<br>進捗管理</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title text-center">
                                        <strong>分析</strong>
                                    </div>
                                    <div class="btn-list">

                                        <a href="#"><button type="button"
                                                class="btn btn-outline-primary w-100">EDAS</button></a>
                                        <a href="#"><button type="button"
                                                class="btn btn-outline-primary w-100">Power-Bl</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="col-xl-12">
                            <div class="card">

                                <div class="card-body">
                                    <div class="card-title text-center">
                                        <strong>情報系</strong>
                                    </div>
                                    <div class="btn-list">

                                        <a href="#"><button type="button"
                                                class="btn btn-outline-primary w-100">ワランティ検索</button></a>
                                        <a href="#"><button type="button"
                                                class="btn btn-outline-primary w-100">K-PTM<br>(製品取れザビリティ)</button></a>
                                        <a href="#"><button type="button"
                                                class="btn btn-outline-primary w-100">EDI</button></a>
                                        <a href="#"><button type="button"
                                                class="btn btn-outline-primary w-100">DWH</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="col-xl-12">
                            <div class="card">

                                <div class="card-body">
                                    <div class="card-title text-center">
                                        <strong>集計</strong>
                                    </div>
                                    <div class="btn-list">

                                        <a href="#"><button type="button"
                                                class="btn btn-outline-primary w-100">Dr.Sum</button></a>
                                        <a href="#"><button type="button"
                                                class="btn btn-outline-primary w-100">新K-Action</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="col-xl-12">
                            <div class="card">

                                <div class="card-body">
                                    <div class="card-title text-center">
                                        <strong>その他</strong>
                                    </div>
                                    <div class="btn-list">

                                        <a href="#"><button type="button"
                                                class="btn btn-outline-primary w-100">回収部品</button></a>
                                        <a href="#"><button type="button"
                                                class="btn btn-outline-primary w-100">マスタ管理</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-6 col-xl-6">
            <div class="row">
                <div class="col-xl-12">
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            <div class="card-header  justify-content-between">
                                <div class="card-title">
                                   <a href="{{ route('link_template_list') }}">{{ __('application_format_template') }} </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="accordion" id="accordionPanelsStayOpenExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                            <button class="accordion-button" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#panelsStayOpen-collapse01"
                                                aria-expanded="true"
                                                aria-controls="panelsStayOpen-collapse01">
                                                申請フォーマット
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapse01"
                                            class="accordion-collapse collapse show"
                                            aria-labelledby="panelsStayOpen-heading01">
                                            <div class="accordion-body">
                                                <ul>
                                                    <li><a href="#">フォーマットの詳細ページへのリンク</a></li>
                                                    <li><a href="#">フォーマットの詳細ページへのリンク</a></li>
                                                    <li><a href="#">フォーマットの詳細ページへのリンク</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#panelsStayOpen-collapse02"
                                                            aria-expanded="false"
                                                            aria-controls="panelsStayOpen-collapse02">
                                                            テンプレート
                                                        </button>
                                                    </h2>
                                                    <div id="panelsStayOpen-collapse02"
                                                        class="accordion-collapse collapse"
                                                        aria-labelledby="panelsStayOpen-heading02">
                                                        <div class="accordion-body">
                                                            <ul>
                                                                <li><a href="#">フォーマットの詳細ページへのリンク</a></li>
                                                                <li><a href="#">フォーマットの詳細ページへのリンク</a></li>
                                                                <li><a href="#">フォーマットの詳細ページへのリンク</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#panelsStayOpen-collapse03"
                                                            aria-expanded="false"
                                                            aria-controls="panelsStayOpen-collapse03">
                                                            カテゴリ3
                                                        </button>
                                                    </h2>
                                                    <div id="panelsStayOpen-collapse03"
                                                        class="accordion-collapse collapse"
                                                        aria-labelledby="panelsStayOpen-heading03">
                                                        <div class="accordion-body">
                                                            <ul>
                                                                <li><a href="#">フォーマットの詳細ページへのリンク</a></li>
                                                                <li><a href="#">フォーマットの詳細ページへのリンク</a></li>
                                                                <li><a href="#">フォーマットの詳細ページへのリンク</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#panelsStayOpen-collapse04"
                                                            aria-expanded="true"
                                                            aria-controls="panelsStayOpen-collapse04">
                                                            カテゴリ４
                                                        </button>
                                                    </h2>
                                                    <div id="panelsStayOpen-collapse04"
                                                        class="accordion-collapse collapse"
                                                        aria-labelledby="panelsStayOpen-heading04">
                                                        <div class="accordion-body">
                                                            <ul>
                                                                <li><a href="#">フォーマットの詳細ページへのリンク</a></li>
                                                                <li><a href="#">フォーマットの詳細ページへのリンク</a></li>
                                                                <li><a href="#">フォーマットの詳細ページへのリンク</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#panelsStayOpen-collapse05"
                                                            aria-expanded="false"
                                                            aria-controls="panelsStayOpen-collapse05">
                                                            カテゴリ５
                                                        </button>
                                                    </h2>
                                                    <div id="panelsStayOpen-collapse05"
                                                        class="accordion-collapse collapse"
                                                        aria-labelledby="panelsStayOpen-heading05">
                                                        <div class="accordion-body">
                                                            <ul>
                                                                <li><a href="#">フォーマットの詳細ページへのリンク</a></li>
                                                                <li><a href="#">フォーマットの詳細ページへのリンク</a></li>
                                                                <li><a href="#">フォーマットの詳細ページへのリンク</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#panelsStayOpen-collapse06"
                                                            aria-expanded="false"
                                                            aria-controls="panelsStayOpen-collapse06">
                                                            カテゴリ６
                                                        </button>
                                                    </h2>
                                                    <div id="panelsStayOpen-collapse06"
                                                        class="accordion-collapse collapse"
                                                        aria-labelledby="panelsStayOpen-heading06">
                                                        <div class="accordion-body">
                                                            <ul>
                                                                <li><a href="#">フォーマットの詳細ページへのリンク</a></li>
                                                                <li><a href="#">フォーマットの詳細ページへのリンク</a></li>
                                                                <li><a href="#">フォーマットの詳細ページへのリンク</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#panelsStayOpen-collapse07"
                                                            aria-expanded="true"
                                                            aria-controls="panelsStayOpen-collapse07">
                                                            カテゴリ７
                                                        </button>
                                                    </h2>
                                                    <div id="panelsStayOpen-collapse07"
                                                        class="accordion-collapse collapse"
                                                        aria-labelledby="panelsStayOpen-heading07">
                                                        <div class="accordion-body">
                                                            <ul>
                                                                <li><a href="#">フォーマットの詳細ページへのリンク</a></li>
                                                                <li><a href="#">フォーマットの詳細ページへのリンク</a></li>
                                                                <li><a href="#">フォーマットの詳細ページへのリンク</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#panelsStayOpen-collapse08"
                                                            aria-expanded="false"
                                                            aria-controls="panelsStayOpen-collapse08">
                                                            カテゴリ８
                                                        </button>
                                                    </h2>
                                                    <div id="panelsStayOpen-collapse08"
                                                        class="accordion-collapse collapse"
                                                        aria-labelledby="panelsStayOpen-heading08">
                                                        <div class="accordion-body">
                                                            <ul>
                                                                <li><a href="#">フォーマットの詳細ページへのリンク</a></li>
                                                                <li><a href="#">フォーマットの詳細ページへのリンク</a></li>
                                                                <li><a href="#">フォーマットの詳細ページへのリンク</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="col-xl-12">
                                    <div class="card custom-card">
                                        <div class="card-header  justify-content-between">
                                            <div class="card-title">
                                                <a href="{{ route('link_template_list') }}"> {{ __('various_link') }} </a>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="accordion" id="accordionPanelsStayOpenExample">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                                        <button class="accordion-button" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#panelsStayOpen-collapse21"
                                                            aria-expanded="true"
                                                            aria-controls="panelsStayOpen-collapseOne">
                                                            カテゴリ１
                                                        </button>
                                                    </h2>
                                                    <div id="panelsStayOpen-collapse21"
                                                        class="accordion-collapse collapse show"
                                                        aria-labelledby="panelsStayOpen-headingOne">
                                                        <div class="accordion-body">
                                                            <ul>
                                                                <li><a href="#">リンクテキスト1234567890</a></li>
                                                                <li><a href="#">リンクテキスト1234567890</a></li>
                                                                <li><a href="#">リンクテキスト1234567890</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#panelsStayOpen-collapse22"
                                                            aria-expanded="false"
                                                            aria-controls="panelsStayOpen-collapseTwo">
                                                            カテゴリ２
                                                        </button>
                                                    </h2>
                                                    <div id="panelsStayOpen-collapse22"
                                                        class="accordion-collapse collapse"
                                                        aria-labelledby="panelsStayOpen-headingTwo">
                                                        <div class="accordion-body">
                                                            <ul>
                                                                <li><a href="#">リンクテキスト1234567890</a></li>
                                                                <li><a href="#">リンクテキスト1234567890</a></li>
                                                                <li><a href="#">リンクテキスト1234567890</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#panelsStayOpen-collapse23"
                                                            aria-expanded="false"
                                                            aria-controls="panelsStayOpen-collapseThree">
                                                            カテゴリ３
                                                        </button>
                                                    </h2>
                                                    <div id="panelsStayOpen-collapse23"
                                                        class="accordion-collapse collapse"
                                                        aria-labelledby="panelsStayOpen-headingThree">
                                                        <div class="accordion-body">
                                                            <ul>
                                                                <li><a href="#">リンクテキスト1234567890</a></li>
                                                                <li><a href="#">リンクテキスト1234567890</a></li>
                                                                <li><a href="#">リンクテキスト1234567890</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#panelsStayOpen-collapse24"
                                                            aria-expanded="false"
                                                            aria-controls="panelsStayOpen-collapseThree">
                                                            カテゴリ４
                                                        </button>
                                                    </h2>
                                                    <div id="panelsStayOpen-collapse24"
                                                        class="accordion-collapse collapse"
                                                        aria-labelledby="panelsStayOpen-headingThree">
                                                        <div class="accordion-body">
                                                            <ul>
                                                                <li><a href="#">リンクテキスト1234567890</a></li>
                                                                <li><a href="#">リンクテキスト1234567890</a></li>
                                                                <li><a href="#">リンクテキスト1234567890</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#panelsStayOpen-collapse25"
                                                            aria-expanded="false"
                                                            aria-controls="panelsStayOpen-collapseThree">
                                                            カテゴリ５
                                                        </button>
                                                    </h2>
                                                    <div id="panelsStayOpen-collapse25"
                                                        class="accordion-collapse collapse"
                                                        aria-labelledby="panelsStayOpen-headingThree">
                                                        <div class="accordion-body">
                                                            <ul>
                                                                <li><a href="#">リンクテキスト1234567890</a></li>
                                                                <li><a href="#">リンクテキスト1234567890</a></li>
                                                                <li><a href="#">リンクテキスト1234567890</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#panelsStayOpen-collapse26"
                                                            aria-expanded="false"
                                                            aria-controls="panelsStayOpen-collapseThree">
                                                            カテゴリ６
                                                        </button>
                                                    </h2>
                                                    <div id="panelsStayOpen-collapse26"
                                                        class="accordion-collapse collapse"
                                                        aria-labelledby="panelsStayOpen-headingThree">
                                                        <div class="accordion-body">
                                                            <ul>
                                                                <li><a href="#">リンクテキスト1234567890</a></li>
                                                                <li><a href="#">リンクテキスト1234567890</a></li>
                                                                <li><a href="#">リンクテキスト1234567890</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#panelsStayOpen-collapse27"
                                                            aria-expanded="false"
                                                            aria-controls="panelsStayOpen-collapseThree">
                                                            カテゴリ７
                                                        </button>
                                                    </h2>
                                                    <div id="panelsStayOpen-collapse27"
                                                        class="accordion-collapse collapse"
                                                        aria-labelledby="panelsStayOpen-headingThree">
                                                        <div class="accordion-body">
                                                            <ul>
                                                                <li><a href="#">リンクテキスト1234567890</a></li>
                                                                <li><a href="#">リンクテキスト1234567890</a></li>
                                                                <li><a href="#">リンクテキスト1234567890</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#panelsStayOpen-collapse28"
                                                            aria-expanded="false"
                                                            aria-controls="panelsStayOpen-collapseThree">
                                                            カテゴリ８
                                                        </button>
                                                    </h2>
                                                    <div id="panelsStayOpen-collapse28"
                                                        class="accordion-collapse collapse"
                                                        aria-labelledby="panelsStayOpen-headingThree">
                                                        <div class="accordion-body">
                                                            <ul>
                                                                <li><a href="#">リンクテキスト1234567890</a></li>
                                                                <li><a href="#">リンクテキスト1234567890</a></li>
                                                                <li><a href="#">リンクテキスト1234567890</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="card custom-card">
                                    <div class="card-header  justify-content-between">
                                        <div class="card-title">
                                            {{ __('management_function') }}
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <ul>
                                            <li><a href="{{ route('admin_notice_list') }}">お知らせ管理</a></li>
                                            <li><a href="{{ route('announcement_edit') }}">アナウンス編集</a></li>
                                            <li><a href="{{ route('contact_information_edit') }}">お問い合わせ先情報編集</a></li>
                                            <li><a href="{{ route('user_info') }}">ユーザー管理</a></li>
                                            <li><a href="#">所属情報管理</a></li>
                                            <li><a href="{{ route('user_independant') }}">独立系販社管理</a></li>
                                            <li><a href="{{ route('system_link.list') }}">システムリンク管理</a></li>
                                            <li><a href="{{ route('link_template_list') }}">リンク・テンプレート管理</a></li>
                                            <li><a href="{{ route('user_permission_list') }}">ユーザグループ権限情報管理</a></li>
                                            <li><a href="{{ route('faq_article_list') }}">FAQ管理</a></li>
                                            <li><a href="{{ route('enquiry_management') }}">お問い合わせフォーム管理</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-6 col-xl-6">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="col-xl-12">
                                    <div class="card custom-card">
                                        <div class="card-header  justify-content-between">
                                            <div class="card-title">
                                                <a href="{{ route('admin_notice_list') }}">{{ __('notice') }}</a>
                                            </div>
                                            <div class="prism-toggle">
                                            <a href="{{ route('admin_notice_list') }}"><button class="btn btn-sm btn-primary-light">一覧<i
                                                        class="bi bi-chevron-right"></i></button></a>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <ul>
                                                <li><a href="#">[調査報告/再発防止報告]●●●に伴うサイトメンテナンス・・・</a></li>
                                                <li><a href="#">[調査報告/再発防止報告]●●●に伴うサイトメンテナンス・・・</a></li>
                                                <li><a href="#">[調査報告/再発防止報告]●●●に伴うサイトメンテナンス・・・</a></li>
                                                <li><a href="#">[調査報告/再発防止報告]●●●に伴うサイトメンテナンス・・・</a></li>
                                                <li><a href="#">[調査報告/再発防止報告]●●●に伴うサイトメンテナンス・・・</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="col-xl-12">
                                        <div class="card custom-card">
                                            <div class="card-header  justify-content-between">
                                                <div class="card-title">
                                                    <a href="{{ route('faq_article_list') }}">{{ __('faq') }}</a>
                                                </div>
                                                <div class="prism-toggle">
                                                <a href="{{ route('faq_article_list') }}"><button class="btn btn-sm btn-primary-light">一覧<i
                                                            class="bi bi-chevron-right"></i></button></a>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <ul>
                                                    <li><a href="#">Datalizerの●●●の設定について</a></li>
                                                    <li><a href="#">Datalizerの●●●の設定について</a></li>
                                                    <li><a href="#">Datalizerの●●●の設定について</a></li>
                                                    <li><a href="#">Datalizerの●●●の設定について</a></li>
                                                    <li><a href="#">Datalizerの●●●の設定について</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="col-xl-12">
                                        <div class="card custom-card">
                                            <div class="card-header  justify-content-between">
                                                <div class="card-title">
                                                    <a href="#"> {{ __('core_system_doc_management') }} </a>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="accordion" id="accordionPanelsStayOpenExample">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                                            <button class="accordion-button" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#panelsStayOpen-collapse31"
                                                                aria-expanded="true"
                                                                aria-controls="panelsStayOpen-collapse01">
                                                                申請フォーマット
                                                            </button>
                                                        </h2>
                                                        <div id="panelsStayOpen-collapse31"
                                                            class="accordion-collapse collapse show"
                                                            aria-labelledby="panelsStayOpen-heading01">
                                                            <div class="accordion-body">
                                                                <ul>
                                                                    <li><a href="#">文書詳細へのリンク</a></li>
                                                                    <li><a href="#">文書詳細へのリンク</a></li>
                                                                    <li><a href="#">文書詳細へのリンク</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#panelsStayOpen-collapse32"
                                                                aria-expanded="false"
                                                                aria-controls="panelsStayOpen-collapse02">
                                                                テンプレート
                                                            </button>
                                                        </h2>
                                                        <div id="panelsStayOpen-collapse32"
                                                            class="accordion-collapse collapse"
                                                            aria-labelledby="panelsStayOpen-heading02">
                                                            <div class="accordion-body">
                                                                <ul>
                                                                    <li><a href="#">文書詳細へのリンク</a></li>
                                                                    <li><a href="#">文書詳細へのリンク</a></li>
                                                                    <li><a href="#">文書詳細へのリンク</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#panelsStayOpen-collapse33"
                                                                aria-expanded="false"
                                                                aria-controls="panelsStayOpen-collapse02">
                                                                カテゴリ３
                                                            </button>
                                                        </h2>
                                                        <div id="panelsStayOpen-collapse33"
                                                            class="accordion-collapse collapse"
                                                            aria-labelledby="panelsStayOpen-heading02">
                                                            <div class="accordion-body">
                                                                <ul>
                                                                    <li><a href="#">文書詳細へのリンク</a></li>
                                                                    <li><a href="#">文書詳細へのリンク</a></li>
                                                                    <li><a href="#">文書詳細へのリンク</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#panelsStayOpen-collapse34"
                                                                aria-expanded="false"
                                                                aria-controls="panelsStayOpen-collapse02">
                                                                カテゴリ４
                                                            </button>
                                                        </h2>
                                                        <div id="panelsStayOpen-collapse34"
                                                            class="accordion-collapse collapse"
                                                            aria-labelledby="panelsStayOpen-heading02">
                                                            <div class="accordion-body">
                                                                <ul>
                                                                    <li><a href="#">文書詳細へのリンク</a></li>
                                                                    <li><a href="#">文書詳細へのリンク</a></li>
                                                                    <li><a href="#">文書詳細へのリンク</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#panelsStayOpen-collapse35"
                                                                aria-expanded="false"
                                                                aria-controls="panelsStayOpen-collapse02">
                                                                カテゴリ５
                                                            </button>
                                                        </h2>
                                                        <div id="panelsStayOpen-collapse35"
                                                            class="accordion-collapse collapse"
                                                            aria-labelledby="panelsStayOpen-heading02">
                                                            <div class="accordion-body">
                                                                <ul>
                                                                    <li><a href="#">文書詳細へのリンク</a></li>
                                                                    <li><a href="#">文書詳細へのリンク</a></li>
                                                                    <li><a href="#">文書詳細へのリンク</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#panelsStayOpen-collapse36"
                                                                aria-expanded="false"
                                                                aria-controls="panelsStayOpen-collapse02">
                                                                カテゴリ６
                                                            </button>
                                                        </h2>
                                                        <div id="panelsStayOpen-collapse36"
                                                            class="accordion-collapse collapse"
                                                            aria-labelledby="panelsStayOpen-heading02">
                                                            <div class="accordion-body">
                                                                <ul>
                                                                    <li><a href="#">文書詳細へのリンク</a></li>
                                                                    <li><a href="#">文書詳細へのリンク</a></li>
                                                                    <li><a href="#">文書詳細へのリンク</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#panelsStayOpen-collapse37"
                                                                aria-expanded="false"
                                                                aria-controls="panelsStayOpen-collapse02">
                                                                カテゴリ７
                                                            </button>
                                                        </h2>
                                                        <div id="panelsStayOpen-collapse37"
                                                            class="accordion-collapse collapse"
                                                            aria-labelledby="panelsStayOpen-heading02">
                                                            <div class="accordion-body">
                                                                <ul>
                                                                    <li><a href="#">文書詳細へのリンク</a></li>
                                                                    <li><a href="#">文書詳細へのリンク</a></li>
                                                                    <li><a href="#">文書詳細へのリンク</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#panelsStayOpen-collapse38"
                                                                aria-expanded="false"
                                                                aria-controls="panelsStayOpen-collapse02">
                                                                カテゴリ８
                                                            </button>
                                                        </h2>
                                                        <div id="panelsStayOpen-collapse38"
                                                            class="accordion-collapse collapse"
                                                            aria-labelledby="panelsStayOpen-heading02">
                                                            <div class="accordion-body">
                                                                <ul>
                                                                    <li><a href="#">文書詳細へのリンク</a></li>
                                                                    <li><a href="#">文書詳細へのリンク</a></li>
                                                                    <li><a href="#">文書詳細へのリンク</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="col-xl-12">
                                        <div class="card custom-card">
                                            <div class="card-header  justify-content-between">
                                                <div class="card-title">
                                                    {{ __('contact_information') }}
                                                </div>
                                            </div>
                                            <div class="card-body contact">
                                                <p>当サイトについてのお問い合わせは下記までお願いいたします。<br><br>
                                                    <strong>株式会社 クボタ</strong><br>
                                                    機械事業本部 <i class="bi bi-chevron-right"></i> 機械カスタマーファースト品質本部 <i
                                                        class="bi bi-chevron-right"></i> 機械カスタマーファースト情報管理部 <i
                                                        class="bi bi-chevron-right"></i> 情報管理第一課 (グローバル技術研究所)<br><br>
                                                    <strong>メールアドレス</strong>：<a
                                                        href="mailto:group_ml_12345@kubota.com">group_ml_12345@kubota.com</a>
                                                </p>
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
</div>
@endsection