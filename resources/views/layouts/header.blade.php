@php
    $userInfo = authUser();
    $userProfile = getUser($userInfo->guid);
@endphp
<header class="app-header">
    <div class="main-header-container container-fluid">
        <div class="header-content-left">
            <div class="header-element">
                <div class="horizontal-logo">
                    <a href="{{ checkIsAdmin() ? route('admin_dashboard') : route('dashboard') }}"
                        class="header-logo">
                        <p class="HeaderLogo__img">
                            <img src="{{ asset('images/brand-logos/logo_kubota.svg') }}" alt="logo" class="">
                        </p>
                        <p class="HeaderLogo__text"><span>{{ __('header_qa_portal')}}</span></p>
                    </a>
                </div>
            </div>
        </div>
        <div class="header-content-right">
            <div class="header-element">
                <a href="#" class="header-link dropdown-toggle" id="mainHeaderProfile" data-bs-toggle="dropdown"
                    data-bs-auto-close="outside" aria-expanded="false">
                    <div class="d-flex align-items-center">
                        <div class="d-sm-block d-none">
                            <span class="op-7 fw-normal d-block fs-11">{{ $userInfo->email }}</span>
                            <p class="fw-semibold mb-0 lh-2 text-end">
                                {{ getCurrentGuard() == config('constants.kubota_user') ?
                                ($userInfo->language == config('constants.language_japanese') ? $userInfo->ja_name : $userInfo->en_name):
                                ($userInfo->language == config('constants.language_japanese') ? $userInfo->ja_user_name : $userInfo->en_user_name) }}
                            </p>
                        </div>
                        <div class="ms-sm-2 me-0">
                            <img src="{{ asset('images/profile/1.jpg') }}" alt="img" width="32" height="32"
                                class="rounded-circle">
                        </div>
                    </div>
                </a>
                <div class="main-header-dropdown dropdown-menu pt-0 overflow-hidden header-profile-dropdown dropdown-menu-end"
                    aria-labelledby="mainHeaderProfile">
                    <div class="d-flex mb-2 mt-2">
                        <div class="p-2 flex-shrink-1"> <img src="{{ asset('images/profile/1.jpg') }}" alt="img"
                                width="60" height="60" class="rounded-circle"></div>
                        <div class="p-2 w-100 align-middle mt-3">
                            <h5>
                                {{ getCurrentGuard() == config('constants.kubota_user') ?
                                 ($userInfo->language == config('constants.language_japanese') ? $userInfo->ja_name : $userInfo->en_name):
                                 ($userInfo->language == config('constants.language_japanese') ? $userInfo->ja_user_name : $userInfo->en_user_name) }}
                                </h5>
                        </div>
                    </div>
                    <p><strong>
                        {{ getCurrentGuard() == config('constants.kubota_user') ?
                        ($userInfo->language == config('constants.language_japanese') ? $userProfile['ja_company_name'] : $userProfile['en_company_name']):
                        $userProfile['company_name'] }}
                    </strong><br>
                        {{ getCurrentGuard() == config('constants.kubota_user') ?
                        ($userInfo->language == config('constants.language_japanese') ? $userProfile['ja_section_name'] : $userProfile['en_section_name']): '' }}
                        <br><br>
                        {{ __('email_address') }}：
                        <a href="{{ $userInfo->email }}">{{ $userInfo->email }}</a>
                    </p>
                    @if (!checkIsAdmin())
                    <div class="row mb-1">
                        <label class="form-label mb-1">{{ __('language') }}</label>
                        @php
                            $language = ['ja' => '日本語', 'en' => 'English'];
                        @endphp
                        @foreach($language as $key => $value)
                            <div class="col-xl-3">
                                <div class="form-check form-check-lg">
                                    <input class="form-check-input" type="radio" name="locale" value="{{ $key }}"
                                    {{ app()->getLocale() === $key ? 'checked' : '' }}>
                                    <label class="form-check-label">
                                        {{ $value }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @endif
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <p class="text-end">
                            <a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                <button type="button" class="btn btn-light btn-wave">{{ __('logout') }}</button>
                            </a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/user/language.js') }}"></script>
</header>
