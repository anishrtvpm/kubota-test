<div class="col-xxl-12 col-xl-12 col-lg-12 pb-5 px-lg-2 px-5 text-start"> 
    @if($faqData)
    @foreach($faqData as $data)
    <div class="faq-list">
        <a href="faq_view">
            <h6 class="text-lg-start fw-semibold mb-2">{{$data->title}}</h6>
            <p class="text-muted w-75 mb-0">{{$data->search_qa_message}}</p>
        </a>
    </div>
    @endforeach
    @endif
</div>
<div class="d-grid gap-2 col-3 mx-auto mb-5 pagination-links">
    {{ $faqData->links('components.pagination-view') }}
</div>

