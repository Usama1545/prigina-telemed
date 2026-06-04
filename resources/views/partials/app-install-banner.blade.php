<div id="appInstallBanner"
    class="d-flex align-items-center justify-content-between flex-wrap gap-2 px-3 py-2 rounded-3 mb-3"
    style="background:#eef4ff; border:1px solid #c7d9f8;">
    <div class="d-flex align-items-center gap-2">
        <i class="fa-solid fa-mobile-screen-button text-primary"></i>
        <span class="small fw-semibold text-dark">
            Stay connected — install the app so you never miss a call or notification.
        </span>
    </div>
    <div class="d-flex align-items-center gap-2 flex-shrink-0">
        <a href="#" class="btn btn-sm btn-dark d-flex align-items-center gap-1 px-3" id="playStoreBtn">
            <i class="fa-brands fa-google-play"></i>
            <span class="small">Google Play</span>
        </a>
        <a href="#" class="btn btn-sm btn-dark d-flex align-items-center gap-1 px-3" id="appStoreBtn">
            <i class="fa-brands fa-apple"></i>
            <span class="small">App Store</span>
        </a>
        <button class="btn btn-sm btn-link text-muted p-0 ms-1" id="dismissAppBanner" title="Dismiss">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>
</div>

<script>
    (function () {
        var banner = document.getElementById('appInstallBanner');
        if (!banner) return;
        if (localStorage.getItem('appBannerDismissed')) { banner.remove(); return; }
        document.getElementById('dismissAppBanner').addEventListener('click', function () {
            banner.remove();
            localStorage.setItem('appBannerDismissed', '1');
        });
    })();
</script>
