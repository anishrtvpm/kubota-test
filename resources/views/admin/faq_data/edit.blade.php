@extends('layouts.base')
@section('content')

<?php
    if(isset($faqData->faq_id) && $faqData->faq_id){
        $titleHead = 'FAQ編集';
    }else{
        $titleHead = 'FAQ作成';
    }
?>

<div class="d-md-flex d-block align-items-center justify-content-between mt-2 page-header-breadcrumb">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style2 mb-0">
            <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">トップページ</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}#manage">管理画面</a></li>
            <li class="breadcrumb-item"><a href="{{ route('faq_data.list') }}">FAQ管理</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $titleHead ?></li>
        </ol>
    </nav>
    @include('layouts.navigation')
</div>
<div class="alert alert-solid-dark alert-dismissible fade show text-white mt-4">
    {{ $titleHead }}
</div>
<div class="row">
    <div class="col-xxl-12 col-xl-12">
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card mb-5">
                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form method="POST" id="faq_data_form" action="{{route('faq_data.store')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="faq_id" id="faq_id" value="{{ isset($faqData) ?  $faqData->faq_id : 0 }}">
                            <?php if(isset($faqData) && $faqData->faq_id){ ?>
                                <div class="col-md-6 row mb-3">
                                    <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label">FAQ No.</label>
                                    <div class="col-sm-7 mb-2 me-1">
                                        <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label">
                                            {{ $faqData->faq_id}}
                                        </label>
                                    </div>
                                </div>
                            <?php } ?>

                            <div class="col-md-6 row mb-3">
                                <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label">システム</label>
                                <div class="col-sm-7 mb-2">
                                    <select class="form-select @if($errors->has('top_category_name')) error @endif" id="top_category_name" name="top_category_name" tabindex="1">
                                        <option value="">システム選択</option>
                                        @foreach ($topCategories as $item)
                                            <option value="{{ $item->name }}" {{ isset($faqData) ? ($faqData->top_category_name ==
                                                $item->name ? 'selected' : '' ) : '' }}>{{ $item->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('top_category_name'))
                                        <span class="text-danger">
                                            {{ $errors->first('top_category_name') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 row mb-3">
                                <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label">カテゴリ</label>
                                <div class="col-sm-7 mb-2">
                                    <select class="form-select @if($errors->has('category_id')) error @endif" id="category_id" name="category_id" tabindex="2">
                                        <option value="">カテゴリ選択</option>
                                    </select>
                                    @if ($errors->has('category_id'))
                                        <span class="text-danger">
                                            {{ $errors->first('category_id') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 row mb-3">
                                <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label">表示順</label>
                                <div class="col-sm-7 mb-2">
                                    <input type="text" class="form-control @if($errors->has('sort')) error @endif" id="sort" name="sort" tabindex="3" maxlength="8"
                                     autocomplete="off" value="{{ isset($faqData) ?  $faqData->sort : '' }}">
                                     @if ($errors->has('sort'))
                                        <span class="text-danger">
                                            {{ $errors->first('sort') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 row mb-3">
                                <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label">タイトル</label>
                                <div class="col-sm-7 mb-2">
                                    <input type="text" class="form-control @if($errors->has('title')) error @endif" id="title" name="title" tabindex="4" maxlength="100"
                                     autocomplete="off" value="{{ isset($faqData) ?  $faqData->title : '' }}">
                                     @if ($errors->has('title'))
                                        <span class="text-danger">
                                            {{ $errors->first('title') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12 row mb-2">
                                <label for="text-area" class="col-sm-2 col-form-label col-form-label">質問内容</label>
                                <div class="col-sm-9 mb-2 summernote-container">
                                    <textarea id="q_message" name="q_message" class="summernote-custom" tabindex="5" required> {{ isset($faqData) ?  $faqData->q_message : '' }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12 row mb-2">
                                <label for="text-area" class="col-sm-2 col-form-label col-form-label">回答内容</label>
                                <div class="col-sm-9 mb-2 summernote-container">
                                    <textarea id="a_message" name="a_message" class="summernote-custom"  tabindex="6" required >{{ isset($faqData) ?  $faqData->a_message : '' }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12 row mb-3">
                                <label for="text-area" class="col-sm-2 col-form-label col-form-label">参加画像</label>
                                <div class="col-sm-9">
                                    <input class="form-control @if($errors->has('files')) error @endif" type="file" name="files" tabindex="7" multiple accept=".gif, .tif, .png, .jpg, .mov, .mpg, .wma, .pdf, .doc, .docx, .xls, .xlsx, .ppt, .pptx, .txt, .csv, .zip">
                                    @if ($errors->has('files'))
                                        <span class="text-danger">
                                            {{ $errors->first('files') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12 row mb-3">
                                <label for="text-area" class="col-sm-2 col-form-label col-form-label">参加URL</label>
                                <div class="col-sm-9 mb-2">
                                    <textarea class="form-control resize @if($errors->has('reference_url')) error @endif" id="reference_url" name="reference_url" rows="1"
                                        maxlength="8000" tabindex="8">{{ isset($faqData) ?  $faqData->reference_url : '' }}</textarea>
                                    @if ($errors->has('reference_url'))
                                        <span class="text-danger">
                                            {{ $errors->first('reference_url') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12 row mb-3">
                                <label for="text-area" class="col-sm-2 col-form-label col-form-label">質問日</label>
                                <div class="col-sm-2 mb-2">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-text text-muted"> <i class="ri-calendar-line"></i></div>
                                            <input type="text" class="form-control flatpickr-input datepicker @if($errors->has('question_date')) error @endif"
                                             id="question_date" name="question_date" tabindex="9" value="{{ isset($faqData) ?  $faqData->question_date : '' }}">
                                             @if ($errors->has('question_date'))
                                                <span class="text-danger">
                                                    {{ $errors->first('question_date') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <label for="text-area" class="col-sm-1 col-form-label col-form-label text-end">回答日</label>
                                <div class="col-sm-2 mb-2">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-text text-muted"> <i class="ri-calendar-line"></i></div>
                                            <input type="text" class="form-control flatpickr-input datepicker @if($errors->has('answer_date')) error @endif"
                                             id="answer_date" name="answer_date" tabindex="10" value="{{ isset($faqData) ?  $faqData->answer_date : '' }}">
                                             @if ($errors->has('answer_date'))
                                                <span class="text-danger">
                                                    {{ $errors->first('answer_date') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <label for="text-area" class="col-sm-1 col-form-label col-form-label text-end">回答者</label>
                                <div class="col-sm-3 mb-2">
                                    <input type="text" class="form-control @if($errors->has('responder')) error @endif" id="responder" name="responder" tabindex="11"
                                        maxlength="100" autocomplete="off" value="{{ isset($faqData) ?  $faqData->responder : '' }}">
                                    @if ($errors->has('responder'))
                                        <span class="text-danger">
                                            {{ $errors->first('responder') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12 row mb-3">
                                <label for="text-area" class="col-sm-2 col-form-label col-form-label">状態</label>
                                <div class="col-sm-2 mb-2">
                                    <select name="status" id="status" tabindex="12" class="form-select @if($errors->has('status')) error @endif">
                                        <option value=''>状態選択</option>
                                        <option value="{{config('constants.public')}}" {{ isset($faqData) ? ($faqData->status == config('constants.public') ?
                                         'selected' : '') : '' }}>公開中</option>
                                        <option value="{{config('constants.private')}}" {{ isset($faqData) ? ($faqData->status == config('constants.private') ?
                                         'selected' : '') : '' }}>未公開</option>
                                    </select>
                                    @if ($errors->has('status'))
                                        <span class="text-danger">
                                            {{ $errors->first('status') }}
                                        </span>
                                    @endif
                                </div>
                                <label for="text-area" class="col-sm-1 col-form-label col-form-label text-end">言語</label>
                                <div class="col-sm-2 mb-2">
                                    <select name="language" id="language" tabindex="13" class="form-select @if($errors->has('language')) error @endif">
                                        <option value="">言語選択</option>
                                        <option value="ja" {{ isset($faqData) ? ($faqData->language == config('constants.language_japanese') ? 'selected' : '') : '' }}>日本語</option>
                                        <option value="en" {{ isset($faqData) ? ($faqData->language == config('constants.language_english') ? 'selected' : '') : '' }}>英語</option>
                                    </select>
                                    @if ($errors->has('language'))
                                        <span class="text-danger">
                                            {{ $errors->first('language') }}
                                        </span>
                                    @endif
                                </div>
                                <label for="text-area" class="col-sm-1 col-form-label col-form-label text-end"></label>
                                <div class="col-sm-2 mb-2">
                                </div>
                            </div>
                            <div class="col-md-12 row mb-5">
                                <label for="text-area" class="col-sm-2 col-form-label col-form-label">配信先</label>
                                <div class="col-sm-9 mb-5">
                                    @foreach ($userGroups as $group)
                                    <div class="form-check form-check-lg d-flex align-items-center display_group">
                                        <input class="form-check-input" type="checkbox" name="display_group[]" id="display_group{{ $group->group_id }}"
                                         value="<?= $group->group_id ?>" tabindex="14" {{ in_array($group->group_id, $displayGroups) ? 'checked' : '' }}>
                                        <label class="form-check-label me-5" for="checkebox-lg">
                                            <?= $group->group_ja_name ?>
                                        </label>
                                    </div>
                                    @endforeach
                                    @if ($errors->has('display_group'))
                                        <span class="text-danger">
                                            {{ $errors->first('display_group') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="gap-2 col-3 mx-auto mb-3">
                                    <?php if(!empty($faqData) && $faqData->faq_id){ ?>
                                        <button type="button" class="btn btn-danger px-4 me-3" id="deleteBtn" title="削除する"
                                         tabindex="15">削除する</button>
                                    <?php } ?>
                                    <button class="btn btn-warning px-4" type="submit"
                                     title="{{ !empty($faqData) && $faqData->faq_id ?  '投稿する' :  '追加する' }}"
                                      tabindex="16" id="submitBtn" > {{ !empty($faqData) && $faqData->faq_id ?  '投稿する' :  '追加する' }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let selectedCategoryId = <?= isset($faqData) ?  $faqData->category_id : 0  ?>;
    let recordId = <?= isset($faqData) ?  $faqData->faq_id : 0  ?>;
</script>
<script src="{{ asset('js/admin/jquery.validate.js') }}"></script>
<script src="{{ asset('js/admin/faq_data.js') }}"></script>
@endsection