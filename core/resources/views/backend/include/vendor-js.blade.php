<!--end::Demo Panel-->
<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
<!--begin::Global Config(global config for global JS scripts)-->
<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
<!--end::Global Config-->
<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{ asset('assets/backend/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
<script src="{{ asset('assets/backend/js/scripts.bundle.js') }}"></script>
{{-- <script src="{{ asset('assets/backend') }} /js/pages/features/miscellaneous/blockui.js"></script> --}}
<!--end::Global Theme Bundle-->
<!--begin::Page Vendors(used by this page)-->
<script src="{{ asset('assets/backend/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="{{ asset('assets/backend/js/pages/widgets.js') }}"></script>

{{-- <script type="text/javascript" src="{{ asset('assets/backend/jv') }} /lib/jquery-1.11.1.js"></script> --}}
<script type="text/javascript" src="{{ asset('assets/backend/jv/dist/jquery.validate.js') }}"></script>

<script>
    function myBlock()
    {
        KTApp.blockPage({
            overlayColor: '#000000',
            state: 'primary',
            message: 'Mohon Tunggu...'
        });
    }

    function customAlert(title,text,type){
        Swal.fire(title, text,type);
    }
</script>
