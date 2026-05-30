<?php $page = 'video-call'; ?>
@extends('layouts.mainlayout')

@section('content')
@component('components.breadcrumb', ['li_1' => 'Video Call', 'li_2' => 'Video Call',  'title' => 'Video Call'])
@endcomponent

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">

                <div class="call-wrapper">
                    <div class="call-main-row">
                        <div class="call-main-wrapper">
                            <div class="call-view">
                                <div class="call-window">

                                    <!-- Header -->
                                    <div class="fixed-header">
                                        <div class="navbar">
                                            <div class="user-details">
                                                <div class="float-start user-img">
                                                    <a class="avatar avatar-sm me-2">
                                                        <img src="{{ current_user()['image'] ?? URL::asset('build/img/patients/patient1.jpg') }}"
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
                                        <div class="call-content-wrap">

                                            <!-- Remote Video -->
                                            <div class="user-video">
                                                <video id="remoteVideo" autoplay playsinline style="width:100%; height:100%; object-fit:cover;"></video>
                                            </div>

                                            <!-- Local Video -->
                                            <div class="my-video" style="position:absolute; bottom:20px; right:20px; width:150px;">
                                                <video id="localVideo" autoplay muted playsinline style="width:100%; border-radius:10px;"></video>
                                            </div>

                                        </div>
                                    </div>

                                    <!-- Footer -->
                                    <div class="call-footer">
                                        <div class="call-icons">
                                            <ul class="call-items">

                                                <li class="call-item">
                                                    <a href="javascript:void(0)" id="toggleVideo">
                                                        <i class="isax isax-video"></i>
                                                    </a>
                                                </li>

                                                <li class="call-item">
                                                    <a href="javascript:void(0)" id="endCall">
                                                        <i class="isax isax-call"></i>
                                                    </a>
                                                </li>

                                                <li class="call-item">
                                                    <a href="javascript:void(0)" id="toggleMic">
                                                        <i class="isax isax-microphone-2"></i>
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
    </div>
</div>
@endsection


@section('scripts')

<script src="https://unpkg.com/zego-express-engine-webrtc"></script>

<script>
    const appID = {{ config('services.zego.app_id') }};
    const userID = "{{ $user['uid'] }}";
    const userName = "{{ $user['name'] }}";
    const token = "{{ $token }}";

    const roomID = "call_{{ $id }}";

    const zg = new ZegoExpressEngine(appID);

    let localStream = null;
    let isMicMuted = false;
    let isVideoOff = false;

    async function initCall() {
        try {
            await zg.loginRoom(roomID, token, { userID, userName });

            // Create local stream (video + audio)
            localStream = await zg.createStream({
                camera: { audio: true, video: true }
            });

            // Attach local stream
            document.getElementById('localVideo').srcObject = localStream;

            // Publish
            zg.startPublishingStream(userID, localStream);

            // Listen remote
            zg.on('roomStreamUpdate', async (roomID, updateType, streamList) => {
                if (updateType === 'ADD') {
                    for (const stream of streamList) {
                        const remoteStream = await zg.startPlayingStream(stream.streamID);
                        document.getElementById('remoteVideo').srcObject = remoteStream;
                    }
                }
            });

        } catch (err) {
            console.error(err);
        }
    }

    // Toggle mic
    document.getElementById('toggleMic').onclick = () => {
        isMicMuted = !isMicMuted;
        zg.muteMicrophone(isMicMuted);
    };

    // Toggle camera
    document.getElementById('toggleVideo').onclick = () => {
        isVideoOff = !isVideoOff;
        zg.muteCamera(isVideoOff);
    };

    // End call
    document.getElementById('endCall').onclick = async () => {
        if (localStream) {
            zg.stopPublishingStream(userID);
            zg.destroyStream(localStream);
        }

        await zg.logoutRoom(roomID);
        window.location.href = "{{ $backUrl ?? url('/dashboard') }}";
    };

    initCall();
</script>

@endsection