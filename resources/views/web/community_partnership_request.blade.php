@extends("web.layouts.frontend", ["title" => gs("site_name")])

@section("content")
        <x-breadcrumb title="Community Partnership" />


        <section class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-50">
            <div class="max-w-3xl mx-auto p-6 md:p-8 lg:p-10">

                <p class="text-gray-700 text-sm md:text-base mb-8 font-bold leading-relaxed">
                    We welcome your interest in collaborating with Human Resources Incubator under our Community Partnership Program.
                    Please fill out the following form to evaluate potential cooperation and joint efforts.
                </p>

                <h2 class="bg-[#0D47A1] text-white text-lg md:text-xl font-semibold py-3 px-4 mb-6">
                Community Partnership Request form
                </h2>

                <form>
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">1. Organization Information</h3>

                    <div class="mb-4">
                    <label for="organizationName" class="block text-gray-700 text-sm font-medium mb-2">Organization Name</label>
                    <input type="text" id="organizationName" name="organizationName" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div class="mb-4">
                    <label for="organizationType" class="block text-gray-700 text-sm font-medium mb-2">Type of Organization (Government / Private / Non-profit / Other)</label>
                    <input type="text" id="organizationType" name="organizationType" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div class="mb-4">
                    <label for="representativeName" class="block text-gray-700 text-sm font-medium mb-2">Representative Name</label>
                    <input type="text" id="representativeName" name="representativeName" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div class="mb-4">
                    <label for="jobTitle" class="block text-gray-700 text-sm font-medium mb-2">Job Title</label>
                    <input type="text" id="jobTitle" name="jobTitle" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="emailNumber" class="block text-gray-700 text-sm font-medium mb-2">Email Number</label>
                        <input type="email" id="emailNumber" name="emailNumber" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label for="mobileNumber" class="block text-gray-700 text-sm font-medium mb-2">Mobile Number</label>
                        <input type="tel" id="mobileNumber" name="mobileNumber" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    </div>
                </div>

                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">2. Partnership Objectives</h3>
                    <p class="text-gray-600 text-sm mb-4">Please select the intended goals of the proposed collaboration</p>

                    <div class="space-y-2">
                    <div class="flex items-center">
                        <input type="checkbox" id="objective1" name="objectives" value="trainingQualification" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        <label for="objective1" class="ml-2 text-gray-700 text-sm">Training and qualification programs</label>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" id="objective2" name="objectives" value="laborAwarenessRights" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        <label for="objective2" class="ml-2 text-gray-700 text-sm">Labor awareness and workers' rights</label>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" id="objective3" name="objectives" value="nationalLocalCommunity" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        <label for="objective3" class="ml-2 text-gray-700 text-sm">National and local community events</label>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" id="objective4" name="objectives" value="saudizationJobOpportunity" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        <label for="objective4" class="ml-2 text-gray-700 text-sm">Saudization and job opportunity support</label>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" id="objective5" name="objectives" value="empoweringTargetedGroups" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        <label for="objective5" class="ml-2 text-gray-700 text-sm">Empowering targeted groups (women, youth, people with disabilities, etc.)</label>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" id="objective6" name="objectives" value="otherObjectives" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        <label for="objective6" class="ml-2 text-gray-700 text-sm">Other (please specify)</label>
                    </div>
                    </div>
                </div>

                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">3. Initiative or Project Details</h3>
                    <p class="text-gray-600 text-sm mb-4">Please provide a brief description of the proposed initiative or project</p>
                    <textarea id="projectDescription" name="projectDescription" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" placeholder="Write your description"></textarea>
                </div>

                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">4. Proposed Partnership Duration</h3>
                    <div class="space-y-2">
                    <div class="flex items-center">
                        <input type="radio" id="durationShort" name="partnershipDuration" value="short" class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500">
                        <label for="durationShort" class="ml-2 text-gray-700 text-sm">Short term (less than 3 months)</label>
                    </div>
                    <div class="flex items-center">
                        <input type="radio" id="durationMedium" name="partnershipDuration" value="medium" class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500">
                        <label for="durationMedium" class="ml-2 text-gray-700 text-sm">Medium term (3 to 6 months)</label>
                    </div>
                    <div class="flex items-center">
                        <input type="radio" id="durationLong" name="partnershipDuration" value="long" class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500">
                        <label for="durationLong" class="ml-2 text-gray-700 text-sm">Long term (more than 6 months)</label>
                    </div>
                    </div>
                </div>

                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">5. Additional notes</h3>
                    <textarea id="additionalNotes" name="additionalNotes" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" placeholder="Write your notes"></textarea>
                </div>

                <div>
                    <button type="submit" class="bg-[#0069CA] hover:bg-blue-700 text-white font-semibold py-3 px-6 transition duration-300 ease-in-out">
                        @lang('Submit Application')
                    </button>
                </div>
                </form>

            </div>
            </section>


        @if (@$sections->secs != null)
            @foreach (json_decode($sections->secs) as $sec)
                @include("sections." . $sec)
            @endforeach
        @endif
@endsection
