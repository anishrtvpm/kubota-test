@extends('layouts.base')
@section('content')

<?php
    if(isset($faqData->faq_id) && $faqData->faq_id){
        $title = 'FAQ編集';
    }else{
        $title = 'FAQ作成';
    }
?>

<div class="d-md-flex d-block align-items-center justify-content-between mt-2 page-header-breadcrumb">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style2 mb-0">
            <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">トップページ</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}#manage">管理画面</a></li>
            <li class="breadcrumb-item"><a href="#">FAQ管理</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title ?>
</li>
</ol>
</nav>
@include('layouts.navigation')
</div>
<div class="alert alert-solid-dark alert-dismissible fade show text-white mt-4">
    <?= $title ?>
</div>
<div class="row">
    <div class="col-xxl-12 col-xl-12">
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card mb-5">
                    <div class="card-body">
                        <form method="POST" id="faq_data_form" action="{{route('faq_data.store')}}" novalidate="novalidate">
                            
                            <input type="hidden" name="faq_id" id="faq_id" value="{{ isset($faqData) ?  $faqData->faq_id : '' }}">
                            
                            <?php if(isset($faqData->faq_id) && $faqData->faq_id){ ?>
                                <div class="col-md-6 row mb-3">
                                    <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label">FAQ No.</label>
                                    <div class="col-sm-7 mb-2 me-1">
                                        <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label">{{ $faqData->faq_id }}</label>
                                    </div>
                                </div>
                            <?php } ?>

                            <div class="col-md-6 row mb-3">
                                <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label">システム</label>
                                <div class="col-sm-7 mb-2">
                                    <select class="form-select" id="top_category_name" name="top_category_name" tabindex="1">
                                        <?php if(!isset($faqData)){ ?>
                                            <option>システム選択</option>
                                        <?php } ?>
                                        @foreach ($topCategories as $item)
                                            <option value="{{ $item->name }}" {{ isset($faqData) ?
                                                ($faqData->top_category_name == $item->name ?
                                                'selected' : '' ) : '' }}>{{ $item->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 row mb-3">
                                <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label">カテゴリ</label>
                                <div class="col-sm-7 mb-2">
                                    <select class="form-select" id="category_id" name="category_id" tabindex="2">
                                        <?php if(!isset($faqData)){ ?>
                                            <option>カテゴリー選択</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 row mb-3">
                                <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label">表示順</label>
                                <div class="col-sm-7 mb-2">
                                    <input type="number" class="form-control" id="sort" name="sort" tabindex="3" maxlength="8">
                                </div>
                            </div>
                            <div class="col-md-6 row mb-3">
                                <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label">タイトル</label>
                                <div class="col-sm-7 mb-2">
                                    <input type="text" class="form-control" id="title" name="title" tabindex="4" maxlength="100">
                                </div>
                            </div>
                            <div class="col-md-12 row mb-2">
                                <label for="text-area" class="col-sm-2 col-form-label col-form-label">質問内容</label>
                                <div class="col-sm-9 mb-2">
                                    <div id="q_message"></div>
                                </div>
                            </div>
                            <div class="col-md-12 row mb-2">
                                <label for="text-area" class="col-sm-2 col-form-label col-form-label">回答内容</label>
                                <div class="col-sm-9 mb-2">
                                    <div id="a_message"></div>
                                </div>
                            </div>
                            <div class="col-md-12 row mb-3">
                                <label for="text-area" class="col-sm-2 col-form-label col-form-label">参加画像</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="file" id="image_path[]" name="image_path[]" tabindex="7" multiple>
                                </div>
                            </div>
                            <div class="col-md-12 row mb-3">
                                <label for="text-area" class="col-sm-2 col-form-label col-form-label">参加URL</label>
                                <div class="col-sm-9 mb-2">
                                    <textarea class="form-control resize" id="reference_url" name="reference_url" rows="1" maxlength="8000" tabindex="8"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 row mb-3">
                                <label for="text-area" class="col-sm-2 col-form-label col-form-label">質問日</label>
                                <div class="col-sm-2 mb-2">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-text text-muted"> <i class="ri-calendar-line"></i></div>
                                            <input type="text" class="form-control flatpickr-input datepicker" id="question_date" name="question_date" tabindex="9">
                                        </div>
                                    </div>
                                </div>
                                <label for="text-area"
                                    class="col-sm-1 col-form-label col-form-label text-end">回答日</label>
                                <div class="col-sm-2 mb-2">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-text text-muted"> <i class="ri-calendar-line"></i></div>
                                            <input type="text" class="form-control flatpickr-input datepicker" id="answer_date" name="answer_date" tabindex="10">
                                        </div>
                                    </div>
                                </div>
                                <label for="text-area"
                                    class="col-sm-1 col-form-label col-form-label text-end">回答者</label>
                                <div class="col-sm-2 mb-2">
                                    <input type="text" class="form-control" id="input-email2" placeholder="山田　太郎">
                                </div>
                            </div>
                            <div class="col-md-12 row mb-3">
                                <label for="text-area" class="col-sm-2 col-form-label col-form-label">状態</label>
                                <div class="col-sm-2 mb-2">
                                    <select class="form-select" id="inlineFormSelectCatParent5">
                                        <option selected>公開中</option>
                                        <option value="1">未公開</option>
                                        <option value="2">保留中</option>
                                    </select>
                                </div>
                                <label for="text-area"
                                    class="col-sm-1 col-form-label col-form-label text-end">言語</label>
                                <div class="col-sm-2 mb-2">
                                    <select class="form-select" id="inlineFormSelectCatParent1">
                                        <option selected>日本語</option>
                                        <option value="1">日本語</option>
                                        <option value="2">英語</option>
                                    </select>
                                </div>
                                <label for="text-area" class="col-sm-1 col-form-label col-form-label text-end"></label>
                                <div class="col-sm-2 mb-2">
                                </div>
                            </div>

                            <div class="col-md-12 row mb-5">
                                <label for="text-area" class="col-sm-2 col-form-label col-form-label">配信先</label>
                                <div class="col-sm-9 mb-5">
                                    <div class="form-check form-check-lg d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" value="" id="checkebox-lg14"
                                            checked="">
                                        <label class="form-check-label me-5" for="checkebox-lg">
                                            01:機械CF品質本部・国内事業所・研究開発部門
                                        </label>
                                        <input class="form-check-input" type="checkbox" value="" id="checkebox-lg15">
                                        <label class="form-check-label" for="checkebox-lg">
                                            02:国内販社
                                        </label>
                                    </div>
                                    <div class="form-check form-check-lg d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" value="" id="checkebox-lg16">
                                        <label class="form-check-label me-5" for="checkebox-lg">
                                            03:海外事業所(K-QUIC利用あり)
                                        </label>
                                        <input class="form-check-input" type="checkbox" value="" id="checkebox-lg17">
                                        <label class="form-check-label" for="checkebox-lg">
                                            04:海外事業所(K-QUIC利用なし)
                                        </label>
                                    </div>
                                    <div class="form-check form-check-lg d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" value="" id="checkebox-lg18">
                                        <label class="form-check-label me-5" for="checkebox-lg">
                                            05:M&A
                                        </label>
                                        <input class="form-check-input" type="checkbox" value="" id="checkebox-lg19">
                                        <label class="form-check-label" for="checkebox-lg">
                                            06:独立系販社
                                        </label>
                                    </div>
                                </div>
                                <div class="gap-2 col-3 mx-auto mb-3">
                                    <button class="btn btn-danger px-4 me-3" type="button">削除する</button>
                                    <button class="btn btn-warning px-4" type="button">投稿する</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/admin/faq_data.js') }}"></script>
@endsection