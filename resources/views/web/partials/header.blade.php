<div class="bg-purple-900 text-white text-sm h-8">
  <div class="max-w-7xl mx-auto px-6 flex justify-end items-center py-1">
    <ul class="flex space-x-4">
      <li class="flex items-center">
        <a href="#" class="flex items-center hover:text-gray-300">
          <img src="https://flagicons.lipis.dev/flags/4x3/sa.svg" alt="Arabic Flag" class="h-4 mr-2" />
          Arabic
        </a>
      </li>
      <li class="relative group">
        <button class="flex items-center hover:text-gray-300 focus:outline-none">
          <i class="bi bi-person-fill mr-1"></i> Account
          <svg class="ml-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
            <path d="M5.25 7.75L10 12.5l4.75-4.75" />
          </svg>
        </button>
        <ul class="absolute right-0 mt-2 w-40 bg-white text-black rounded shadow-md hidden group-hover:block z-50">
          <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Profile</a></li>
          <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Settings</a></li>
          <li><hr class="my-1 border-gray-200" /></li>
          <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Logout</a></li>
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
        <button type="button" class="text-gray-500 hover:text-black focus:outline-none" @click="open = !open">
          <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>

      <div class="hidden md:flex space-x-6 items-center">
        <a href="{{ url('/') }}" class="text-gray-700 hover:text-purple-700 text-sm">Home</a>
        <a href="#" class="text-gray-700 hover:text-purple-700 text-sm">About Us</a>
        <a href="#" class="text-gray-700 hover:text-purple-700 text-sm">Our Services</a>
        <a href="#" class="text-gray-700 hover:text-purple-700 text-sm">Targeted Sectors</a>
        <a href="#" class="text-gray-700 hover:text-purple-700 text-sm">Training Programs</a>
        <a href="#" class="text-gray-700 hover:text-purple-700 text-sm">Community Engagement</a>
        <a href="#" class="text-gray-700 hover:text-purple-700 text-sm">Documents & Certificate</a>
        <a href="#" class="text-gray-700 hover:text-purple-700 text-sm">Contact Us</a>
        <a href="#" class="ml-2 px-4 py-2 bg-purple-700 text-white rounded hover:bg-purple-800 transition">Submit</a>
      </div>
    </div>
  </div>

  <div class="md:hidden" x-show="open">
    <div class="px-4 pt-2 pb-4 space-y-2">
      <a href="{{ url('/') }}" class="block text-gray-700 hover:text-purple-700 text-sm">Home</a>
      <a href="#" class="block text-gray-700 hover:text-purple-700 text-sm">About Us</a>
      <a href="#" class="block text-gray-700 hover:text-purple-700 text-sm">Our Services</a>
      <a href="#" class="block text-gray-700 hover:text-purple-700 text-sm">Targeted Sectors</a>
      <a href="#" class="block text-gray-700 hover:text-purple-700 text-sm">Training Programs</a>
      <a href="#" class="block text-gray-700 hover:text-purple-700 text-sm">Community Engagement</a>
      <a href="#" class="block text-gray-700 hover:text-purple-700 text-sm">Documents & Certificate</a>
      <a href="#" class="block text-gray-700 hover:text-purple-700 text-sm">Contact Us</a>
      <a href="#" class="block mt-2 px-4 py-2 bg-purple-700 text-white rounded hover:bg-purple-800">Submit</a>
    </div>
  </div>
</nav>
