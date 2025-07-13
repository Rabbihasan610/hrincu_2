@extends('web.layouts.frontend')

@push('style')
    <style>
        :root {
            --gradient: linear-gradient(135deg, #6c63ff 0%, #7913ec 100%);
        }

        .construction-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--light-color);
            padding: 2rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .construction-content {
            max-width: 800px;
            position: relative;
            z-index: 2;
            background: white;
            padding: 3rem;
            border-radius: 20px;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.1);
        }

        .construction-icon {
            font-size: 5rem;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            animation: bounce 2s infinite;
        }

        h1.construction-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 1rem;
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .construction-text {
            font-size: 1.2rem;
            color: var(--dark-color);
            opacity: 0.8;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .countdown {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .countdown-item {
            background: white;
            border-radius: 10px;
            padding: 1rem;
            min-width: 80px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .countdown-number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-color);
        }

        .countdown-label {
            font-size: 0.8rem;
            color: var(--dark-color);
            opacity: 0.6;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-construction {
            background: var(--gradient);
            border: none;
            color: white;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(108, 99, 255, 0.3);
        }

        .btn-construction:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(108, 99, 255, 0.4);
            color: white;
        }

        .construction-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 1;
            overflow: hidden;
        }

        .shape {
            position: absolute;
            border-radius: 50%;
            opacity: 0.1;
        }

        .shape-1 {
            width: 300px;
            height: 300px;
            background: var(--primary-color);
            top: -100px;
            left: -100px;
        }

        .shape-2 {
            width: 200px;
            height: 200px;
            background: var(--secondary-color);
            bottom: -50px;
            right: -50px;
        }

        .shape-3 {
            width: 150px;
            height: 150px;
            background: var(--primary-color);
            top: 50%;
            right: 10%;
        }

        .progress-bar {
            height: 6px;
            background: rgba(108, 99, 255, 0.2);
            border-radius: 3px;
            margin: 2rem 0;
            overflow: hidden;
        }

        .progress {
            height: 100%;
            width: 65%;
            background: var(--gradient);
            border-radius: 3px;
            animation: progress 2s ease-in-out infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {transform: translateY(0);}
            40% {transform: translateY(-20px);}
            60% {transform: translateY(-10px);}
        }

        @keyframes progress {
            0% {width: 65%;}
            50% {width: 75%;}
            100% {width: 65%;}
        }

        @media (max-width: 768px) {
            .construction-content {
                padding: 2rem 1.5rem;
            }

            h1.construction-title {
                font-size: 2rem;
            }

            .construction-icon {
                font-size: 4rem;
            }

            .countdown {
                gap: 0.5rem;
            }

            .countdown-item {
                min-width: 60px;
                padding: 0.8rem 0.5rem;
            }

            .countdown-number {
                font-size: 1.5rem;
            }
        }
    </style>
@endpush

@section('content')
<section class="construction-section">

    <div class="construction-content">
        <div class="construction-icon">
            <i class="fas fa-tools"></i>
        </div>
        <h1 class="construction-title">@lang('This Page Under Construction')</h1>
        <p class="construction-text">
            @lang("We're working hard to bring you an amazing blog experience with insightful articles and resources. Stay tuned for our launch!")
        </p>

        <div class="progress-bar">
            <div class="progress"></div>
        </div>

        <div class="countdown">
            <div class="countdown-item">
                <div class="countdown-number" id="days">07</div>
                <div class="countdown-label">@lang('Days')</div>
            </div>
            <div class="countdown-item">
                <div class="countdown-number" id="hours">23</div>
                <div class="countdown-label">@lang('Hours')</div>
            </div>
            <div class="countdown-item">
                <div class="countdown-number" id="minutes">45</div>
                <div class="countdown-label">@lang('Minutes')</div>
            </div>
            <div class="countdown-item">
                <div class="countdown-number" id="seconds">18</div>
                <div class="countdown-label">@lang('Seconds')</div>
            </div>
        </div>

        <p class="text-muted mb-4">@lang('Estimated launch') June 30, 2025</p>

        <a href="/" class="btn-construction">
            <i class="fas fa-home me-2"></i> @lang('Back to Home')
        </a>
    </div>
</section>
@endsection

@push('script')
<script>
    // Countdown Timer
    function updateCountdown() {
        const launchDate = new Date('June 30, 2025 00:00:00').getTime();
        const now = new Date().getTime();
        const distance = launchDate - now;

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById('days').innerText = days.toString().padStart(2, '0');
        document.getElementById('hours').innerText = hours.toString().padStart(2, '0');
        document.getElementById('minutes').innerText = minutes.toString().padStart(2, '0');
        document.getElementById('seconds').innerText = seconds.toString().padStart(2, '0');
    }

    // Update every second
    setInterval(updateCountdown, 1000);
    updateCountdown(); // Initial call
</script>
@endpush
