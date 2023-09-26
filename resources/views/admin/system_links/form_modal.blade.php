
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
                    <h6 class="modal-title">システムリンク追加</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
            <form method="POST" id="systeLinkForm" action="{{route('system_link.store')}}">
                @csrf
                <div class="modal-body text-start">
                    <div class="row">
                        <?php
                        if(!empty($systemLinkData)){ ?>
                        
                        <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label">No</label>
                        <div class="col-sm-8">
                            <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label">{{$system_id ? $system_id : ''}}</label>
                        </div>
                        <?php } ?>
                        <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label">カテゴリ</label>
                        <div class="col-sm-8">
                            <select class="form-select" name="category" id="inlineFormSelectPref">
                                <option value="">Select</option>
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
                        </div>
                        <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label">表示順</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control " placeholder="0" name="sort" value="{{$sort ? $sort : ''}}">
                        </div>
                        <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label">タイトル(JP)</label>
                        <div class="col-sm-8">
                            <input type="text" name="ja_system_name" class="form-control"  placeholder="タイトル(JP)" value="{{$ja_system_name ? $ja_system_name : ''}}">
                        </div>
                        <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label">タイトル(EN)</label>
                        <div class="col-sm-8">
                            <input type="text" name="en_system_name"  class="form-control" placeholder="タイトル(EN)" value="{{$en_system_name ? $en_system_name : ''}}">
                        </div>
                        
                        <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label">URL(JP)</label>
                        <div class="col-sm-8">
                            <input type="text" name="ja_url" class="form-control"  placeholder="URL(JP)" value="{{$ja_url ? $ja_url : ''}}">
                        </div>
                        <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label">URL(EN)</label>
                        <div class="col-sm-8">
                            <input type="text"  name="en_url" class="form-control" placeholder="URL(JP)" value="{{$en_url ? $en_url : ''}}">
                        </div>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-warning" id="submitBtn" type="submit">投稿する</button>
                    <?php if(!empty($systemLinkData)){ ?>
                    <button class="btn btn-danger" id="deleteBtn" type="button">削除する</button>
                    <?php } ?>
                </div>
            </form>
                
            </div>
    </div>
