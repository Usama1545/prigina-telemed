<?php $page = 'voice-call'; ?>
@extends('layouts.mainlayout')

@section('content')
@component('components.breadcrumb', ['li_1' => 'Voice Call', 'li_2' => 'Voice Call', 'title' => 'Voice Call'])
@endcomponent

<div class="content">
    <div class="container">

        <div class="call-wrapper">
            <div class="call-main-row">
                <div class="call-main-wrapper">
                    <div class="call-view">
                        <div class="call-window">

                            <!-- Call Header -->
                            <div class="fixed-header">
                                <div class="navbar">
                                    <div class="user-details me-auto">
                                        <div class="float-start user-img">
                                            <a class="avatar avatar-sm me-2" href="{{ url('patient-profile') }}">
                                                <img src="{{ current_user()['image'] ?? URL::asset('build/img/patients/patient1.jpg')}}"
                                                     class="rounded-circle">
                                                <span class="status online"></span>
                                            </a>
                                        </div>
                                        <div class="user-info float-start">
                                            <span>{{ current_user()['name'] }}</span>
                                            <span class="last-seen">Online</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Call Content -->
                            <div class="call-contents">
                                <div class="call-content-wrap text-center">

                                    <div class="voice-call-avatar">
                                        <img src="{{ $doctor['image'] ?? URL::asset('build/img/doctors/doctor-thumb-02.jpg') }}"
                                             class="call-avatar">
                                        <h5 class="mt-2">{{ $doctor['name'] }}</h5>
                                        <span id="callTimer">00:00</span>
                                    </div>

                                </div>
                            </div>

                            <!-- Call Footer -->
                            <div class="call-footer">
                                <div class="call-icons">
                                    <ul class="call-items">

                                        <li class="call-item">
                                            <a href="javascript:void(0)" id="muteBtn">
                                                <i class="isax isax-microphone-2"></i>
                                            </a>
                                        </li>

                                        <li class="call-item">
                                            <a href="javascript:void(0)" id="endCallBtn">
                                                <i class="isax isax-call"></i>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection


@section('scripts')

<!-- ZEGOCLOUD SDK -->
<script src="https://unpkg.com/zego-express-engine-webrtc"></script>

<script>
    const appID = {{ config('services.zego.app_id') }};
    const userID = "{{ $user['uid'] }}";
    const userName = "{{ $user['name'] }}";
    const token = "{{ $token }}";

    const roomID = "call_{{ $id }}";

    const zg = new ZegoExpressEngine(appID);

    let localStream = null;
    let isMuted = false;

    async function initCall() {
        try {
            await zg.loginRoom(roomID, token, { userID, userName });

            localStream = await zg.createStream({
                camera: { audio: true, video: false }
            });

            zg.startPublishingStream(userID, localStream);

            // Listen for remote stream
            zg.on('roomStreamUpdate', async (roomID, updateType, streamList) => {
                if (updateType === 'ADD') {
                    for (const stream of streamList) {
                        const remoteStream = await zg.startPlayingStream(stream.streamID);

                        const audio = document.createElement('audio');
                        audio.srcObject = remoteStream;
                        audio.autoplay = true;
                        document.body.appendChild(audio);
                    }
                }
            });

            startTimer();

        } catch (error) {
            console.error("Call init failed:", error);
        }
    }

    // Timer
    let seconds = 0;
    function startTimer() {
        setInterval(() => {
            seconds++;
            let min = String(Math.floor(seconds / 60)).padStart(2, '0');
            let sec = String(seconds % 60).padStart(2, '0');
            document.getElementById('callTimer').innerText = `${min}:${sec}`;
        }, 1000);
    }

    // Mute toggle
    document.getElementById('muteBtn').onclick = () => {
        isMuted = !isMuted;
        zg.muteMicrophone(isMuted);
    };

    // End call
    document.getElementById('endCallBtn').onclick = async () => {
        if (localStream) {
            zg.stopPublishingStream(userID);
            zg.destroyStream(localStream);
        }

        await zg.logoutRoom(roomID);

        window.location.href = "{{ url('/dashboard') }}";
    };

    // Start call
    initCall();

</script>

@endsection