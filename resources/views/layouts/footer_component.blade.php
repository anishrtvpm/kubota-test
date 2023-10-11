    
    <!-- Common Js -->
    <script src="{{ asset('js/admin/common.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Choices JS -->
    <script src="{{ asset('libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>
    <!-- Main Theme Js -->
    <script src="{{ asset('js/main.js') }}"></script>
    <!-- Custom JS -->
    <script src="{{ asset('js/custom.js') }}" defer></script>
    <!-- Select2 Cdn -->
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <!-- Internal Select-2.js -->
    <!-- <script src="{{ asset('js/select2.js') }}"></script> -->
    <!-- Modal JS -->
    <!--  <script src="{{ asset('js/modal.js') }}"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script> -->
    <script src="{{ asset('js/summernote-lite.min.js') }}" integrity="sha256-5slxYrL5Ct3mhMAp/dgnb5JSnTYMtkr4dHby34N10qw=" crossorigin="anonymous"></script>
    <!-- language pack -->
    <script src="{{ asset('libs/summernote/lang/summernote-ja-JP.min.js') }}"></script>
    <!-- Date & Time Picker JS -->
    <script src="{{ asset('libs/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('js/ja.js') }}"></script>
    <script src="{{ asset('js/date&time_pickers.js') }}"></script>
    <!-- Datatables Cdn -->
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/jszip.min.js') }}"></script>
    <script src="{{ asset('js/fontawesome.min.js') }}"></script>
    
    <!-- Internal Datatables JS -->
    <script src="{{ asset('js/admin/common.js') }}"></script>
    
    @yield('js')
    <script>
        $('#summernote-jp').summernote({
            placeholder: 'こちらは日本語バージョンのリッチテキストエディタになります。',
            tabsize: 2,
            height: 300,
            lang: 'ja-JP', // default: 'en-US'
        });
        $('#summernote-en').summernote({
            placeholder: 'こちらは英語バージョンのリッチテキストエディタになります。',
            tabsize: 2,
            height: 300,
        });
    </script>
