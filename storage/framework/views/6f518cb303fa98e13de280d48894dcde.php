<?php $__env->startSection('content'); ?>

<?php if (isset($component)) { $__componentOriginale19f62b34dfe0bfdf95075badcb45bc2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale19f62b34dfe0bfdf95075badcb45bc2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.breadcrumb','data' => ['title' => 'About Us']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('breadcrumb'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'About Us']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale19f62b34dfe0bfdf95075badcb45bc2)): ?>
<?php $attributes = $__attributesOriginale19f62b34dfe0bfdf95075badcb45bc2; ?>
<?php unset($__attributesOriginale19f62b34dfe0bfdf95075badcb45bc2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale19f62b34dfe0bfdf95075badcb45bc2)): ?>
<?php $component = $__componentOriginale19f62b34dfe0bfdf95075badcb45bc2; ?>
<?php unset($__componentOriginale19f62b34dfe0bfdf95075badcb45bc2); ?>
<?php endif; ?>

<section class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row gap-4">
            <div class="md:w-1/2 flex flex-col justify-center p-6">
                <h3 class="text-3xl font-bold mb-4">Human Resources Incubator</h3>
                <p class="text-gray-700">
                    A comprehensive platform specialized in providing professional solutions in recruitment, employment, and training, in addition to smart outsourcing services and contact center management. We combine modern technology with local and international institutional partnerships to serve as a unified gateway for empowering individuals and organizations, enhancing human resource efficiency across sectors, and supporting Saudization, sustainable development, and Vision 2030.
                </p>
            </div>

            <div class="md:w-1/2 flex items-center justify-center p-6">
                <img src="<?php echo e(asset('img/about_img.png')); ?>" alt="" class="max-w-full h-auto">
            </div>
        </div>
    </div>
</section>


<section class="py-12 bg-gray-50">
    <div class="max-w-4xl mx-auto">
        <div class="flex flex-col md:flex-row gap-4">
            <div class="
                bg-white rounded-2xl shadow-md p-10 text-center flex flex-col items-center justify-between
                transition-all duration-300 ease-in-out hover:-translate-y-1 hover:shadow-lg
                flex-1 min-w-[250px]
            ">
                <img src="https://placehold.co/60" alt="Our Vision Icon" class="w-16 h-16">

                <h3 class="text-2xl bg-purple-900 text-white font-semibold py-2 px-2 mt-6 mb-3">
                    Our Vision
                </h3>

                <div class="flex">
                    <div class="relative pb-4 line-before"></div>
                    <div class="relative pb-4 dot"></div>
                    <div class="relative pb-4 line-after"></div>
                </div>

                <p class="text-gray-600 leading-relaxed max-w-sm pt-2">
                    To be the leading national platform for human resources services and the trusted destination for empowering talent and enabling synergy across sectors.
                </p>
            </div>

            <div class="
                bg-white rounded-2xl shadow-md p-10 text-center flex flex-col items-center justify-between
                transition-all duration-300 ease-in-out hover:-translate-y-1 hover:shadow-lg
                flex-1 min-w-[250px]
            ">
                <img src="https://placehold.co/60" alt="Our Vision Icon" class="w-16 h-16">

                <h3 class="text-2xl bg-purple-900 text-white font-semibold py-2 px-2 mt-6 mb-3">
                    Our Vision
                </h3>

                <div class="flex">
                    <div class="relative pb-4 line-before"></div>
                    <div class="relative pb-4 dot"></div>
                    <div class="relative pb-4 line-after"></div>
                </div>

                <p class="text-gray-600 leading-relaxed max-w-sm pt-2">
                    To be the leading national platform for human resources services and the trusted destination for empowering talent and enabling synergy across sectors.
                </p>
            </div>
        </div>
    </div>
</section>



