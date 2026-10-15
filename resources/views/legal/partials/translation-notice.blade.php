@if (app()->getLocale() !== 'en')
    <div class="alert alert-info mb-4" role="note">
        <i class="isax isax-info-circle me-1"></i>
        {{ __('app.legal.translation_notice') }}
    </div>
@endif
