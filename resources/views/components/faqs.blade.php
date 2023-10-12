<div class="col-xl-12">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header  justify-content-between">
                <div class="card-title">
                    <a href="{{ route('faq.list') }}">{{ __('faq') }}</a>
                </div>
                <div class="prism-toggle">
                    <a href="{{ route('faq.list') }}">
                        <button class="btn btn-sm btn-primary-light">{{ __('list') }}
                            <i class="bi bi-chevron-right"></i>
                        </button>
                    </a>
                </div>
            </div>
            <div class="card-body dashboard-faq-list">
                @if (!$faqs->isEmpty())
                    <ul>
                        @foreach ($faqs as $faq)
                            <li><a href="{{ route('faq.detail', ['id' => $faq->faq_id]) }}">{{ $faq->title }}</a></li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-center">{{ __('no_data_available') }}</p>
                @endif
            </div>
        </div>
    </div>
</div>
