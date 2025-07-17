@props([
    'inputName' => 'file'
])


@push('style')
<style>
    .file-upload-component {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        max-width: 100%;
        margin: 20px auto;
    }

    .upload-container {
        padding: 20px;
        border: 2px dashed #10b981;
        border-radius: 8px;
        background-color: #ecfdf5;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        min-height: 150px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .upload-container.has-image {
        background-color: #f8fafc;
        border-color: #cbd5e1;
    }

    .upload-container:hover {
        background-color: #d1fae5;
        border-color: #059669;
    }

    .upload-container.drag-over {
        background-color: #d1fae5;
        border-color: #3b82f6;
    }

    .upload-icon {
        width: 48px;
        height: 48px;
        margin-bottom: 12px;
        color: #10b981;
    }

    .upload-title {
        font-size: 18px;
        font-weight: 600;
        color: #065f46;
        margin-bottom: 8px;
    }

    .upload-subtitle {
        font-size: 14px;
        color: #6b7280;
        margin-bottom: 12px;
    }

    .file-name {
        font-size: 13px;
        color: #374151;
        margin-top: 10px;
        padding: 6px 12px;
        background: #f3f4f6;
        border-radius: 4px;
        max-width: 100%;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .file-error {
        color: #ef4444;
        font-size: 13px;
        margin-top: 8px;
        display: none;
    }

    .file-input {
        display: none;
    }

    .image-preview {
        max-width: 100%;
        max-height: 200px;
        border-radius: 4px;
        margin-bottom: 10px;
        display: none;
    }

    .remove-image {
        position: absolute;
        top: 10px;
        right: 10px;
        background: #ef4444;
        color: white;
        border: none;
        border-radius: 50%;
        width: 24px;
        height: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        display: none;
    }

    .upload-container:hover:not(.has-image) {
        animation: pulse 1.5s infinite;
    }

    .file-doc-icon {
        width: 48px;
        height: 48px;
        margin-bottom: 12px;
        color: #10b981;
        display: none;
    }
</style>
@endpush

<div class="file-upload-component">
    <div class="upload-container">
        <button type="button" class="remove-image" title="Remove file">
            <!-- Close Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>

        <img src="" class="image-preview" alt="Image preview">

        <!-- DOC Icon -->
        <svg class="file-doc-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M7 7h10M7 11h10M7 15h7m3 6H7a2 2 0 01-2-2V5a2 2 0 012-2h8l5 5v12a2 2 0 01-2 2z" />
        </svg>

        <svg class="upload-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
        </svg>

        <div class="upload-title">@lang('Upload File')</div>
        <div class="upload-subtitle">@lang('Drag & drop or click to browse (any file type up to 2MB)')</div>
        <div class="file-name"></div>

        <input type="file" class="file-input" accept="*" name="{{ $inputName }}">
    </div>
    <div class="file-error"></div>
</div>

@push('script')
<script>
$(document).ready(function() {
    function initFileUpload($component) {
        const $container = $component.find('.upload-container');
        const $fileInput = $component.find('.file-input');
        const $fileName = $component.find('.file-name');
        const $errorMsg = $component.find('.file-error');
        const $imagePreview = $component.find('.image-preview');
        const $removeBtn = $component.find('.remove-image');
        const $uploadIcon = $component.find('.upload-icon');
        const $docIcon = $component.find('.file-doc-icon');
        const $uploadTitle = $component.find('.upload-title');
        const $uploadSubtitle = $component.find('.upload-subtitle');

        // Prevent the container click from triggering when clicking the file input
        $fileInput.on('click', function(e) {
            e.stopPropagation();
        });

        $container.on('click', function(e) {
            // Only trigger if not clicking the remove button or file input
            if (!$(e.target).closest('.remove-image').length &&
                !$(e.target).is('input[type="file"]')) {
                $fileInput.trigger('click');
            }
        });

        $fileInput.on('change', function() {
            const file = $fileInput[0].files[0];
            if (file) handleFile(file);
        });

        $removeBtn.on('click', function(e) {
            e.stopPropagation();
            clearFile();
        });

        $container.on('dragover', function(e) {
            e.preventDefault();
            $container.addClass('drag-over');
        });

        $container.on('dragleave', function() {
            $container.removeClass('drag-over');
        });

        $container.on('drop', function(e) {
            e.preventDefault();
            $container.removeClass('drag-over');

            const droppedFiles = e.originalEvent.dataTransfer.files;
            if (droppedFiles.length) {
                $fileInput.prop('files', droppedFiles);
                handleFile(droppedFiles[0]);
            }
        });

        function handleFile(file) {
            resetError();

            if (file.size > 2 * 1024 * 1024) {
                showError('File too large. Max 2MB.');
                return;
            }

            $fileName.text(file.name);
            const fileType = file.type;

            if (fileType.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $imagePreview.attr('src', e.target.result).show();
                    $docIcon.hide();
                    toggleUI(true);
                };
                reader.readAsDataURL(file);
            } else {
                $imagePreview.hide();
                $docIcon.show();
                toggleUI(true);
            }
        }

        function clearFile() {
            $fileInput.val('');
            $fileName.text('');
            $imagePreview.hide().attr('src', '');
            $docIcon.hide();
            toggleUI(false);
            resetError();
        }

        function toggleUI(hasFile) {
            if (hasFile) {
                $uploadIcon.hide();
                $uploadTitle.hide();
                $uploadSubtitle.hide();
                $removeBtn.show();
                $container.addClass('has-image');
            } else {
                $uploadIcon.show();
                $uploadTitle.show();
                $uploadSubtitle.show();
                $removeBtn.hide();
                $container.removeClass('has-image');
            }
        }

        function showError(message) {
            $errorMsg.text(message).show();
            $fileInput.val('');
            $fileName.text('');
            $container.addClass('error-state');
        }

        function resetError() {
            $errorMsg.hide().text('');
            $container.removeClass('error-state');
        }

        return {
            clear: clearFile,
            getFile: function() {
                return $fileInput[0].files[0];
            }
        };
    }

    $('.file-upload-component').each(function() {
        initFileUpload($(this));
    });
});
</script>
@endpush
