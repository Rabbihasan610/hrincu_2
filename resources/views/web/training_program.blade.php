@extends("web.layouts.frontend", ["title" => gs("site_name")])

@section("content")
        <x-breadcrumb title="Training Program" />


        <section class="bg-[#FFFFFF] px-4 py-16 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-7xl">
                <h3 class="mb-3 text-3xl text-gray-900">Training Program Features</h3>
                <hr class="mb-6">
                <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    <div class="bg-[#F9F9FF] flex flex-col overflow-hidden rounded-lg">
                        <div class="flex w-full items-center justify-center p-3 text-gray-500">
                            <img src="https://placehold.co/500x350" class="w-100 h-48 rounded" alt="">
                        </div>
                        <div class="flex-grow p-6">
                            <h3 class="mb-2 text-xl font-semibold text-gray-900">Commercial and Service Sector</h3>
                        </div>
                    </div>


                    <div class="bg-[#F9F9FF] flex flex-col overflow-hidden rounded-lg">
                        <div class="flex w-full items-center justify-center p-3 text-gray-500">
                            <img src="https://placehold.co/500x350" class="w-100 h-48 rounded" alt="">
                        </div>
                        <div class="flex-grow p-6">
                            <h3 class="mb-2 text-xl font-semibold text-gray-900">Commercial and Service Sector</h3>
                        </div>
                    </div>


                    <div class="bg-[#F9F9FF] flex flex-col overflow-hidden rounded-lg">
                        <div class="flex w-full items-center justify-center p-3 text-gray-500">
                            <img src="https://placehold.co/500x350" class="w-100 h-48 rounded" alt="">
                        </div>
                        <div class="flex-grow p-6">
                            <h3 class="mb-2 text-xl font-semibold text-gray-900">Commercial and Service Sector</h3>
                        </div>
                    </div>


                    <div class="bg-[#F9F9FF] flex flex-col overflow-hidden rounded-lg">
                        <div class="flex w-full items-center justify-center p-3 text-gray-500">
                            <img src="https://placehold.co/500x350" class="w-100 h-48 rounded" alt="">
                        </div>
                        <div class="flex-grow p-6">
                            <h3 class="mb-2 text-xl font-semibold text-gray-900">Commercial and Service Sector</h3>
                        </div>
                    </div>


                    <div class="bg-[#F9F9FF] flex flex-col overflow-hidden rounded-lg">
                        <div class="flex w-full items-center justify-center p-3 text-gray-500">
                            <img src="https://placehold.co/500x350" class="w-100 h-48 rounded" alt="">
                        </div>
                        <div class="flex-grow p-6">
                            <h3 class="mb-2 text-xl font-semibold text-gray-900">Commercial and Service Sector</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="bg-gray-200 py-3">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col lg:flex-row">
                    <div class="w-full lg:w-1/4 rounded-lg p-4 lg:mr-8 mb-6 lg:mb-0">
                        <h3 class="text-lg bg-blue-700 py-2 px-3 font-semibold text-white">Category</h3>
                        <ul class="bg-white">
                            <li><a href="#" class="block py-2 px-3 text-gray-700 hover:bg-gray-100 rounded-md mb-1 transition-colors duration-200">Technology & IT</a></li>
                            <li><a href="#" class="block py-2 px-3 text-gray-700 hover:bg-gray-100 rounded-md mb-1 transition-colors duration-200">Business and Management</a></li>
                            <li><a href="#" class="block py-2 px-3 text-gray-700 hover:bg-gray-100 rounded-md mb-1 transition-colors duration-200">Personal Development & Soft Skills</a></li>
                            <li><a href="#" class="block py-2 px-3 text-gray-700 hover:bg-gray-100 rounded-md mb-1 transition-colors duration-200">Personal Development & Soft Skills</a></li>
                            <li><a href="#" class="block py-2 px-3 text-gray-700 hover:bg-gray-100 rounded-md mb-1 transition-colors duration-200">Language</a></li>
                            <li><a href="#" class="block py-2 px-3 text-gray-700 hover:bg-gray-100 rounded-md mb-1 transition-colors duration-200">Education & Training</a></li>
                            <li><a href="#" class="block py-2 px-3 text-gray-700 hover:bg-gray-100 rounded-md mb-1 transition-colors duration-200">Arts & Design</a></li>
                            <li><a href="#" class="block py-2 px-3 text-gray-700 hover:bg-gray-100 rounded-md mb-1 transition-colors duration-200">Legal & Regulatory</a></li>
                            <li><a href="#" class="block py-2 px-3 text-gray-700 hover:bg-gray-100 rounded-md mb-1 transition-colors duration-200">Accounting & Finance</a></li>
                            <li><a href="#" class="block py-2 px-3 text-gray-700 hover:bg-gray-100 rounded-md mb-1 transition-colors duration-200">Professional & Future Skills</a></li>
                            <li><a href="#" class="block py-2 px-3 text-gray-700 hover:bg-gray-100 rounded-md mb-1 transition-colors duration-200">Occupational safety & Health</a></li>
                            <li><a href="#" class="block py-2 px-3 text-gray-700 hover:bg-gray-100 rounded-md mb-1 transition-colors duration-200">Security & Safety</a></li>
                            <li><a href="#" class="block py-2 px-3 text-gray-700 hover:bg-gray-100 rounded-md mb-1 transition-colors duration-200">Food & Drug Training</a></li>
                        </ul>
                    </div>

                    <div class="w-full lg:w-3/4 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 mt-4">

                        <div class="bg-white shadow-md rounded-xl radius-10 border-1 overflow-hidden p-3">
                            <div class="relative">
                                <img src="https://placehold.co/400x200" alt="Creative Marketing Agency" class="w-full h-40 object-cover">
                            </div>
                            <div class="mt-4">
                                <p class="text-xs text-gray-500 mb-1">Design by <span class="text-purple-600">HR Team</span></p>
                                <h4 class="text-lg font-semibold text-gray-900 mb-2">Programming and software development</h4>

                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex">
                                        <span class="text-purple-500 font-bold text-sm mr-1">4.9/5</span>
                                        <div class="flex mr-3">
                                            <svg class="w-3 h-3 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.644 5.068a1 1 0 00.95.691h5.334c.954 0 1.341 1.25.574 1.838l-4.303 3.125a1 1 0 00-.364 1.118l1.644 5.068c.3.921-.755 1.688-1.539 1.118l-4.303-3.125a1 1 0 00-1.176 0l-4.303 3.125c-.784.57-1.839-.197-1.539-1.118l1.644-5.068a1 1 0 00-.364-1.118L.557 10.524c-.767-.588-.38-1.838.574-1.838h5.334a1 1 0 00.95-.691l1.644-5.068z"></path></svg>
                                            <svg class="w-3 h-3 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.644 5.068a1 1 0 00.95.691h5.334c.954 0 1.341 1.25.574 1.838l-4.303 3.125a1 1 0 00-.364 1.118l1.644 5.068c.3.921-.755 1.688-1.539 1.118l-4.303-3.125a1 1 0 00-1.176 0l-4.303 3.125c-.784.57-1.839-.197-1.539-1.118l1.644-5.068a1 1 0 00-.364-1.118L.557 10.524c-.767-.588-.38-1.838.574-1.838h5.334a1 1 0 00.95-.691l1.644-5.068z"></path></svg>
                                            <svg class="w-3 h-3 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.644 5.068a1 1 0 00.95.691h5.334c.954 0 1.341 1.25.574 1.838l-4.303 3.125a1 1 0 00-.364 1.118l1.644 5.068c.3.921-.755 1.688-1.539 1.118l-4.303-3.125a1 1 0 00-1.176 0l-4.303 3.125c-.784.57-1.839-.197-1.539-1.118l1.644-5.068a1 1 0 00-.364-1.118L.557 10.524c-.767-.588-.38-1.838.574-1.838h5.334a1 1 0 00.95-.691l1.644-5.068z"></path></svg>
                                            <svg class="w-3 h-3 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.644 5.068a1 1 0 00.95.691h5.334c.954 0 1.341 1.25.574 1.838l-4.303 3.125a1 1 0 00-.364 1.118l1.644 5.068c.3.921-.755 1.688-1.539 1.118l-4.303-3.125a1 1 0 00-1.176 0l-4.303 3.125c-.784.57-1.839-.197-1.539-1.118l1.644-5.068a1 1 0 00-.364-1.118L.557 10.524c-.767-.588-.38-1.838.574-1.838h5.334a1 1 0 00.95-.691l1.644-5.068z"></path></svg>
                                            <svg class="w-3 h-3 text-gray-300" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.644 5.068a1 1 0 00.95.691h5.334c.954 0 1.341 1.25.574 1.838l-4.303 3.125a1 1 0 00-.364 1.118l1.644 5.068c.3.921-.755 1.688-1.539 1.118l-4.303-3.125a1 1 0 00-1.176 0l-4.303 3.125c-.784.57-1.839-.197-1.539-1.118l1.644-5.068a1 1 0 00-.364-1.118L.557 10.524c-.767-.588-.38-1.838.574-1.838h5.334a1 1 0 00.95-.691l1.644-5.068z"></path></svg>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="text-gray-500 text-sm text-purple-500">(100+ Enrol)</span>
                                    </div>
                                </div>

                                <button class=" bg-purple-600 text-white p-2 hover:bg-purple-700 transition-colors duration-200">Apply Request</button>
                            </div>
                        </div>

                        <div class="bg-white shadow-md rounded-xl overflow-hidden p-3 h-100">
                            <div class="relative">
                                <img src="https://placehold.co/400x200" alt="Creative Marketing Agency" class="w-full h-40 object-cover">
                            </div>
                            <div class="mt-4">
                                <p class="text-xs text-gray-500 mb-1">Design by <span class="text-purple-600">HR Team</span></p>
                                <h4 class="text-lg font-semibold text-gray-900 mb-2">Programming and software development</h4>

                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex">
                                        <span class="text-purple-500 font-bold text-sm mr-1">4.9/5</span>
                                        <div class="flex mr-3">
                                            <svg class="w-3 h-3 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.644 5.068a1 1 0 00.95.691h5.334c.954 0 1.341 1.25.574 1.838l-4.303 3.125a1 1 0 00-.364 1.118l1.644 5.068c.3.921-.755 1.688-1.539 1.118l-4.303-3.125a1 1 0 00-1.176 0l-4.303 3.125c-.784.57-1.839-.197-1.539-1.118l1.644-5.068a1 1 0 00-.364-1.118L.557 10.524c-.767-.588-.38-1.838.574-1.838h5.334a1 1 0 00.95-.691l1.644-5.068z"></path></svg>
                                            <svg class="w-3 h-3 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.644 5.068a1 1 0 00.95.691h5.334c.954 0 1.341 1.25.574 1.838l-4.303 3.125a1 1 0 00-.364 1.118l1.644 5.068c.3.921-.755 1.688-1.539 1.118l-4.303-3.125a1 1 0 00-1.176 0l-4.303 3.125c-.784.57-1.839-.197-1.539-1.118l1.644-5.068a1 1 0 00-.364-1.118L.557 10.524c-.767-.588-.38-1.838.574-1.838h5.334a1 1 0 00.95-.691l1.644-5.068z"></path></svg>
                                            <svg class="w-3 h-3 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.644 5.068a1 1 0 00.95.691h5.334c.954 0 1.341 1.25.574 1.838l-4.303 3.125a1 1 0 00-.364 1.118l1.644 5.068c.3.921-.755 1.688-1.539 1.118l-4.303-3.125a1 1 0 00-1.176 0l-4.303 3.125c-.784.57-1.839-.197-1.539-1.118l1.644-5.068a1 1 0 00-.364-1.118L.557 10.524c-.767-.588-.38-1.838.574-1.838h5.334a1 1 0 00.95-.691l1.644-5.068z"></path></svg>
                                            <svg class="w-3 h-3 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.644 5.068a1 1 0 00.95.691h5.334c.954 0 1.341 1.25.574 1.838l-4.303 3.125a1 1 0 00-.364 1.118l1.644 5.068c.3.921-.755 1.688-1.539 1.118l-4.303-3.125a1 1 0 00-1.176 0l-4.303 3.125c-.784.57-1.839-.197-1.539-1.118l1.644-5.068a1 1 0 00-.364-1.118L.557 10.524c-.767-.588-.38-1.838.574-1.838h5.334a1 1 0 00.95-.691l1.644-5.068z"></path></svg>
                                            <svg class="w-3 h-3 text-gray-300" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.644 5.068a1 1 0 00.95.691h5.334c.954 0 1.341 1.25.574 1.838l-4.303 3.125a1 1 0 00-.364 1.118l1.644 5.068c.3.921-.755 1.688-1.539 1.118l-4.303-3.125a1 1 0 00-1.176 0l-4.303 3.125c-.784.57-1.839-.197-1.539-1.118l1.644-5.068a1 1 0 00-.364-1.118L.557 10.524c-.767-.588-.38-1.838.574-1.838h5.334a1 1 0 00.95-.691l1.644-5.068z"></path></svg>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="text-gray-500 text-sm text-purple-500">(100+ Enrol)</span>
                                    </div>
                                </div>

                                <button class=" bg-purple-600 text-white p-2 hover:bg-purple-700 transition-colors duration-200">Apply Request</button>
                            </div>
                        </div>

                        <div class="bg-white shadow-md  rounded-xl overflow-hidden p-3 h-100">
                            <div class="relative">
                                <img src="https://placehold.co/400x200" alt="Creative Marketing Agency" class="w-full h-40 object-cover">
                            </div>
                            <div class="mt-4">
                                <p class="text-xs text-gray-500 mb-1">Design by <span class="text-purple-600">HR Team</span></p>
                                <h4 class="text-lg font-semibold text-gray-900 mb-2">Programming and software development</h4>

                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex">
                                        <span class="text-purple-500 font-bold text-sm mr-1">4.9/5</span>
                                        <div class="flex mr-3">
                                            <svg class="w-3 h-3 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.644 5.068a1 1 0 00.95.691h5.334c.954 0 1.341 1.25.574 1.838l-4.303 3.125a1 1 0 00-.364 1.118l1.644 5.068c.3.921-.755 1.688-1.539 1.118l-4.303-3.125a1 1 0 00-1.176 0l-4.303 3.125c-.784.57-1.839-.197-1.539-1.118l1.644-5.068a1 1 0 00-.364-1.118L.557 10.524c-.767-.588-.38-1.838.574-1.838h5.334a1 1 0 00.95-.691l1.644-5.068z"></path></svg>
                                            <svg class="w-3 h-3 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.644 5.068a1 1 0 00.95.691h5.334c.954 0 1.341 1.25.574 1.838l-4.303 3.125a1 1 0 00-.364 1.118l1.644 5.068c.3.921-.755 1.688-1.539 1.118l-4.303-3.125a1 1 0 00-1.176 0l-4.303 3.125c-.784.57-1.839-.197-1.539-1.118l1.644-5.068a1 1 0 00-.364-1.118L.557 10.524c-.767-.588-.38-1.838.574-1.838h5.334a1 1 0 00.95-.691l1.644-5.068z"></path></svg>
                                            <svg class="w-3 h-3 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.644 5.068a1 1 0 00.95.691h5.334c.954 0 1.341 1.25.574 1.838l-4.303 3.125a1 1 0 00-.364 1.118l1.644 5.068c.3.921-.755 1.688-1.539 1.118l-4.303-3.125a1 1 0 00-1.176 0l-4.303 3.125c-.784.57-1.839-.197-1.539-1.118l1.644-5.068a1 1 0 00-.364-1.118L.557 10.524c-.767-.588-.38-1.838.574-1.838h5.334a1 1 0 00.95-.691l1.644-5.068z"></path></svg>
                                            <svg class="w-3 h-3 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.644 5.068a1 1 0 00.95.691h5.334c.954 0 1.341 1.25.574 1.838l-4.303 3.125a1 1 0 00-.364 1.118l1.644 5.068c.3.921-.755 1.688-1.539 1.118l-4.303-3.125a1 1 0 00-1.176 0l-4.303 3.125c-.784.57-1.839-.197-1.539-1.118l1.644-5.068a1 1 0 00-.364-1.118L.557 10.524c-.767-.588-.38-1.838.574-1.838h5.334a1 1 0 00.95-.691l1.644-5.068z"></path></svg>
                                            <svg class="w-3 h-3 text-gray-300" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.644 5.068a1 1 0 00.95.691h5.334c.954 0 1.341 1.25.574 1.838l-4.303 3.125a1 1 0 00-.364 1.118l1.644 5.068c.3.921-.755 1.688-1.539 1.118l-4.303-3.125a1 1 0 00-1.176 0l-4.303 3.125c-.784.57-1.839-.197-1.539-1.118l1.644-5.068a1 1 0 00-.364-1.118L.557 10.524c-.767-.588-.38-1.838.574-1.838h5.334a1 1 0 00.95-.691l1.644-5.068z"></path></svg>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="text-gray-500 text-sm text-purple-500">(100+ Enrol)</span>
                                    </div>
                                </div>

                                <button class=" bg-purple-600 text-white p-2 hover:bg-purple-700 transition-colors duration-200">Apply Request</button>
                            </div>
                        </div>


                        <div class="bg-white shadow-md rounded-lg overflow-hidden p-3 h-100">
                            <div class="relative">
                                <img src="https://placehold.co/400x200" alt="Creative Marketing Agency" class="w-full h-40 object-cover">
                            </div>
                            <div class="mt-4">
                                <p class="text-xs text-gray-500 mb-1">Design by <span class="text-purple-600">HR Team</span></p>
                                <h4 class="text-lg font-semibold text-gray-900 mb-2">Programming and software development</h4>

                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex">
                                        <span class="text-purple-500 font-bold text-sm mr-1">4.9/5</span>
                                        <div class="flex mr-3">
                                            <svg class="w-3 h-3 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.644 5.068a1 1 0 00.95.691h5.334c.954 0 1.341 1.25.574 1.838l-4.303 3.125a1 1 0 00-.364 1.118l1.644 5.068c.3.921-.755 1.688-1.539 1.118l-4.303-3.125a1 1 0 00-1.176 0l-4.303 3.125c-.784.57-1.839-.197-1.539-1.118l1.644-5.068a1 1 0 00-.364-1.118L.557 10.524c-.767-.588-.38-1.838.574-1.838h5.334a1 1 0 00.95-.691l1.644-5.068z"></path></svg>
                                            <svg class="w-3 h-3 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.644 5.068a1 1 0 00.95.691h5.334c.954 0 1.341 1.25.574 1.838l-4.303 3.125a1 1 0 00-.364 1.118l1.644 5.068c.3.921-.755 1.688-1.539 1.118l-4.303-3.125a1 1 0 00-1.176 0l-4.303 3.125c-.784.57-1.839-.197-1.539-1.118l1.644-5.068a1 1 0 00-.364-1.118L.557 10.524c-.767-.588-.38-1.838.574-1.838h5.334a1 1 0 00.95-.691l1.644-5.068z"></path></svg>
                                            <svg class="w-3 h-3 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.644 5.068a1 1 0 00.95.691h5.334c.954 0 1.341 1.25.574 1.838l-4.303 3.125a1 1 0 00-.364 1.118l1.644 5.068c.3.921-.755 1.688-1.539 1.118l-4.303-3.125a1 1 0 00-1.176 0l-4.303 3.125c-.784.57-1.839-.197-1.539-1.118l1.644-5.068a1 1 0 00-.364-1.118L.557 10.524c-.767-.588-.38-1.838.574-1.838h5.334a1 1 0 00.95-.691l1.644-5.068z"></path></svg>
                                            <svg class="w-3 h-3 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.644 5.068a1 1 0 00.95.691h5.334c.954 0 1.341 1.25.574 1.838l-4.303 3.125a1 1 0 00-.364 1.118l1.644 5.068c.3.921-.755 1.688-1.539 1.118l-4.303-3.125a1 1 0 00-1.176 0l-4.303 3.125c-.784.57-1.839-.197-1.539-1.118l1.644-5.068a1 1 0 00-.364-1.118L.557 10.524c-.767-.588-.38-1.838.574-1.838h5.334a1 1 0 00.95-.691l1.644-5.068z"></path></svg>
                                            <svg class="w-3 h-3 text-gray-300" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.644 5.068a1 1 0 00.95.691h5.334c.954 0 1.341 1.25.574 1.838l-4.303 3.125a1 1 0 00-.364 1.118l1.644 5.068c.3.921-.755 1.688-1.539 1.118l-4.303-3.125a1 1 0 00-1.176 0l-4.303 3.125c-.784.57-1.839-.197-1.539-1.118l1.644-5.068a1 1 0 00-.364-1.118L.557 10.524c-.767-.588-.38-1.838.574-1.838h5.334a1 1 0 00.95-.691l1.644-5.068z"></path></svg>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="text-gray-500 text-sm text-purple-500">(100+ Enrol)</span>
                                    </div>
                                </div>

                                <button class=" bg-purple-600 text-white p-2 hover:bg-purple-700 transition-colors duration-200">Apply Request</button>
                            </div>
                        </div>


                        <div class="bg-white shadow-md overflow-hidden p-3 h-100">
                            <div class="relative">
                                <img src="https://placehold.co/400x200" alt="Creative Marketing Agency" class="w-full h-40 object-cover">
                            </div>
                            <div class="mt-4">
                                <p class="text-xs text-gray-500 mb-1">Design by <span class="text-purple-600">HR Team</span></p>
                                <h4 class="text-lg font-semibold text-gray-900 mb-2">Programming and software development</h4>

                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex">
                                        <span class="text-purple-500 font-bold text-sm mr-1">4.9/5</span>
                                        <div class="flex mr-3">
                                            <svg class="w-3 h-3 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.644 5.068a1 1 0 00.95.691h5.334c.954 0 1.341 1.25.574 1.838l-4.303 3.125a1 1 0 00-.364 1.118l1.644 5.068c.3.921-.755 1.688-1.539 1.118l-4.303-3.125a1 1 0 00-1.176 0l-4.303 3.125c-.784.57-1.839-.197-1.539-1.118l1.644-5.068a1 1 0 00-.364-1.118L.557 10.524c-.767-.588-.38-1.838.574-1.838h5.334a1 1 0 00.95-.691l1.644-5.068z"></path></svg>
                                            <svg class="w-3 h-3 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.644 5.068a1 1 0 00.95.691h5.334c.954 0 1.341 1.25.574 1.838l-4.303 3.125a1 1 0 00-.364 1.118l1.644 5.068c.3.921-.755 1.688-1.539 1.118l-4.303-3.125a1 1 0 00-1.176 0l-4.303 3.125c-.784.57-1.839-.197-1.539-1.118l1.644-5.068a1 1 0 00-.364-1.118L.557 10.524c-.767-.588-.38-1.838.574-1.838h5.334a1 1 0 00.95-.691l1.644-5.068z"></path></svg>
                                            <svg class="w-3 h-3 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.644 5.068a1 1 0 00.95.691h5.334c.954 0 1.341 1.25.574 1.838l-4.303 3.125a1 1 0 00-.364 1.118l1.644 5.068c.3.921-.755 1.688-1.539 1.118l-4.303-3.125a1 1 0 00-1.176 0l-4.303 3.125c-.784.57-1.839-.197-1.539-1.118l1.644-5.068a1 1 0 00-.364-1.118L.557 10.524c-.767-.588-.38-1.838.574-1.838h5.334a1 1 0 00.95-.691l1.644-5.068z"></path></svg>
                                            <svg class="w-3 h-3 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.644 5.068a1 1 0 00.95.691h5.334c.954 0 1.341 1.25.574 1.838l-4.303 3.125a1 1 0 00-.364 1.118l1.644 5.068c.3.921-.755 1.688-1.539 1.118l-4.303-3.125a1 1 0 00-1.176 0l-4.303 3.125c-.784.57-1.839-.197-1.539-1.118l1.644-5.068a1 1 0 00-.364-1.118L.557 10.524c-.767-.588-.38-1.838.574-1.838h5.334a1 1 0 00.95-.691l1.644-5.068z"></path></svg>
                                            <svg class="w-3 h-3 text-gray-300" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.644 5.068a1 1 0 00.95.691h5.334c.954 0 1.341 1.25.574 1.838l-4.303 3.125a1 1 0 00-.364 1.118l1.644 5.068c.3.921-.755 1.688-1.539 1.118l-4.303-3.125a1 1 0 00-1.176 0l-4.303 3.125c-.784.57-1.839-.197-1.539-1.118l1.644-5.068a1 1 0 00-.364-1.118L.557 10.524c-.767-.588-.38-1.838.574-1.838h5.334a1 1 0 00.95-.691l1.644-5.068z"></path></svg>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="text-gray-500 text-sm text-purple-500">(100+ Enrol)</span>
                                    </div>
                                </div>

                                <button class=" bg-purple-600 text-white p-2 hover:bg-purple-700 transition-colors duration-200">Apply Request</button>
                            </div>
                        </div>



                        <div class="bg-white shadow-md overflow-hidden p-3 h-100">
                            <div class="relative">
                                <img src="https://placehold.co/400x200" alt="Creative Marketing Agency" class="w-full h-40 object-cover">
                            </div>
                            <div class="mt-4">
                                <p class="text-xs text-gray-500 mb-1">Design by <span class="text-purple-600">HR Team</span></p>
                                <h4 class="text-lg font-semibold text-gray-900 mb-2">Programming and software development</h4>

                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex">
                                        <span class="text-purple-500 font-bold text-sm mr-1">4.9/5</span>
                                        <div class="flex mr-3">
                                            <svg class="w-3 h-3 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.644 5.068a1 1 0 00.95.691h5.334c.954 0 1.341 1.25.574 1.838l-4.303 3.125a1 1 0 00-.364 1.118l1.644 5.068c.3.921-.755 1.688-1.539 1.118l-4.303-3.125a1 1 0 00-1.176 0l-4.303 3.125c-.784.57-1.839-.197-1.539-1.118l1.644-5.068a1 1 0 00-.364-1.118L.557 10.524c-.767-.588-.38-1.838.574-1.838h5.334a1 1 0 00.95-.691l1.644-5.068z"></path></svg>
                                            <svg class="w-3 h-3 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.644 5.068a1 1 0 00.95.691h5.334c.954 0 1.341 1.25.574 1.838l-4.303 3.125a1 1 0 00-.364 1.118l1.644 5.068c.3.921-.755 1.688-1.539 1.118l-4.303-3.125a1 1 0 00-1.176 0l-4.303 3.125c-.784.57-1.839-.197-1.539-1.118l1.644-5.068a1 1 0 00-.364-1.118L.557 10.524c-.767-.588-.38-1.838.574-1.838h5.334a1 1 0 00.95-.691l1.644-5.068z"></path></svg>
                                            <svg class="w-3 h-3 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.644 5.068a1 1 0 00.95.691h5.334c.954 0 1.341 1.25.574 1.838l-4.303 3.125a1 1 0 00-.364 1.118l1.644 5.068c.3.921-.755 1.688-1.539 1.118l-4.303-3.125a1 1 0 00-1.176 0l-4.303 3.125c-.784.57-1.839-.197-1.539-1.118l1.644-5.068a1 1 0 00-.364-1.118L.557 10.524c-.767-.588-.38-1.838.574-1.838h5.334a1 1 0 00.95-.691l1.644-5.068z"></path></svg>
                                            <svg class="w-3 h-3 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.644 5.068a1 1 0 00.95.691h5.334c.954 0 1.341 1.25.574 1.838l-4.303 3.125a1 1 0 00-.364 1.118l1.644 5.068c.3.921-.755 1.688-1.539 1.118l-4.303-3.125a1 1 0 00-1.176 0l-4.303 3.125c-.784.57-1.839-.197-1.539-1.118l1.644-5.068a1 1 0 00-.364-1.118L.557 10.524c-.767-.588-.38-1.838.574-1.838h5.334a1 1 0 00.95-.691l1.644-5.068z"></path></svg>
                                            <svg class="w-3 h-3 text-gray-300" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.644 5.068a1 1 0 00.95.691h5.334c.954 0 1.341 1.25.574 1.838l-4.303 3.125a1 1 0 00-.364 1.118l1.644 5.068c.3.921-.755 1.688-1.539 1.118l-4.303-3.125a1 1 0 00-1.176 0l-4.303 3.125c-.784.57-1.839-.197-1.539-1.118l1.644-5.068a1 1 0 00-.364-1.118L.557 10.524c-.767-.588-.38-1.838.574-1.838h5.334a1 1 0 00.95-.691l1.644-5.068z"></path></svg>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="text-gray-500 text-sm text-purple-500">(100+ Enrol)</span>
                                    </div>
                                </div>

                                <button class=" bg-purple-600 text-white p-2 hover:bg-purple-700 transition-colors duration-200">Apply Request</button>
                            </div>
                        </div>


                        <div class="bg-white shadow-md overflow-hidden p-3 h-100">
                            <div class="relative">
                                <img src="https://placehold.co/400x200" alt="Creative Marketing Agency" class="w-full h-40 object-cover">
                            </div>
                            <div class="mt-4">
                                <p class="text-xs text-gray-500 mb-1">Design by <span class="text-purple-600">HR Team</span></p>
                                <h4 class="text-lg font-semibold text-gray-900 mb-2">Programming and software development</h4>

                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex">
                                        <span class="text-purple-500 font-bold text-sm mr-1">4.9/5</span>
                                        <div class="flex mr-3">
                                            <svg class="w-3 h-3 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.644 5.068a1 1 0 00.95.691h5.334c.954 0 1.341 1.25.574 1.838l-4.303 3.125a1 1 0 00-.364 1.118l1.644 5.068c.3.921-.755 1.688-1.539 1.118l-4.303-3.125a1 1 0 00-1.176 0l-4.303 3.125c-.784.57-1.839-.197-1.539-1.118l1.644-5.068a1 1 0 00-.364-1.118L.557 10.524c-.767-.588-.38-1.838.574-1.838h5.334a1 1 0 00.95-.691l1.644-5.068z"></path></svg>
                                            <svg class="w-3 h-3 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.644 5.068a1 1 0 00.95.691h5.334c.954 0 1.341 1.25.574 1.838l-4.303 3.125a1 1 0 00-.364 1.118l1.644 5.068c.3.921-.755 1.688-1.539 1.118l-4.303-3.125a1 1 0 00-1.176 0l-4.303 3.125c-.784.57-1.839-.197-1.539-1.118l1.644-5.068a1 1 0 00-.364-1.118L.557 10.524c-.767-.588-.38-1.838.574-1.838h5.334a1 1 0 00.95-.691l1.644-5.068z"></path></svg>
                                            <svg class="w-3 h-3 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.644 5.068a1 1 0 00.95.691h5.334c.954 0 1.341 1.25.574 1.838l-4.303 3.125a1 1 0 00-.364 1.118l1.644 5.068c.3.921-.755 1.688-1.539 1.118l-4.303-3.125a1 1 0 00-1.176 0l-4.303 3.125c-.784.57-1.839-.197-1.539-1.118l1.644-5.068a1 1 0 00-.364-1.118L.557 10.524c-.767-.588-.38-1.838.574-1.838h5.334a1 1 0 00.95-.691l1.644-5.068z"></path></svg>
                                            <svg class="w-3 h-3 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.644 5.068a1 1 0 00.95.691h5.334c.954 0 1.341 1.25.574 1.838l-4.303 3.125a1 1 0 00-.364 1.118l1.644 5.068c.3.921-.755 1.688-1.539 1.118l-4.303-3.125a1 1 0 00-1.176 0l-4.303 3.125c-.784.57-1.839-.197-1.539-1.118l1.644-5.068a1 1 0 00-.364-1.118L.557 10.524c-.767-.588-.38-1.838.574-1.838h5.334a1 1 0 00.95-.691l1.644-5.068z"></path></svg>
                                            <svg class="w-3 h-3 text-gray-300" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.644 5.068a1 1 0 00.95.691h5.334c.954 0 1.341 1.25.574 1.838l-4.303 3.125a1 1 0 00-.364 1.118l1.644 5.068c.3.921-.755 1.688-1.539 1.118l-4.303-3.125a1 1 0 00-1.176 0l-4.303 3.125c-.784.57-1.839-.197-1.539-1.118l1.644-5.068a1 1 0 00-.364-1.118L.557 10.524c-.767-.588-.38-1.838.574-1.838h5.334a1 1 0 00.95-.691l1.644-5.068z"></path></svg>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="text-gray-500 text-sm text-purple-500">(100+ Enrol)</span>
                                    </div>
                                </div>

                                <button class=" bg-purple-600 text-white p-2 hover:bg-purple-700 transition-colors duration-200">Apply Request</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="py-16 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto bg-purple-900 rounded-xl p-8 md:p-12 text-center">
                <h2 class="text-2xl sm:text-3xl font-bold text-white mb-4">Are You Part of One of These Sectors?</h2>
                <p class="text-base sm:text-lg text-white text-opacity-80 mb-8">We are ready to deliver tailored solutions that fit your needs.</p>
                <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                    <button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-8 transition duration-300 ease-in-out">
                        @lang('Submit Request')
                    </button>
                    <button class="bg-transparent border-1 border-white text-white font-semibold py-3 px-8 transition duration-300 ease-in-out hover:bg-white hover:text-purple-900">
                        @lang('Contact Us')
                    </button>
                </div>
            </div>
        </section>

        @if (@$sections->secs != null)
            @foreach (json_decode($sections->secs) as $sec)
                @include("sections." . $sec)
            @endforeach
        @endif
@endsection
