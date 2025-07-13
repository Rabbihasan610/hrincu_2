@php
    $lang = session()->get('lang') == 'ar' ? 'ar' : 'en';
@endphp

<!doctype html>
<html lang="{{ config('app.locale') }}" @if ($lang == 'ar') dir="rtl" @endif itemscope itemtype="http://schema.org/WebPage">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ __(gs('site_name')) }} - {{ __(@$title ?? '') }}</title>


    @yield("meta_tags")

    @stack('seo')

    <script src="https://cdn.tailwindcss.com"></script>

    @if ($lang == 'ar')
        <link rel="stylesheet" href="{{ asset('assets/global/css/bootstrap.rtl.min.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('assets/global/css/bootstrap.min.css') }}">
    @endif

    <link rel="stylesheet" href="{{ asset('assets/global/css/all.min.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="{{ asset('assets/global/css/line-awesome.min.css') }}" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">


    <link rel="stylesheet" href="{{ asset('assets/admin/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/styles.css') }}">


    <script src="https://unpkg.com/lucide@latest"></script>

    @if ($lang == 'ar')
        <link rel="stylesheet" href="{{ asset('assets/web/css/rtl.css') }}">
    @endif

    @stack('style-lib')

    @stack('style')
</head>

<body>
    @yield('panel')
    <script src="{{ asset('assets/global/js/jquery.min.js') }}"></script>
     <script src="{{ asset('assets/global/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/web/js/jssocials.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/nicEdit.js') }}"></script>
    @stack('script-lib')
    @include('partials.plugins')
    @include('partials.notify')

    <script>
        "use strict";

        bkLib.onDomLoaded(function() {
            $(".nicEdit, nicEdit2").each(function(index) {
                $(this).attr("id", "nicEditor" + index);
                new nicEditor({
                    fullPanel: true
                }).panelInstance('nicEditor' + index, {
                    hasPanel: true
                });
            });
        });

    </script>


    @stack('script')

      <!-- JavaScript -->
    <script>
        document.querySelector('.sidebar-toggle').addEventListener('click', () => {
            document.querySelector('.sidebar').classList.add('active');
        });

        document.querySelector('.close-btn').addEventListener('click', () => {
            document.querySelector('.sidebar').classList.remove('active');
        });
    </script>


    <script>
        (function($) {
            "use strict";

            $(".langSel").on("click", function() {
                var langCode = $(this).data('lang');
                window.location.href = "{{ route('home') }}/change/" + langCode;
            });

            $('.policy').on('click', function() {
                $.get('{{ route('cookie.accept') }}', function(response) {
                    $('.cookies-card').addClass('d-none');
                });
            });

            setTimeout(function() {
                $('.cookies-card').removeClass('hide')
            }, 2000);



            $.each($('input, select, textarea'), function(i, element) {
                var elementType = $(element);
                if (elementType.attr('type') != 'checkbox') {
                    if (element.hasAttribute('required')) {
                        $(element).closest('.form-group').find('label').addClass('required');
                    }
                }

            });

            $(document).ready(function() {
                $('.select2-multiple').select2({
                    tags: true
                });
            });

        })(jQuery);
    </script>


     <script>
        lucide.createIcons();
    </script>

 @if ($lang == 'ar')
    <script>
        var url = 'https://wati-integration-service.clare.ai/ShopifyWidget/shopifyWidget.js?15319';
        var s = document.createElement('script');
        s.type = 'text/javascript';
        s.async = true;
        s.src = url;
        var options = {
            "enabled": true,
            "chatButtonSetting": {
                "backgroundColor": "#39004E",
                "ctaText": "تواصل معنا",
                "borderRadius": "25",
                "marginLeft": "0",
                "marginBottom": "50",
                "marginRight": "50",
                "position": "right"
            },
            "brandSetting": {
                "brandName": "{{ gs('site_title') ?? 'HRincu' }}",
                "brandSubTitle": "{{ gs('site_title') ?? 'HRincu' }}",
                "brandImg":  "{{ url('/') }}" + "/assets/images/logoIcon/logo.png",
                "welcomeText": "",
                "messageText": "",
                "backgroundColor": "#39004E",
                "ctaText": "Start Chat",
                "borderRadius": "25",
                "autoShow": false,
                "phoneNumber": "966550217734"
            }
        };

        s.onload = function() {
            CreateWhatsappChatWidget(options);
        };
        var x = document.getElementsByTagName('script')[0];
        x.parentNode.insertBefore(s, x);
    </script>
  @else
   <script>
        var url = 'https://wati-integration-service.clare.ai/ShopifyWidget/shopifyWidget.js?15319';
        var s = document.createElement('script');
        s.type = 'text/javascript';
        s.async = true;
        s.src = url;
        var options = {
            "enabled": true,
            "chatButtonSetting": {
                "backgroundColor": "#39004E",
                "ctaText": "Start Chat",
                "borderRadius": "25",
                "marginLeft": "0",
                "marginBottom": "50",
                "marginRight": "50",
                "position": "right"
            },
            "brandSetting": {
                "brandName": "{{ gs('site_title') }}",
                "brandSubTitle": "{{ gs('site_title') }}",
                "brandImg": "{{ url('/') }}" + "/assets/images/logoIcon/logo.png",
                "welcomeText": "",
                "messageText": "",
                "backgroundColor": "#39004E",
                "ctaText": "Start Chat",
                "borderRadius": "25",
                "autoShow": false,
                "phoneNumber": "966550217734"
            }
        };

        s.onload = function() {
            CreateWhatsappChatWidget(options);
        };
        var x = document.getElementsByTagName('script')[0];
        x.parentNode.insertBefore(s, x);
    </script>

  @endif
</body>

</html>
