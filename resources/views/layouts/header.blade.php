<header class="app-header">
    <div class="main-header-container container-fluid">
        <div class="header-content-left">
            <div class="header-element">
                <div class="horizontal-logo">
                    <a href="{{ session('is_admin') ? route('admin_dashboard') : route('dashboard') }}"
                        class="header-logo">
                        <p class="HeaderLogo__img">
                            <img src="{{ asset('images/brand-logos/logo_kubota.svg') }}" alt="logo" class="">
                        </p>
                        <p class="HeaderLogo__text"><span>品保ポータル（仮）</span></p>
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
                            @if (Auth::user()->user_type == 1)
                                <span class="op-7 fw-normal d-block fs-11">{{ Auth::user()->employee->email }}</span>
                                <p class="fw-semibold mb-0 lh-2 text-end">{{ Auth::user()->employee->ja_name }}</p>
                            @else
                                <span class="op-7 fw-normal d-block fs-11">{{ Auth::user()->indUser->email }}</span>
                                <p class="fw-semibold mb-0 lh-2 text-end">{{ Auth::user()->indUser->ja_user_name }}</p>
                            @endif
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
                            <h5>{{ Auth::user()->user_type == 1 ? Auth::user()->employee->ja_name : Auth::user()->indUser->ja_user_name }}</h5>
                        </div>
                    </div>
                    <p><strong>株式会社 クボタ</strong><br>
                        機械事業本部 <i class="bi bi-chevron-right"></i> 機械カスタマーファースト品質本部 <i class="bi bi-chevron-right"></i>
                        機械カスタマーファースト情報管理部 <i class="bi bi-chevron-right"></i> 情報管理第一課 (グローバル技術研究所)<br><br>
                        メールアドレス：
                        @if (Auth::user()->user_type == 1)
                            <a href="{{ Auth::user()->employee->email }}">{{ Auth::user()->employee->email }}</a>
                        @else
                            <a href="{{ Auth::user()->indUser->email }}">{{ Auth::user()->email }}</a>
                        @endif
                    </p>
                    @if (!session('is_admin'))
                    <div class="row mb-1">
                        <label class="form-label mb-1">使用言語</label>
                        <div class="col-xl-3">
                            <div class="form-check form-check-lg">
                                <input class="form-check-input" type="radio" name="Radio" id="Radio-lg1"
                                    checked="">
                                <label class="form-check-label">
                                    日本語
                                </label>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-check form-check-lg">
                                <input class="form-check-input" type="radio" name="Radio" id="Radio-lg2">
                                <label class="form-check-label">
                                    英語
                                </label>
                            </div>
                        </div>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <p class="text-end">
                            <a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                <button type="button" class="btn btn-light btn-wave">ログアウト</button>
                            </a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