<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4 py-8">
        <div class="text-center mb-8">
            <div class="mb-8 m-auto text-center">
                <svg class="mx-auto" width="64" height="64" viewBox="0 0 100 100">
                    <g stroke="currentColor" stroke-width="5" fill="none">
                        <ellipse rx="40" ry="16" cx="50" cy="50" />
                        <ellipse rx="40" ry="16" cx="50" cy="50" transform="rotate(60 50 50)" />
                        <ellipse rx="40" ry="16" cx="50" cy="50" transform="rotate(120 50 50)" />
                    </g>
                    <circle cx="50" cy="50" r="8" fill="currentColor" />
                </svg>
            </div>

            <h2 class="text-xl font-semibold text-white bg-[#8a2be2] px-6 py-2  inline-block mt-6">Values</h2>
            <div class="flex-line-wrapper">
                <div class="line-2"></div>
                <div class="dot-2"></div>
                <div class="line-2"></div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-20">
            <div class="rounded-xl border-1  p-6 text-left flex flex-col justify-start min-h-[150px]">
                <h4 class="font-bold text-lg text-gray-800 mb-2">Empowerment</h4>
                <p class="text-gray-600 text-sm leading-relaxed">
                    We believe in the power of people to drive change
                </p>
            </div>

            <div class="rounded-xl border-1 p-6 text-left flex flex-col justify-start min-h-[150px]">
                <h4 class="font-bold text-lg text-gray-800 mb-2">Quality</h4>
                <p class="text-gray-600 text-sm leading-relaxed">
                    We are committed to the highest standards of performance and results.
                </p>
            </div>

            <div class="rounded-xl border-1 p-6 text-left flex flex-col justify-start min-h-[150px]">
                <h4 class="font-bold text-lg text-gray-800 mb-2">Innovation</h4>
                <p class="text-gray-600 text-sm leading-relaxed">
                    We develop flexible solutions that respond to market needs.
                </p>
            </div>

            <div class="rounded-xl border-1 p-6 text-left flex flex-col justify-start min-h-[150px]">
                <h4 class="font-bold text-lg text-gray-800 mb-2">Integration</h4>
                <p class="text-gray-600 text-sm leading-relaxed">
                    We build bridges of collaboration across sectors.
                </p>
            </div>

            <div class="rounded-xl border-1 p-6 text-left flex flex-col justify-start min-h-[150px]">
                <h4 class="font-bold text-lg text-gray-800 mb-2">Commitment</h4>
                <p class="text-gray-600 text-sm leading-relaxed">
                    We place partner and client satisfaction at the core of our work.
                </p>
            </div>
        </div>

        <div class="flex flex-col md:flex-row gap-12 items-center">
            <div class="w-full md:w-1/2">
                <img src="https://placehold.co/600x400" alt="Modern Buildings" class="rounded-xl w-full h-auto object-cover">
            </div>

            <div class="w-full md:w-1/2">
                <h2 class="text-3xl font-bold text-gray-800 mb-6">Who We Serve</h2>
                <p class="text-gray-700 mb-6 leading-relaxed">
                    The Human Resources Incubator serves a broad range of stakeholders, including
                </p>
                <ul class="space-y-4 text-gray-700">
                    <li class="flex items-start checked-bullet">
                        Individuals seeking job, training, or development opportunities
                    </li>
                    <li class="flex items-start checked-bullet">
                        Organizations looking to recruit talents, improve work environments, or enhance performance
                    </li>
                    <li class="flex items-start checked-bullet">
                        Government entities and non-profit sectors in need of professional HR, outsourcing, or operational solutions
                    </li>
                </ul>
                <p class="text-gray-700 mt-6 leading-relaxed">
                    We facilitate access to services through a unified platform with a modern, user-friendly interface and customized solutions tailored to each client's needs
                </p>
            </div>
        </div>
    </div>
</section>


