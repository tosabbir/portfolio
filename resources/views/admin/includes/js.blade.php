


        <!-- JAVASCRIPT -->
        <script src="{{ asset('/backend') }}/assets/libs/jquery/jquery.min.js"></script>
        <script src="{{ asset('/backend') }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('/backend') }}/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="{{ asset('/backend') }}/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="{{ asset('/backend') }}/assets/libs/node-waves/waves.min.js"></script>


        <!-- apexcharts -->
        <script src="{{ asset('/backend') }}/assets/libs/apexcharts/apexcharts.min.js"></script>

        <!-- jquery.vectormap map -->
        <script src="{{ asset('/backend') }}/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="{{ asset('/backend') }}/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js"></script>

        <!-- Required datatable js -->
        <script src="{{ asset('/backend') }}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="{{ asset('/backend') }}/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

        <!-- Responsive examples -->
        <script src="{{ asset('/backend') }}/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="{{ asset('/backend') }}/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <script src="{{ asset('/backend') }}/assets/js/pages/dashboard.init.js"></script>

        <!-- App js -->
        <script src="{{ asset('/backend') }}/assets/js/app.js"></script>

        {{-- toaster cdn  --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <!-- init js -->
        <script src="{{ asset('/backend') }}assets/js/pages/form-editor.init.js"></script>


        <script src="{{asset('/backend')}}/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <script src="{{asset('/backend')}}/assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>

        <!-- Datatable init js -->
        <script src="{{asset('/backend')}}/assets/js/pages/datatables.init.js"></script>


        <script>
            tinymce.init({
                selector: 'textarea#default'
            });
        </script>

{{--
      <script type="text/javascript">
      tinymce.init({
        selector: 'textarea#default',
        width: 600,
        height: 300,
        plugins: [
          'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
          'searchreplace', 'wordcount', 'visualblocks', 'visualchars', 'code', 'fullscreen', 'insertdatetime',
          'media', 'table', 'emoticons', 'template', 'help'
        ],
        toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | ' +
          'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
          'forecolor backcolor emoticons | help',
        menu: {
          favs: { title: 'My Favorites', items: 'code visualaid | searchreplace | emoticons' }
        },
        menubar: 'favs file edit view insert format tools table help',
        content_css: 'css/content.css'
      });
      </script> --}}

    </body>


<!-- Mirrored from themesdesign.in/upcube/layouts/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Feb 2023 16:21:42 GMT -->
</html>
