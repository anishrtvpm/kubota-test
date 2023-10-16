<div class="col-xxl-12 col-xl-12 col-lg-12 pb-5 px-lg-2 px-5 text-start">
    @if(!empty($faqData[0]))
        @foreach($faqData as $data)
        <div class="faq-list">
            <a href="{{ route('faq.detail', ['id' => $data->faq_id]) }}">
                <h6 class="text-lg-start fw-semibold mb-2">{{$data->title}}</h6>
                <p class="text-muted w-75 mb-0">{{$data->q_message}}</p>
            </a>
        </div>
        @endforeach
    @else
        <p>{{ __('no_data_available')}}</p>
    @endif
</div>
<div class="d-grid gap-2 col-3 mx-auto mb-5 pagination-links">
    {{ $faqData->links('components.pagination-view') }}
</div>