<section>
    <div class="bg-gray-100 py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12">
        <div>
            <h2 class="text-2xl font-bold text-gray-900 mb-8">Targeted Sectors</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-4 gap-x-8">
            <div class="flex items-center">
                <svg class="h-4 w-4 text-blue-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span class="text-sm text-gray-700 font-bold">Commercial and service sectors</span>
            </div>
            <div class="flex items-center">
                <svg class="h-4 w-4 text-blue-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span class="text-sm text-gray-700 font-bold">Healthcare sector</span>
            </div>
            <div class="flex items-center">
                <svg class="h-4 w-4 text-blue-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span class="text-sm text-gray-700 font-bold">Industrial and mining sectors</span>
            </div>
            <div class="flex items-center">
                <svg class="h-4 w-4 text-blue-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span class="text-sm text-gray-700 font-bold">Transport and logistics sector</span>
            </div>
            <div class="flex items-center">
                <svg class="h-4 w-4 text-blue-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span class="text-sm text-gray-700 font-bold">Agricultural and food sectors</span>
            </div>
            <div class="flex items-center">
                <svg class="h-4 w-4 text-blue-500 mr-3 rounded-circle" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span class="text-sm text-gray-700 font-bold">Higher education sector</span>
            </div>
            <div class="flex items-center">
                <svg class="h-4 w-4 text-blue-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span class="text-sm text-gray-700 font-bold">Hospitality, tourism, and hotel sectors</span>
            </div>
            <div class="flex items-center">
                <svg class="h-4 w-4 text-blue-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span class="text-sm text-gray-700 font-bold">Communication and contact center sectors</span>
            </div>
            <div class="flex items-center">
                <svg class="h-4 w-4 text-blue-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span class="text-sm text-gray-700 font-bold">Restaurant and cafe sectors</span>
            </div>
            <div class="flex items-center">
                <svg class="h-4 w-4 text-blue-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span class="text-sm text-gray-700 font-bold">Environmental and support service sectors</span>
            </div>
            <div class="flex items-center">
                <svg class="h-4 w-4 text-blue-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span class="text-sm text-gray-700 font-bold">Construction and building sectors</span>
            </div>
            </div>
        </div>

        <div>
            <h2 class="text-2xl font-bold text-gray-900 mb-8">Partnerships and Accreditations</h2>
            <p class="text-gray-700 mb-6">
            We operate through a trusted network of recruitment agencies, training institutes, tech providers, and governmental bodies to ensure services are delivered professionally and in line with approved standards. Our partnerships include
            </p>
            <div class="space-y-4">
                <div class="flex items-center">
                    <svg class="h-4 w-4 text-blue-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span class="text-sm text-gray-700 font-bold">International recruitment agencies</span>
                </div>
                <div class="flex items-center">
                    <svg class="h-4 w-4 text-blue-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span class="text-sm text-gray-700 font-bold">Medical screening and qualification centers</span>
                </div>
                <div class="flex items-center">
                    <svg class="h-4 w-4 text-blue-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span class="text-sm text-gray-700 font-bold">Professional testing centers</span>
                </div>
                <div class="flex items-center">
                    <svg class="h-4 w-4 text-blue-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span class="text-sm text-gray-700 font-bold">Technology providers (CRM, ERP systems)</span>
                </div>
                <div class="flex items-center">
                    <svg class="h-4 w-4 text-blue-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span class="text-sm text-gray-700 font-bold">Relevant governmental and municipal authorities</span>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('style'); ?>
<style>
    .line-before::before{
        content: '';
        position: absolute;
        top: 80%;
        bottom: 0;
        left: -145px;
        width: 130px;
        height: 2px;
        background-color: #CCCCCC;
    }

    .line-after::after{
        content: '';
        position: absolute;
        top: 80%;
        bottom: 0;
        left: 15px;
        width: 130px;
        height: 2px;
        background-color: #CCCCCC;
    }

    .dot::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 8px;
        height: 8px;
        background-color: #8a2be2;
        border-radius: 50%;
    }


   .flex-line-wrapper {
        display: flex;
        align-items: center;
        width: 100%;
        position: relative;
        padding: 20px 0;
    }

    .line-2 {
        flex: 1;
        height: 2px;
        background-color: #CCCCCC;
        position: relative;
    }

    .dot-2 {
        width: 16px;
        height: 16px;
        background-color: #8a2be2;
        border-radius: 50%;
        position: relative;
        z-index: 2;
    }
    .checked-bullet::before {
        content: url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="%238a2be2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"%3E%3Cpolyline points="20 6 9 17 4 12"%3E%3C/polyline%3E%3C/svg%3E'); /* Purple checkmark SVG */
        display: inline-block;
        width: 16px;
        height: 16px;
        margin-right: 8px;
        vertical-align: middle;
    }
</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('web.layouts.frontend', ['title' => 'About Us'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projects\hrincu_v2\resources\views/web/about.blade.php ENDPATH**/ ?>