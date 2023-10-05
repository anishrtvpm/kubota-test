
<?php
 $system_id='';
 $sort='';
 $ja_system_name='';
 $en_system_name='';
 $ja_url='';
 $en_url='';
if(!empty($systemLinkData)){
    $system_id=$systemLinkData->system_id;
    $sort=$systemLinkData->sort;
    $ja_system_name=$systemLinkData->ja_system_name;
    $en_system_name=$systemLinkData->en_system_name;
    $ja_url=$systemLinkData->ja_url;
    $en_url=$systemLinkData->en_url;
}
?>
        <div class="modal-dialog modal-dialog-centered text-center" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">システムリンク編集</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
            <form method="POST" id="systeLinkForm" action="{{route('system_link.store')}}">
                @csrf
                <input type="hidden" name="system_id" id="system_id" value="{{$system_id ? $system_id : ''}}">
                <div class="modal-body text-start">
                    <div class="row">
                        <?php
                        if(!empty($systemLinkData)){ ?>
                        
                        <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label">No</label>
                        <div class="col-sm-8">
                            <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label">{{$system_id ? $system_id : ''}}</label>
                        </div>
                        <?php } ?>
                        <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label mt-2">カテゴリ</label>
                        <div class="col-sm-8 mt-2">
                            <select class="form-select @error('category') is-invalid @enderror category" name="category" id="category" tabindex="1">
                                <option value="">選択してください</option>
                                @if(!empty($systemLinkCategory))
                                    @foreach($systemLinkCategory as $category)
                                    @if(!empty($systemLinkData))
                                    <option value="{{$category->category_id}}"
                                     {{ isset($systemLinkData) ? ($systemLinkData->category_id == $category->category_id ?
                                         'selected' : '') : 'selected' }}>{{$category->ja_category_name}}</option>
                                    @else
                                    <option value="{{$category->category_id}}">{{$category->ja_category_name}}</option>
                                    @endif
                                    @endforeach
                                @endif
                            </select>
                            @error('category')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label mt-2">表示順</label>
                        <div class="col-sm-8 mt-2">
                            <input type="text" tabindex="2" autocomplete="off" class="sort form-control @error('sort') is-invalid @enderror" maxlength="3"  placeholder="0" name="sort" value="{{$sort ? $sort : ''}}">
                            @error('sort')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label mt-2">タイトル(JP)</label>
                        <div class="col-sm-8 mt-2">
                            <input type="text" tabindex="3" autocomplete="off" name="ja_system_name" maxlength="100" class="form-control @error('ja_system_name') is-invalid @enderror ja_system_name" id="ja_system_name" placeholder="タイトル(JP)" value="{{$ja_system_name ? $ja_system_name : ''}}">
                            @error('ja_system_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label mt-2">タイトル(EN)</label>
                        <div class="col-sm-8 mt-2">
                            <input type="text" tabindex="4" autocomplete="off" name="en_system_name" maxlength="100" id="en_system_name" class="form-control @error('en_system_name') is-invalid @enderror en_system_name" placeholder="タイトル(EN)" value="{{$en_system_name ? $en_system_name : ''}}">
                            @error('en_system_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label mt-2">URL(JP)</label>
                        <div class="col-sm-8 mt-2">
                            <input type="text" tabindex="5" autocomplete="off" name="ja_url" maxlength="255" class="ja_url form-control @error('ja_url') is-invalid @enderror"  placeholder="URL(JP)" value="{{$ja_url ? $ja_url : ''}}">
                            @error('ja_url')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label mt-2">URL(EN)</label>
                        <div class="col-sm-8 mt-2">
                            <input type="text" tabindex="6" autocomplete="off" name="en_url" maxlength="255" class="en_url form-control @error('en_url') is-invalid @enderror" placeholder="URL(JP)" value="{{$en_url ? $en_url : ''}}">
                            @error('en_url')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-warning" tabindex="7" title="投稿する" id="submitBtn" type="submit">投稿する</button>
                    <?php if(!empty($systemLinkData)){ ?>
                    <button class="btn btn-danger" tabindex="8" title="削除する" id="deleteBtn" data-id="{{$system_id ? $system_id : ''}}" type="button">削除する</button>
                    <?php } ?>
                </div>
            </form>
                
            </div>
    </div>
<script src="{{ asset('js/admin/jquery.validate.js') }}"></script>
<script src="{{ asset('js/admin/system_link_form.js') }}"></script>
