@extends('layouts.base')
@section('content')

    <div class="d-md-flex d-block align-items-center justify-content-between mt-2 page-header-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style2 mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">トップページ</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}#manage">管理画面</a></li>
                <li class="breadcrumb-item active" aria-current="page">FAQ管理</li>
            </ol>
        </nav>
        @include('layouts.navigation')
    </div>
    <div class="alert alert-solid-dark alert-dismissible fade show text-white mt-4">
        FAQ記事一覧
    </div>
    <div class="row">
        <div class="col-xxl-12 col-xl-12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-body">
                            @if (session('message'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('message') }}
                                </div>
                            @endif
                            
                            <form class="row">
                                <div class="col-md-4 row mb-3">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">大カテゴリ</label>
                                    <div class="col-sm-8">
                                        <select name="top-category" class="form-select top_category" id="inlineFormSelectCatParent">
                                            <option value='' selected>大カテゴリ</option>
                                            @if(!empty($topCategories))
                                                @foreach($topCategories as $topCategory)
                                                    <option value="{{$topCategory->name}}">{{$topCategory->name}}</option>
                                                @endforeach
                                            @endif
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 row mb-3">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">中カテゴリ</label>
                                    <div class="col-sm-8">
                                        <select name="sub-category" class="form-select sub_category" id="inlineFormSelectCatChild">
                                            <option value='' selected>小カテゴリ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 row mb-3 me-1">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">言語</label>
                                    <div class="col-sm-8">
                                        <select name="language" class="form-select" id="inlineFormSelectLanguage">
                                            <option value=''>選択する</option>
                                            <option value="ja">日本語</option>
                                            <option value="en">英語</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 row mb-3 me-1">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">キーワード</label>
                                    <div class="col-sm-8">
                                        <input maxlength="100" name="keyword-search" type="text" class="form-control" id="input-keyword" placeholder="キーワードを入力">
                                    </div>
                                </div>
                                <div class="col-md-4 row mb-3">
                                    <label for="text-area" class="col-sm-3 col-form-label">状態</label>
                                    <div class="col-sm-8">
                                        <select name="faqstatus" class="form-select" id="inlineFormStatus">
                                            <option value=''>選択する</option>
                                            <option value="0">未公開</option>
                                            <option value="1">保留中</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 row mb-3">
                                    <a href="javascript:void(0);" title="検索">
                                        <button id="searchInput" title="検索" type="button" class="btn btn-primary btn-wave px-4">検索</button>
                                        <button type="button" id="clearFilters" title="クリア" class="btn btn-warning clear_btn">クリア</button>
                                    </a>
                                    
                                </div>
                                
                                <div class="col-md-12 text-end">
                                    <div class="btn-list">
                                        <a href="{{ route('faq_category.list') }}"><button title="カテゴリ管理" type="button" class="btn btn-primary btn-wave px-4">カテゴリ管理</button></a>
                                        <a href="{{ route('faq_data.create') }}"><button title="新規FAQ作成" type="button" class="btn btn-warning btn-wave px-3">新規FAQ作成</button></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="row datatable_scroll">
                                    <table id="faqListTable" class="table table-bordered text-nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th title="No.">No.</th>
                                                <th title="言語">言語</th>
                                                <th title="システム">システム</th>
                                                <th title="中カテゴリ">中カテゴリ</th>
                                                <th title="並び順">並び順</th>
                                                <th title="タイトル">タイトル</th>
                                                <th title="状態">状態</th>
                                                <th title="質問日">質問日</th>
                                                <th title="回答日">回答日</th>
                                                <th title="回答者">回答者</th>
                                            </tr>
                                        </thead>                                        
                                    </table>
                                </div>
                                    <div class="row dataTables_wrapper ">
                                    <div class="col-sm-12 col-md-5" id="targetInfo"></div>
                                    <div class="col-sm-12 col-md-7" id="targetPagination"></div>
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

@section('js')
<script>
    let slTable;
    let successMessage = localStorage.getItem('success');
    if (successMessage) {
        toastr.success(successMessage);
        localStorage.removeItem('success');
    }
</script>
<script src="{{ asset('js/admin/faq_list.js') }}"></script>

@endsection
