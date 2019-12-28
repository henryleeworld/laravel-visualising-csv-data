<script>
    window.deleteButtonTrans = '{{ trans("global.datatables.delete") }}';
    window.copyButtonTrans = '{{ trans("global.datatables.copy") }}';
    window.csvButtonTrans = '{{ trans("global.datatables.csv") }}';
    window.excelButtonTrans = '{{ trans("global.datatables.excel") }}';
    window.pdfButtonTrans = '{{ trans("global.datatables.pdf") }}';
    window.printButtonTrans = '{{ trans("global.datatables.print") }}';
    window.colvisButtonTrans = '{{ trans("global.datatables.colvis") }}';
</script>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
<script src="{{ url('adminlte/js') }}/bootstrap.min.js"></script>
<script src="{{ url('adminlte/js') }}/select2.full.min.js"></script>
<script src="{{ url('adminlte/js') }}/main.js"></script>

<script src="{{ url('adminlte/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ url('adminlte/plugins/fastclick/fastclick.js') }}"></script>
<script src="{{ url('adminlte/js/app.min.js') }}"></script>
<script>
    window._token = '{{ csrf_token() }}';
</script>
<script>
    let languages = {
        'en': 'https://cdn.datatables.net/plug-ins/1.10.20/i18n/English.json',
        'zh-TW': '../js/plugins/datatables/i18n/Chinese-traditional.json'
    };
    $.extend(true, $.fn.dataTable.defaults, {
        'language': {
            url: languages['{{ app()->getLocale() }}']
        }
    });

     

</script>

 



@yield('javascript')