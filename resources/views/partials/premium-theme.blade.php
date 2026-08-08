{{--
    Shared "premium" design system: dark navy/aqua hero band, mono eyebrow
    labels, serif section titles, gradient buttons, and scroll-reveal
    animation. Pulled out of index.blade.php so other marketing pages
    (how-it-works, for-patients, for-doctors, about-us, ...) can match the
    homepage's look without duplicating the whole system on every page.

    Include once near the bottom of a page's @section('content'), same
    place index.blade.php keeps its own copy of this system.

    Fraunces / IBM Plex Mono fonts are already linked site-wide via
    partials.head-css, so no font-loading needed here.
--}}
<style>
    :root {
        --pg-ink: #0A1834;
        --pg-ink-2: #14285C;
        --pg-ink-3: #1B2F63;
        --pg-sky: #4F9DFF;
        --pg-aqua: #34D3C9;
        --pg-grad: linear-gradient(135deg, var(--pg-sky), var(--pg-aqua));
    }

    .section-title-serif {
        font-family: 'Fraunces', serif;
        letter-spacing: -0.01em;
    }

    /* ---------------- eyebrow labels ---------------- */
    .section-eyebrow {
        font-family: 'IBM Plex Mono', monospace;
        font-size: 12px;
        letter-spacing: 0.14em;
        text-transform: uppercase;
        font-weight: 600;
        color: var(--pg-sky);
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 10px;
    }

    .section-eyebrow::before {
        content: "";
        width: 16px;
        height: 1px;
        background: var(--pg-grad);
    }

    .section-eyebrow.center {
        justify-content: center;
    }

    .section-eyebrow-dark {
        color: #8fd8ff;
    }

    .section-eyebrow-dark::before {
        background: linear-gradient(135deg, #8fd8ff, #34D3C9);
    }

    /* ---------------- reusable full-bleed dark hero ---------------- */
    .pg-hero {
        position: relative;
        overflow: hidden;
        padding: 88px 0 64px;
        background:
            radial-gradient(60% 55% at 15% 20%, rgba(79, 157, 255, 0.35), transparent 60%),
            radial-gradient(50% 50% at 90% 10%, rgba(52, 211, 201, 0.28), transparent 60%),
            linear-gradient(160deg, var(--pg-ink) 0%, var(--pg-ink-3) 55%, var(--pg-ink-2) 100%);
    }

    .pg-hero::before {
        content: "";
        position: absolute;
        inset: 0;
        background-image:
            linear-gradient(rgba(255, 255, 255, 0.045) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255, 255, 255, 0.045) 1px, transparent 1px);
        background-size: 46px 46px;
        mask-image: radial-gradient(60% 60% at 30% 30%, black, transparent 75%);
        -webkit-mask-image: radial-gradient(60% 60% at 30% 30%, black, transparent 75%);
        pointer-events: none;
    }

    .pg-hero>.container,
    .pg-hero .row {
        position: relative;
        z-index: 1;
    }

    .pg-hero h1,
    .pg-hero h2,
    .pg-hero h3 {
        color: #fff !important;
        font-family: 'Fraunces', serif;
        letter-spacing: -0.01em;
    }

    .pg-hero .accent {
        background: var(--pg-grad);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent !important;
    }

    .pg-hero p {
        color: rgba(255, 255, 255, 0.72) !important;
    }

    .pg-hero .btn-primary {
        background: var(--pg-grad) !important;
        border: none !important;
        border-radius: 100px !important;
        color: #fff !important;
        box-shadow: 0 10px 24px -8px rgba(79, 157, 255, 0.5) !important;
    }

    .pg-hero .btn-primary:hover {
        box-shadow: 0 14px 30px -6px rgba(79, 157, 255, 0.65) !important;
    }

    .pg-hero .btn-outline-secondary,
    .pg-hero .btn-outline-primary,
    .pg-hero .btn-white {
        border-radius: 100px;
        background: rgba(255, 255, 255, 0.08);
        border-color: rgba(255, 255, 255, 0.22) !important;
        color: #fff !important;
    }

    .pg-hero .btn-outline-secondary:hover,
    .pg-hero .btn-outline-primary:hover,
    .pg-hero .btn-white:hover {
        background: rgba(255, 255, 255, 0.16);
        color: #fff !important;
    }

    @media (max-width: 767.98px) {
        .pg-hero {
            padding: 64px 0 40px;
        }
    }

    /* ---------------- wide-screen container ---------------- */
    @media (min-width: 992px) {
        .pg-hero>.container {
            width: 92%;
            max-width: 1560px;
        }
    }

    /* ---------------- scroll reveal ---------------- */
    .reveal {
        opacity: 0;
        transform: translateY(42px);
        transition: opacity 1s cubic-bezier(0.16, 1, 0.3, 1), transform 1s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .reveal.in {
        opacity: 1;
        transform: translateY(0);
    }

    @media (prefers-reduced-motion: reduce) {
        .reveal {
            opacity: 1 !important;
            transform: none !important;
        }
    }
</style>

<script>
    (function() {
        var groups = document.querySelectorAll('.reveal-group');
        groups.forEach(function(group) {
            var items = group.querySelectorAll(':scope > .reveal');
            items.forEach(function(el, i) {
                el.style.transitionDelay = (i * 0.12) + 's';
            });
        });

        var targets = document.querySelectorAll('.reveal');
        if (!('IntersectionObserver' in window)) {
            targets.forEach(function(el) {
                el.classList.add('in');
            });
            return;
        }

        var io = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('in');
                    io.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0,
            rootMargin: '0px 0px -120px 0px'
        });

        targets.forEach(function(el) {
            io.observe(el);
        });
    })();
</script>
