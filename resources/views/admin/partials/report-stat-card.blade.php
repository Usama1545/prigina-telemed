<div class="card h-100">
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <p class="text-muted small mb-1">{{ $title }}</p>
                <h4 class="fw-bold mb-0">{{ $value }}</h4>
                @isset($sub)
                    <span class="text-muted small">{{ $sub }}</span>
                @endisset
            </div>
            <div class="rounded-circle d-flex align-items-center justify-content-center bg-{{ $color ?? 'primary' }} bg-opacity-10"
                style="width:52px;height:52px;flex-shrink:0;">
                <i class="fe {{ $icon ?? 'fe-bar-chart-2' }} text-{{ $color ?? 'primary' }}"
                    style="font-size:1.4rem;"></i>
            </div>
        </div>
    </div>
</div>
