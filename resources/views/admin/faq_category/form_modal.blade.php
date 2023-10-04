<?php
$faq_category_id='';
$top_category_ja_name='';
$top_category_en_name='';
$sub_category_ja_name='';
$sub_category_en_name='';
$sort='';
$status='';
$mail_form_id='';
if(!empty($faqCategoryData)){
    $faq_category_id=$faqCategoryData->category_id;
    $top_category_ja_name=$faqCategoryData->top_category_ja_name;
    $top_category_en_name=$faqCategoryData->top_category_en_name;
    $sub_category_ja_name=$faqCategoryData->sub_category_ja_name;
    $sub_category_en_name=$faqCategoryData->sub_category_en_name;
    $sort=$faqCategoryData->sort;
    $status=$faqCategoryData->status;
    $mail_form_id=$faqCategoryData->mail_form_id;
}
?>

<div class="modal-dialog modal-dialog-centered text-center" role="document">
    <div class="modal-content modal-content-demo">
        <div class="modal-header">
            <h6 class="modal-title">FAQカテゴリ追加</h6><button aria-label="Close"
                class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="alert alert-danger mt-2 error-modal" role="alert" style="display: none;"></div>
        <form method="POST" id="faqCategoryForm" action="{{route('faq_category.store')}}">
        @csrf
        <input type="hidden" name="faq_category_id" value="{{$faq_category_id ? $faq_category_id : ''}}">
        <div class="modal-body text-start">
            <div class="row">
                
            <?php if(!empty($faqCategoryData)){ ?>
                <label for="colFormLabelLg"
                    class="col-sm-4 col-form-label col-form-label">ID</label>
                <div class="col-sm-8">
                    <label for="colFormLabelLg"
                        class="col-sm-4 col-form-label col-form-label">{{$faq_category_id ? $faq_category_id : ''}}</label>
                </div>
            <?php } ?>
                <label for="top_category_ja_name" class="col-sm-4 col-form-label col-form-label mt-2">システム(JP)</label>
                <div class="col-sm-8">
                    <input type="text" name="top_category_ja_name" class="mt-2 form-control form-control-lg" id="top_category_ja_name" tabindex="1" autofocus autocomplete="off" value="{{$top_category_ja_name ? $top_category_ja_name : ''}}" placeholder="システム(JP)">
                </div>
                
                <label for="sub_category_ja_name" class="mt-2 col-sm-4 col-form-label col-form-label">カテゴリ名(JP)</label>
                <div class="col-sm-8">
                    <input type="text" name="sub_category_ja_name" value="{{$sub_category_ja_name ? $sub_category_ja_name : ''}}" tabindex="2" autocomplete="off" class="mt-2 form-control form-control-lg" id="sub_category_ja_name" placeholder="カテゴリ名(JP)">
                </div>
                
                <label for="top_category_en_name" class="mt-2 col-sm-4 col-form-label col-form-label">システム(EN)</label>
                <div class="col-sm-8">
                    <input type="text" name="top_category_en_name" value="{{$top_category_en_name ? $top_category_en_name : ''}}" tabindex="3" autocomplete="off" class="mt-2 form-control form-control-lg" id="top_category_en_name" placeholder="システム(EN)">
                </div>
               
                <label for="sub_category_en_name" class="mt-2 col-sm-4 col-form-label col-form-label">カテゴリ名(EN)</label>
                <div class="col-sm-8">
                    <input type="text" name="sub_category_en_name" value="{{$sub_category_en_name ? $sub_category_en_name : ''}}" tabindex="4" autocomplete="off" id="sub_category_en_name" class="mt-2 form-control" placeholder="カテゴリ名(EN)">
                </div>
                <label for="sort" class="mt-2 col-sm-4 col-form-label col-form-label">表示順</label>
                <div class="col-sm-8">
                    <input type="number" name="sort" tabindex="5" autocomplete="off" value="{{$sort ? $sort : ''}}" class="mt-2 form-control form-control-lg" id="sort" placeholder="0" min="0">
                </div>
                <label for="status" class="mt-2 col-sm-4 col-form-label col-form-label">状態</label>
                <div class="col-sm-8">
                    <select name="status" id="status" tabindex="6" class="mt-2 form-control form-control-lg">
                        <option value="{{config('constants.public')}}" <?php echo ($status==config('constants.public')) ? 'selected':''; ?>>公開</option>
                        <option value="{{config('constants.private')}}" <?php echo ($status==config('constants.private')) ? 'selected':''; ?>>非公開</option>
                    </select>
                </div>
                <label for="mail_form_id" class="mt-2 col-sm-4 col-form-label col-form-label">フォームID</label>
                <div class="col-sm-8">
                    <input type="number" name="mail_form_id" tabindex="7" autocomplete="off" value="{{$mail_form_id ? $mail_form_id : ''}}" class="mt-2 form-control form-control-lg" id="mail_form_id" placeholder="0" min="0">
                </div>

            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-warning" id="submitBtn" tabindex="8" title="追加する">追加する</button>
        </div>

      </form>

    </div>
</div>

<script src="{{ asset('js/admin/jquery.validate.js') }}"></script>
<script src="{{ asset('js/admin/faq_category_form.js') }}"></script>