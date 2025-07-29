@php
    $lang = app()->getLocale();
    $isRTL = $lang === 'ar';
@endphp

<div class="bg-purple-900 text-white text-xs sm:text-sm h-8">
    <div class="max-w-7xl mx-auto px-3 sm:px-4 flex {{ $isRTL ? 'justify-start' : 'justify-end' }} items-center h-full rtl:space-x-reverse">
        <ul class="flex space-x-3 rtl:space-x-reverse">
            <li class="flex items-center">
                @if (gs('multi_language'))
                    @if ($lang == 'en')
                        <a href="#" class="flex items-center hover:text-gray-300 langSel" data-lang="ar">
                            <img src="https://flagicons.lipis.dev/flags/4x3/sa.svg" alt="Arabic" class="h-3 w-auto mr-1 rtl:ml-1 rtl:mr-0"/>
                            <span class="whitespace-nowrap">@lang('Arabic')</span>
                        </a>
                    @else
                        <a href="#" class="flex items-center hover:text-gray-300 langSel" data-lang="en">
                            <img src="https://flagicons.lipis.dev/flags/4x3/us.svg" alt="English" class="h-3 w-auto mr-1 rtl:ml-1 rtl:mr-0"/>
                            <span class="whitespace-nowrap">@lang('English')</span>
                        </a>
                    @endif
                @endif
            </li>
            
            <li class="relative group">

                <button class="flex items-center hover:text-gray-300 whitespace-nowrap isToggle">
                    <i class="bi bi-person-fill text-xs mr-1 rtl:ml-1 rtl:mr-0"></i>
                    <span>@lang('Account')</span>
                    <svg class="w-3 h-3 ml-1 rtl:mr-1 rtl:ml-0 transform {{ $isRTL ? 'rotate-180' : '' }}" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M5.25 7.75L10 12.5l4.75-4.75"/>
                    </svg>
                </button>

                <ul class="absolute {{ $isRTL ? 'left-0' : 'right-0' }} top-3 w-40 mt-1 bg-white text-black rounded shadow-md hidden group-hover:block z-50 text-start isToggleMenu">
                    @auth
                        <li><a href="{{ route('user.home') }}" class="block px-3 py-2 text-xs hover:bg-gray-100">@lang('Dashboard')</a></li>
                        <li><a href="{{ route('user.logout') }}" class="block px-3 py-2 text-xs hover:bg-gray-100">@lang('Logout')</a></li>
                    @else
                        <li><a href="{{ route('user.login') }}" class="block px-3 py-2 text-xs hover:bg-gray-100">@lang('Sign In')</a></li>
                        <li><a href="{{ route('user.register') }}" class="block px-3 py-2 text-xs hover:bg-gray-100">@lang('Sign Up')</a></li>
                    @endauth
                </ul>
            </li>
        </ul>
    </div>
</div>

