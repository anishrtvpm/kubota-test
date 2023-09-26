    
    <!-- Bootstrap JS -->
    <script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Choices JS -->
    <script src="{{ asset('libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>
    <!-- Main Theme Js -->
    <script src="{{ asset('js/main.js') }}"></script>
    <!-- Custom JS -->
    <script src="{{ asset('js/custom.js') }}" defer></script>
    <!-- Select2 Cdn -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Internal Select-2.js -->
    <!-- <script src="{{ asset('js/select2.js') }}"></script> -->
    <!-- Modal JS -->
    <!--  <script src="{{ asset('js/modal.js') }}"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js" integrity="sha256-5slxYrL5Ct3mhMAp/dgnb5JSnTYMtkr4dHby34N10qw=" crossorigin="anonymous"></script>
    <!-- language pack -->
    <script src="{{ asset('libs/summernote/lang/summernote-ja-JP.min.js') }}"></script>
    <!-- Date & Time Picker JS -->
    <script src="{{ asset('libs/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('js/date&time_pickers.js') }}"></script>
    <!-- Datatables Cdn -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.6/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        
    <!-- Internal Datatables JS -->
    <!-- <script src="{{ asset('js/datatables.js') }}"></script> -->
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
