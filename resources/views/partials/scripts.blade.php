@push('scripts')
    <script src="{{ asset('assets/jQuery-3.3.1/jquery-3.3.1.js') }}" type="text/javascript"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.1/jquery-ui.min.js"></script>
    <script src="{{ asset('assets/Bootstrap-select-1.13.9/dist/js/bootstrap-select.js') }}"></script>
    <script src="{{ asset('assets/Bootstrap-select-1.13.9/dist/js/i18n/defaults-es_ES.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
    <script src="{{ asset('js/tools.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        let comprasAll = "{{ route('comprasAll') }}";
        let comprasShow = "{{ route('compras.show') }}";
        let token = "{{ csrf_token() }}";
    </script>
    <script src="{{ asset('js/compras.js') }}"></script>
@endpush
