{{-- head section included here  --}}
@include('admin.includes.head')

        <!-- Begin page -->
        <div id="layout-wrapper">

            {{-- header area included here  --}}
            @include('admin.includes.header')

            <!-- ========== Left Sidebar Start ========== -->

            {{-- left sidebar included here  --}}
            @include('admin.includes.sidebar')

            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        {{-- main content section included here  --}}
                        @yield('content')

                    </div>

                </div>
                <!-- End Page-content -->

                @include('admin.includes.footer')

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->
{{-- js link included here  --}}
@include('admin.includes.js')
<script>
    @if (Session::has('message'))

        var type = "{{ Session::get('alert-type','info') }}";

        switch (type) {
            case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;

            case 'success':
                toastr.info(" {{ Session::get('message') }} ");
                break;

            case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;

            case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;

            case 'danger':
                toastr.danger(" {{ Session::get('message') }} ");
                break;

            default:
                break;
        }
    @endif
</script>
<script>
    tinymce.init({
      selector: '#tinymec',
      plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
      ],
      ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant"))
    });
  </script>
