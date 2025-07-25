<?php $__env->startSection('panel'); ?>
<?php if($pdata->is_default == Status::NO): ?>
<div class="mb-4 row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="<?php echo e(route('admin.frontend.manage.pages.update')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" value="<?php echo e($pdata->id); ?>">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3 form-group">
                                <label class="form-label"><?php echo app('translator')->get('Page Name'); ?></label>
                                <input type="text" class="form-control" name="name" value="<?php echo e($pdata->name); ?>"
                                required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 form-group">
                                <label class="form-label"><?php echo app('translator')->get('Page Slug'); ?></label>
                                <input type="text" class="form-control" name="slug" value="<?php echo e($pdata->slug); ?>"
                                required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 form-group">
                                <label class="form-label">&nbsp;</label>
                                <button type="submit" class="btn btn-primary w-100"><?php echo app('translator')->get('Submit'); ?></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>



<div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"><?php echo e(__($pdata->name)); ?> <?php echo app('translator')->get('Page'); ?></h5>
            </div>

            <div class="card-body">
                <form action="<?php echo e(route('admin.frontend.manage.section.update',$pdata->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <ol class="simple_with_drop vertical sec-item">
                        <?php if($pdata->secs != null): ?>
                        <?php $__currentLoopData = json_decode($pdata->secs); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="highlight icon-move item">
                            <i class=" fa fa-arrows-alt"></i>
                            <span class="text-white d-inline-block me-auto ms-2"> <?php echo e(__(@$sections[$sec]['name'])); ?></span>
                            <i class="ms-auto d-inline-block remove-icon fa fa-times"></i>
                            <input type="hidden" name="secs[]" value="<?php echo e($sec); ?>">
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </ol>
                    <button type="submit" class="btn btn-primary w-100 h-45"><?php echo app('translator')->get('Update Now'); ?></button>
                </form>

            </div>
        </div>



    </div>
    <div class="mt-3 col-md-5 mt-md-0">

        <div class="card">
            <div class="card-header">
                <h5 class="card-title"><?php echo app('translator')->get('Sections'); ?></h5>
                <small class="text--primary"><?php echo app('translator')->get('Drag the section to the left side you want to show on the page.'); ?></small>
            </div>
            <div class="card-body">
                <ol class="p-0 simple_with_no_drop vertical">
                    <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $secs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!@$secs['no_selection']): ?>
                    <li class="clearfix highlight icon-move">
                            <i class="mt-2 fa fa-arrows-alt"></i>
                            <span class="text-white d-inline-block me-auto ms-2"> <?php echo e(__($secs['name'])); ?></span>
                            <i class="ms-auto d-inline-block remove-icon fa fa-times"></i>
                            <input type="hidden" name="secs[]" value="<?php echo e($k); ?>">
                            <?php if($secs['builder']): ?>
                                <div class="float-end d-inline-block manage-content">
                                    <a href="<?php echo e(route('admin.frontend.sections',$k)); ?>" target="_blank" class="text-center text-white btn btn-outline-light cog-btn btn-sm" title="<?php echo app('translator')->get('Manage Content'); ?>">
                                        <i class="p-0 m-0 fa fa-cog"></i>
                                    </a>
                                </div>
                            <?php endif; ?>
                    </li>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ol>
            </div>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-lib'); ?>
<script src="<?php echo e(asset('assets/admin/js/jquery-sortable.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
<script>
    (function($) {
        "use strict";
        $("ol.simple_with_drop").sortable({
            group: 'no-drop',
            handle: '.icon-move',
            onDragStart: function ($item, container, _super) {
                    if(!container.options.drop){
                        $item.clone().insertAfter($item);
                    }
                    _super($item, container);
                }
            });
        $("ol.simple_with_no_drop").sortable({
            group: 'no-drop',
            drop: false
        });
        $("ol.simple_with_no_drag").sortable({
            group: 'no-drop',
            drag: false
        });

        $(document).on('click',".remove-icon",function(){
            $(this).parent('.highlight').remove();
        });

    })(jQuery);
</script>
<?php $__env->stopPush(); ?>


<?php $__env->startPush('breadcrumb-plugins'); ?>
    <?php if (isset($component)) { $__componentOriginal3b9bf6c313f6db4d5c9389e5666c89a5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b9bf6c313f6db4d5c9389e5666c89a5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.back','data' => ['route' => ''.e(route('admin.frontend.manage.pages')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('back'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['route' => ''.e(route('admin.frontend.manage.pages')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3b9bf6c313f6db4d5c9389e5666c89a5)): ?>
<?php $attributes = $__attributesOriginal3b9bf6c313f6db4d5c9389e5666c89a5; ?>
<?php unset($__attributesOriginal3b9bf6c313f6db4d5c9389e5666c89a5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3b9bf6c313f6db4d5c9389e5666c89a5)): ?>
<?php $component = $__componentOriginal3b9bf6c313f6db4d5c9389e5666c89a5; ?>
<?php unset($__componentOriginal3b9bf6c313f6db4d5c9389e5666c89a5); ?>
<?php endif; ?>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('style'); ?>
<style>
    .span4 {
        width: 300px;
    }

    ol li.highlight {
        background: #000;
        color: #999999;
    }

    ol.vertical {
        margin: 0 0 9px 0;
        min-height: 10px;
        padding-left: 0;
    }
    li {
        line-height: 18px;
    }

    .icon-move {
        background-position: -168px -72px;
    }
    ol i.icon-move {
        cursor: pointer;
    }

    ol {
        display: block;
        list-style-type: decimal;
        margin-block-start: 1em;
        margin-block-end: 1em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
    }
    .vertical li i {
        color: #000000;
        padding-right: 15px;
    }

    .sec-item li i {
        color: #000000;
        padding-right: 15px;
    }

    .sec-item li i.fa-times{
        color: #ea5455;
        padding-right: 15px;
    }

    ol.vertical li {
        display: block;
        margin: 10px 0;
        padding: 10px;
        color: #e0e0e0;
        background: #7f7ff7;
        font-size: 16px;
        font-weight: 600;
    }


    ol.sec-item li {
        margin: 10px 0;
        padding: 10px;
        color: #fff;
        background: #2e49cc;
        font-size: 24px;
        font-weight: 600;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
    }
    .ol.sec-item li.d-none {
        display: none !important;}
        [class*="span"] {
            float: left;
            margin-left: 20px;
        }

        .row {
            *zoom: 1;
        }
        .row {
            position: relative;
        }
        .dragged {
            position: absolute;
            top: 0;
            opacity: 0.5;
            z-index: 2000;
            background: #333333;
            color: #999999;
        }

        ol.vertical li i.remove-icon{
            display: none !important;
        }

        ol.sec-item li i.remove-icon{
            display: block !important;
        }
        ol.sec-item li .manage-content{
            display: none !important;
        }
        ol.vertical li span {
            font-size: 18px;
        }
        .cog-btn i {
            color: #fff!important
        }
        .cog-btn:hover i {
            color: #000!important
        }

</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app',['title'=> 'Manage Section of '.$pdata->name], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\hrincu_2\resources\views/admin/frontend/builder/index.blade.php ENDPATH**/ ?>