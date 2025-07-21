@php
    $lang = app()->getLocale();
@endphp

<div class="bg-purple-900 text-white text-sm h-8">
  <div class="max-w-7xl mx-auto px-6 flex justify-end items-center py-1">
    <ul class="flex space-x-4">
      <li class="flex items-center">
        @if (gs('multi_language'))
            @if (@$lang == 'en')
                <a href="#" class="flex items-center hover:text-gray-300 langSel me-2" data-lang="ar">
                    <img src="https://flagicons.lipis.dev/flags/4x3/sa.svg" alt="Arabic Flag" class="h-4 mr-2" />
                    @lang('Arabic')
                </a>
            @endif

            @if (@$lang == 'ar')
                <a href="#" class="flex items-center hover:text-gray-300 langSel me-2" data-lang="en">
                    <img src="https://flagicons.lipis.dev/flags/4x3/us.svg" alt="Arabic Flag" class="h-4 mr-2 me-2" />
                    @lang('English')
                </a>
            @endif
        @endif
      </li>
      <li class="relative group">

        <button class="flex items-center hover:text-gray-300 focus:outline-none me-2">
          <i class="bi bi-person-fill mr-1"></i> @lang('Account')
          <svg class="ml-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
            <path d="M5.25 7.75L10 12.5l4.75-4.75" />
          </svg>
        </button>

        <ul class="absolute right-0 w-40 mt-1 bg-white text-black rounded shadow-md hidden group-hover:block z-50">
            @if(auth()->check())
                <li><a href="{{ route('user.home') }}" class="block px-4 py-2 hover:bg-gray-100">@lang('Dashboard')</a></li>
                <li><a href="{{ route('user.logout') }}" class="block px-4 py-2 hover:bg-gray-100">@lang('Logout')</a></li>
            @else
                <li><a href="{{ route('user.login') }}" class="block px-4 py-2 hover:bg-gray-100">@lang('Sign In')</a></li>
                <li><a href="{{ route('user.register') }}" class="block px-4 py-2 hover:bg-gray-100">@lang('Sing Up')</a></li>
            @endif
        </ul>


      </li>
    </ul>
  </div>
</div>

<nav class="bg-gray-100 shadow">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center h-16">
      <a href="#" class="flex items-center">
        <img src="{{ siteLogo() }}" alt="HRinco Logo" class="h-12" />
      </a>

      <div class="md:hidden">
        <button type="button" class="text-gray-500 hover:text-black focus:outline-none" onclick="showMobileMenu()">
          <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>

      <div class="hidden md:flex space-x-6 items-center">
        <a href="{{ url('/') }}" class="text-gray-700 hover:text-purple-700 text-sm">@lang('Home')</a>
        <a href="{{ route('about') }}" class="text-gray-700 hover:text-purple-700 text-sm">@lang('About Us')</a>
        <a href="{{ route('service') }}" class="text-gray-700 hover:text-purple-700 text-sm">@lang('Our Services')</a>
        <a href="{{ route('targeted.sector') }}" class="text-gray-700 hover:text-purple-700 text-sm">@lang('Targeted Sectors')</a>
        <a href="{{ route('training.program') }}" class="text-gray-700 hover:text-purple-700 text-sm">@lang('Training Programs')</a>
        <a href="{{ route('community.engagement') }}" class="text-gray-700 hover:text-purple-700 text-sm">@lang('Community Engagement')</a>
        <a href="{{ route('licenses.document') }}" class="text-gray-700 hover:text-purple-700 text-sm">@lang('Documents & Certificate')</a>
        <a href="{{ route('contact') }}" class="text-gray-700 hover:text-purple-700 text-sm">@lang('Contact Us')</a>
        <a href="{{ route('submit.resume') }}" class="ml-2 px-4 py-2 bg-purple-700 text-white rounded hover:bg-purple-800 transition">@lang('Submit')</a>
      </div>
    </div>
  </div>

  <div class="md:hidden hidden" id="showMenu">
    <div class="px-4 pt-2 pb-4 space-y-2">
      <a href="{{ url('/') }}" class="block text-gray-700 hover:text-purple-700 text-sm">@lang('Home')</a>
      <a href="{{ route('about') }}" class="block text-gray-700 hover:text-purple-700 text-sm">@lang('About Us')</a>
      <a href="{{ route('service') }}" class="block text-gray-700 hover:text-purple-700 text-sm">@lang('Our Services')</a>
      <a href="{{ route('targeted.sector') }}" class="block text-gray-700 hover:text-purple-700 text-sm">@lang('Targeted Sectors')</a>
      <a href="{{ route('training.program') }}" class="block text-gray-700 hover:text-purple-700 text-sm">@lang('Training Programs')</a>
      <a href="{{ route('community.engagement') }}" class="block text-gray-700 hover:text-purple-700 text-sm">@lang('Community Engagement')</a>
      <a href="{{ route('licenses.document') }}" class="block text-gray-700 hover:text-purple-700 text-sm">@lang('Documents & Certificate')</a>
      <a href="{{ route('contact') }}" class="block text-gray-700 hover:text-purple-700 text-sm">@lang('Contact Us')</a>
      <a href="{{ route('submit.resume') }}" class="block mt-2 px-4 py-2 bg-purple-700 text-white rounded hover:bg-purple-800">@lang('Submit')</a>
    </div>
  </div>
</nav>