<nav class="bg-gray-100 shadow sticky top-0 z-40" dir="{{ $isRTL ? 'rtl' : 'ltr' }}">
    <div class="max-w-7xl mx-auto px-3 sm:px-4">
        <div class="flex justify-between items-center h-14 sm:h-16">
            <a href="{{ url('/') }}" class="flex items-center">
                <img src="{{ siteLogo() }}" alt="Logo" class="h-8 sm:h-10 md:h-12"/>
            </a>

            <div class="hidden md:flex items-center">
                <div class="flex items-center space-x-1 lg:space-x-2 xl:space-x-3 rtl:space-x-reverse">
                    <a href="{{ url('/') }}" class="px-2 py-1 text-gray-700 hover:text-purple-700 text-xs sm:text-sm whitespace-nowrap">@lang('Home')</a>
                    <a href="{{ route('about') }}" class="px-2 py-1 text-gray-700 hover:text-purple-700 text-xs sm:text-sm whitespace-nowrap ">@lang('About Us')</a>
                    <a href="{{ route('contact') }}" class="px-2 py-1 text-gray-700 hover:text-purple-700 text-xs sm:text-sm whitespace-nowrap lg:hidden xl:hidden">@lang('Contact Us')</a>
                    <div class="relative lg:hidden xl:hidden group">
                        <button class="flex items-center px-2 py-1 text-gray-700 hover:text-purple-700 text-xs sm:text-sm whitespace-nowrap">
                            @lang('More')
                            <svg class="w-3 h-3 ml-1 rtl:mr-1 rtl:ml-0" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M5.25 7.75L10 12.5l4.75-4.75"/>
                            </svg>
                        </button>
                        <div class="absolute {{ $isRTL ? 'right-[-42px]' : 'left-[-42px]' }} mt-1 w-48 bg-white rounded-md shadow-lg py-1 z-50 hidden group-hover:block border border-gray-100 more-menu">
                            <a href="{{ route('service') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-purple-50 hover:text-purple-700">@lang('Our Services')</a>
                            <a href="{{ route('targeted.sector') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-purple-50 hover:text-purple-700">@lang('Targeted Sectors')</a>
                            <a href="{{ route('training.program') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-purple-50 hover:text-purple-700">@lang('Training Programs')</a>
                            <a href="{{ route('community.engagement') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-purple-50 hover:text-purple-700">@lang('Community Engagement')</a>
                            <a href="{{ route('licenses.document') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-purple-50 hover:text-purple-700">@lang('Documents & Certificate')</a>
                        </div>
                    </div>
                    
                    
                    <a href="{{ route('submit.resume') }}" class="ml-2 px-3 py-1 bg-purple-700 text-white rounded hover:bg-purple-800 text-xs sm:text-sm whitespace-nowrap lg:hidden xl:hidden">
                      @lang('Submit')
                    </a>
                    
                </div>
                
                <div class="hidden lg:flex items-center space-x-1 lg:space-x-2 xl:space-x-3 rtl:space-x-reverse ml-2">
                    <a href="{{ route('service') }}" class="px-2 py-1 text-gray-700 hover:text-purple-700 text-xs sm:text-sm whitespace-nowrap">@lang('Our Services')</a>
                    <a href="{{ route('targeted.sector') }}" class="px-2 py-1 text-gray-700 hover:text-purple-700 text-xs sm:text-sm whitespace-nowrap">@lang('Targeted Sectors')</a>
                    <a href="{{ route('training.program') }}" class="px-2 py-1 text-gray-700 hover:text-purple-700 text-xs sm:text-sm whitespace-nowrap">@lang('Training Programs')</a>
                    <a href="{{ route('community.engagement') }}" class="px-2 py-1 text-gray-700 hover:text-purple-700 text-xs sm:text-sm whitespace-nowrap">@lang('Community Engagement')</a>
                    <a href="{{ route('licenses.document') }}" class="px-2 py-1 text-gray-700 hover:text-purple-700 text-xs sm:text-sm whitespace-nowrap">@lang('Documents & Certificate')</a>
                    <a href="{{ route('contact') }}" class="px-2 py-1 text-gray-700 hover:text-purple-700 text-xs sm:text-sm whitespace-nowrap">@lang('Contact Us')</a>
                    <a href="{{ route('submit.resume') }}" class="ml-2 px-3 py-1 bg-purple-700 text-white rounded hover:bg-purple-800 text-xs sm:text-sm whitespace-nowrap">
                      @lang('Submit')
                    </a>
                </div>
            </div>

            <button class="md:hidden text-gray-700 focus:outline-none" aria-label="Toggle menu" onclick="showMobileMenu()">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </div>

    <div id="mobileMenu" class="md:hidden hidden bg-white shadow-lg" dir="{{ $isRTL ? 'rtl' : 'ltr' }}" >
        <div class="px-3 py-2 space-y-1">
            <a href="{{ url('/') }}" class="block py-2 px-1 text-sm hover:bg-gray-50 rounded">@lang('Home')</a>
            <a href="{{ route('about') }}" class="block py-2 px-1 text-sm hover:bg-gray-50 rounded">@lang('About Us')</a>
            <a href="{{ route('service') }}" class="block py-2 px-1 text-sm hover:bg-gray-50 rounded">@lang('Our Services')</a>
            <a href="{{ route('targeted.sector') }}" class="block py-2 px-1 text-sm hover:bg-gray-50 rounded">@lang('Targeted Sectors')</a>
            <a href="{{ route('training.program') }}" class="block py-2 px-1 text-sm hover:bg-gray-50 rounded">@lang('Training Programs')</a>
            <a href="{{ route('community.engagement') }}" class="block py-2 px-1 text-sm hover:bg-gray-50 rounded">@lang('Community Engagement')</a>
            <a href="{{ route('licenses.document') }}" class="block py-2 px-1 text-sm hover:bg-gray-50 rounded">@lang('Documents & Certificate')</a>
            <a href="{{ route('contact') }}" class="block py-2 px-1 text-sm hover:bg-gray-50 rounded">@lang('Contact Us')</a>
            <a href="{{ route('submit.resume') }}" class="block mt-2 px-4 py-2 bg-purple-700 text-white rounded hover:bg-purple-800 text-center text-sm">
                @lang('Submit')
            </a>
        </div>
    </div>
</nav>
