<?php $__env->startSection("content"); ?>
        <?php if (isset($component)) { $__componentOriginale19f62b34dfe0bfdf95075badcb45bc2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale19f62b34dfe0bfdf95075badcb45bc2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.breadcrumb','data' => ['title' => 'Community Engagement']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('breadcrumb'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Community Engagement']); ?>
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


        <?php
        $heroBanner = getHeroBanner('community-engagement');
        
        ?>
        
        <?php if (isset($component)) { $__componentOriginalcc976e4d6da565a9a99c34acb03c2bd5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcc976e4d6da565a9a99c34acb03c2bd5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.hero-banner','data' => ['subtitle' => $heroBanner?->subtitle,'title' => $heroBanner?->title,'description' => $heroBanner?->description,'image' => $heroBanner?->image]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('hero-banner'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['subtitle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($heroBanner?->subtitle),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($heroBanner?->title),'description' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($heroBanner?->description),'image' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($heroBanner?->image)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcc976e4d6da565a9a99c34acb03c2bd5)): ?>
<?php $attributes = $__attributesOriginalcc976e4d6da565a9a99c34acb03c2bd5; ?>
<?php unset($__attributesOriginalcc976e4d6da565a9a99c34acb03c2bd5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcc976e4d6da565a9a99c34acb03c2bd5)): ?>
<?php $component = $__componentOriginalcc976e4d6da565a9a99c34acb03c2bd5; ?>
<?php unset($__componentOriginalcc976e4d6da565a9a99c34acb03c2bd5); ?>
<?php endif; ?>



        <section class="py-16 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto">
                <h2 class="text-3xl font-extrabold text-gray-900 mb-3">Our Objectives</h2>
                <hr class="border-t-1 border-gray-500 mb-4">

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-6">

                <div class="bg-gray-200 border border-gray-200 rounded-lg p-6 text-gray-800 shadow-sm hover:shadow-md transition-shadow duration-300">
                    <p class="text-sm">Empower communities and target groups through comprehensive training and qualification programs.</p>
                </div>

                <div class="bg-gray-200 border border-gray-200 rounded-lg p-6 text-gray-800 shadow-sm hover:shadow-md transition-shadow duration-300">
                    <p class="text-sm">Support nationalization (Saudization) initiatives and improve employment opportunities</p>
                </div>

                <div class="bg-gray-200 border border-gray-200 rounded-lg p-6 text-gray-800 shadow-sm hover:shadow-md transition-shadow duration-300">
                    <p class="text-sm">Offer tailored services for expatriate workers to support cultural integration.</p>
                </div>

                <div class="bg-gray-200 border border-gray-200 rounded-lg p-6 text-gray-800 shadow-sm hover:shadow-md transition-shadow duration-300">
                    <p class="text-sm">Raise awareness of rights and responsibilities in the workplace and promote a positive work environment.</p>
                </div>

                <div class="bg-gray-200 border border-gray-200 rounded-lg p-6 text-gray-800 shadow-sm hover:shadow-md transition-shadow duration-300">
                    <p class="text-sm">Build an effective collaboration ecosystem across sectors to deliver innovative development solutions.</p>
                </div>

                </div>
            </div>
        </section>


        <section class="py-16 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto flex flex-col lg:flex-row gap-8 items-center lg:items-start">

                <div class="w-full lg:w-1/2 flex justify-center lg:justify-start">
                    <div class="bg-gray-200 rounded-xl overflow-hidden h-98 lg:h-full w-full max-w-lg lg:max-w-none mt-2">
                        <img src="https://placehold.co/600x400" alt="Partnership Buildings" class="w-full h-full object-cover">
                    </div>
                </div>

                <div class="w-full lg:w-1/2">
                    <h2 class="text-3xl font-extrabold text-gray-900 mb-3">Partnership Areas</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-2 flex flex-col justify-between">
                            <h3 class="font-semibold  text-slate-800 mb-1">Universities and Educational Institutions</h3>
                            <p class="text-sm text-slate-800">Joint training programs to prepare students for the job market.</p>
                        </div>

                        <div class="bg-purple-50 border border-purple-200 rounded-lg p-2 flex flex-col justify-between">
                            <h3 class="font-semibold  text-slate-800 mb-1">Embassies and Diplomatic Missions</h3>
                            <p class="text-sm text-slate-800">Organizing cultural and guidance events for expatriate communities.</p>
                        </div>

                        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-2 flex flex-col justify-between">
                            <h3 class="font-semibold  text-slate-800 mb-1">Government Ministries and Authorities</h3>
                            <p class="text-sm text-slate-800">Launching employment and capacity-building initiatives aligned with national development projects.</p>
                        </div>

                        <div class="bg-green-50 border border-green-200 rounded-lg p-2 flex flex-col justify-between">
                            <h3 class="font-semibold text-slate-800 mb-2">NGOs and Community Initiatives</h3>
                            <p class="text-sm text-slate-800">Special empowerment programs for women, youth, and persons with disabilities.</p>
                        </div>

                        <div class="bg-red-50 border border-red-200 rounded-lg p-2 flex flex-col justify-between">
                            <h3 class="font-semibold  text-slate-800 mb-1">Private Sector</h3>
                            <p class="text-sm text-slate-800">Providing on-the-job training, employment opportunities, and organizational development.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>



         <section class="py-16 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto flex flex-col lg:flex-row gap-8 items-center lg:items-start">

                <div class="w-full lg:w-1/2">
                    <h2 class="text-3xl font-extrabold text-gray-900 mb-3">Key Initiatives</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-2 flex flex-col justify-between">
                            <h3 class="font-semibold  text-slate-800 mb-1">Universities and Educational Institutions</h3>
                            <p class="text-sm text-slate-800">Joint training programs to prepare students for the job market.</p>
                        </div>

                        <div class="bg-purple-50 border border-purple-200 rounded-lg p-2 flex flex-col justify-between">
                            <h3 class="font-semibold  text-slate-800 mb-1">Embassies and Diplomatic Missions</h3>
                            <p class="text-sm text-slate-800">Organizing cultural and guidance events for expatriate communities.</p>
                        </div>

                        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-2 flex flex-col justify-between">
                            <h3 class="font-semibold  text-slate-800 mb-1">Government Ministries and Authorities</h3>
                            <p class="text-sm text-slate-800">Launching employment and capacity-building initiatives aligned with national development projects.</p>
                        </div>

                        <div class="bg-green-50 border border-green-200 rounded-lg p-2 flex flex-col justify-between">
                            <h3 class="font-semibold text-slate-800 mb-2">NGOs and Community Initiatives</h3>
                            <p class="text-sm text-slate-800">Special empowerment programs for women, youth, and persons with disabilities.</p>
                        </div>

                        <div class="bg-red-50 border border-red-200 rounded-lg p-2 flex flex-col justify-between">
                            <h3 class="font-semibold  text-slate-800 mb-1">Private Sector</h3>
                            <p class="text-sm text-slate-800">Providing on-the-job training, employment opportunities, and organizational development.</p>
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-1/2 flex justify-center lg:justify-start">
                    <div class="bg-gray-200 rounded-xl overflow-hidden h-98 lg:h-full w-full max-w-lg lg:max-w-none mt-2">
                        <img src="https://placehold.co/600x400" alt="Partnership Buildings" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
        </section>


        <?php
        $callToAction = getHeroBanner('community-engagement', 'call_to_action');
        ?>

        <?php if (isset($component)) { $__componentOriginal2c9369c50378c35954451f9e19572a01 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2c9369c50378c35954451f9e19572a01 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.call-to-action','data' => ['title' => $callToAction?->title,'description' => $callToAction?->description,'linkButton' => ''.e(route('community.partnership.request')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('call-to-action'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($callToAction?->title),'description' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($callToAction?->description),'link_button' => ''.e(route('community.partnership.request')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2c9369c50378c35954451f9e19572a01)): ?>
<?php $attributes = $__attributesOriginal2c9369c50378c35954451f9e19572a01; ?>
<?php unset($__attributesOriginal2c9369c50378c35954451f9e19572a01); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2c9369c50378c35954451f9e19572a01)): ?>
<?php $component = $__componentOriginal2c9369c50378c35954451f9e19572a01; ?>
<?php unset($__componentOriginal2c9369c50378c35954451f9e19572a01); ?>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("web.layouts.frontend", ["title" => gs("site_name")], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projects\hrincu_v2\resources\views/web/community_engagement.blade.php ENDPATH**/ ?>