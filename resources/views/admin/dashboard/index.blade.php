@extends('layouts.base')
@section('content')

@include('components.announcement')

<div class="row">
    <div class="col-xxl-12 col-xl-12">
        <div class="card custom-card">
            <div class="card-header  justify-content-between">
                <div class="card-title">
                    システム
                </div>
            </div>
            <br>
            <div class="row px-2">
                <?php
                    if($systemLinks){
                        foreach($systemLinks as $key=> $systemLink){
                            ?>
                            <div class="col-xl-2">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-title text-center">
                                                <strong>{{$key}}</strong>
                                            </div>
                                            <div class="btn-list">
                                                <?php foreach($systemLink as $item) { ?>
                                                    <a href="{{ $item->url }}"><button type="button" class="btn btn-outline-primary w-100">{{ $item->system_name }}</button></a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    } else  {
                        ?>
                        <div class="card-title text-center mb-2"><strong>{{ __('no_groups_error') }}</strong></div>
                        <?php
                    }
                ?>
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
                                <a href="{{ route('link_template_list') }}"> 申請フォーマット・テンプレート等 </a>
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
                                <a href="{{ route('link_template_list') }}"> 各種リンク </a>
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
            <div class="col-xl-12" id="manage">
                <div class="card custom-card">
                    <div class="card-header  justify-content-between">
                        <div class="card-title">
                            {{ __('management_function') }}
                        </div>
                    </div>
                    <div class="card-body">
                        <ul>
                            <li><a href="{{ route('admin_notice_list') }}">お知らせ管理</a></li>
                            <li><a href="{{ route('announcement.create') }}">アナウンス編集</a></li>
                            <li><a href="{{ route('contact_information_edit') }}">お問い合わせ先情報編集</a></li>
                            <li><a href="{{ route('user_info') }}">ユーザー管理</a></li>
                            <li><a href="{{ route('affiliation_information_list') }}">所属情報管理</a></li>
                            <li><a href="{{ route('independent_company_list') }}">独立系販社管理</a></li>
                            <li><a href="{{ route('system_link.list') }}">システムリンク管理</a></li>
                            <li><a href="{{ route('link_template_list') }}">リンク・テンプレート管理</a></li>
                            <li><a href="{{ route('user_permission_list') }}">ユーザーグループ権限情報管理</a></li>
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
                                <a href="{{ route('admin_notice_list') }}">お知らせ</a>
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
                                    <a href="#"> 基幹システム(文書管理) </a>
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
                                    お問い合わせ先
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
@endsection