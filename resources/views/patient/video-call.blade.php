<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Call — Prigina</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('build/img/prigina-gav.png') }}">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html, body {
            width: 100%; height: 100%;
            background: #000;
            font-family: 'Segoe UI', system-ui, sans-serif;
            color: #f1f5f9;
            overflow: hidden;
        }

        /* ── Status banner ── */
        #statusBanner {
            position: fixed; top: 0; left: 0; right: 0; z-index: 50;
            text-align: center;
            padding: 8px 16px;
            font-size: 13px; font-weight: 600;
            background: rgba(15,23,42,.9);
            backdrop-filter: blur(6px);
            transition: background .3s;
        }
        #statusBanner.connecting { color: #93c5fd; }
        #statusBanner.connected  { color: #86efac; }
        #statusBanner.error      { color: #fca5a5; background: rgba(127,29,29,.9); }

        /* ── Remote full-screen ── */
        #remoteVideo {
            position: fixed; inset: 0; z-index: 1;
            width: 100%; height: 100%;
            object-fit: cover;
            background: #111;
        }

        /* ── Waiting placeholder (shown while remote not streaming) ── */
        #waitingPlaceholder {
            position: fixed; inset: 0; z-index: 2;
            display: flex; flex-direction: column;
            align-items: center; justify-content: center;
            gap: 14px;
            background: #0f172a;
        }
        #waitingPlaceholder img {
            width: 100px; height: 100px;
            border-radius: 50%; object-fit: cover;
            border: 3px solid rgba(255,255,255,.15);
            animation: pulse 1.4s infinite;
        }
        #waitingPlaceholder .wname { font-size: 20px; font-weight: 700; }
        #waitingPlaceholder .wsub  { font-size: 14px; color: #94a3b8; }
        @keyframes pulse {
            0%   { box-shadow: 0 0 0 0 rgba(14,165,233,.6); }
            70%  { box-shadow: 0 0 0 20px rgba(14,165,233,0); }
            100% { box-shadow: 0 0 0 0 rgba(14,165,233,0); }
        }

        /* ── Local PiP ── */
        #localVideo {
            position: fixed; bottom: 90px; right: 16px; z-index: 30;
            width: 110px; height: 150px;
            border-radius: 12px;
            object-fit: cover;
            border: 2px solid rgba(255,255,255,.2);
            background: #1e293b;
        }

        /* ── Controls bar ── */
        .call-controls {
            position: fixed; bottom: 0; left: 0; right: 0; z-index: 40;
            display: flex; justify-content: center; gap: 20px;
            padding: 16px 0 28px;
            background: linear-gradient(to top, rgba(0,0,0,.7), transparent);
        }
        .ctrl-btn {
            width: 58px; height: 58px;
            border-radius: 50%; border: none; cursor: pointer;
            display: flex; align-items: center; justify-content: center;
            font-size: 22px;
            transition: transform .15s, background .2s;
        }
        .ctrl-btn:hover  { transform: scale(1.1); }
        .ctrl-btn.mic    { background: rgba(255,255,255,.15); }
        .ctrl-btn.mic.off { background: #dc2626; }
        .ctrl-btn.cam    { background: rgba(255,255,255,.15); }
        .ctrl-btn.cam.off { background: #dc2626; }
        .ctrl-btn.end    { background: #dc2626; color: #fff; box-shadow: 0 4px 16px rgba(220,38,38,.45); }

        /* ── Timer ── */
        #callTimer {
            position: fixed; top: 40px; left: 50%; transform: translateX(-50%); z-index: 50;
            background: rgba(0,0,0,.45); backdrop-filter: blur(4px);
            padding: 4px 14px; border-radius: 20px;
            font-size: 14px; font-variant-numeric: tabular-nums; color: #e2e8f0;
        }

        /* ── Error overlay ── */
        #errorOverlay {
            display: none;
            position: fixed; inset: 0; z-index: 100;
            background: rgba(15,23,42,.92);
            flex-direction: column;
            align-items: center; justify-content: center;
            gap: 16px; padding: 32px; text-align: center;
        }
        #errorOverlay.show { display: flex; }
        #errorOverlay .err-icon { font-size: 48px; }
        #errorOverlay .err-msg  { font-size: 15px; color: #fca5a5; max-width: 380px; line-height: 1.6; }
        #errorOverlay .err-back {
            background: #334155; color: #f1f5f9;
            border: none; border-radius: 8px;
            padding: 10px 28px; font-size: 14px; font-weight: 600; cursor: pointer;
        }

        /* ── Debug log ── */
        #debugLog {
            display: none;
            position: fixed; bottom: 0; left: 0; right: 0; z-index: 200;
            max-height: 220px; overflow-y: auto;
            background: rgba(0,0,0,.88);
            font-family: monospace; font-size: 11px; color: #94a3b8; padding: 8px;
        }
        #debugLog p { margin: 2px 0; padding-bottom: 2px; border-bottom: 1px solid rgba(255,255,255,.04); }
        #debugLog p.err { color: #f87171; }
        #debugLog p.ok  { color: #86efac; }
        #debugToggle {
            position: fixed; top: 8px; right: 8px; z-index: 300;
            background: rgba(255,255,255,.08); border: none;
            color: #94a3b8; font-size: 11px; padding: 3px 8px;
            border-radius: 4px; cursor: pointer;
        }
    </style>
</head>
<body>

<div id="statusBanner" class="connecting">Connecting…</div>
<div id="callTimer" style="display:none;">00:00</div>

<!-- Remote video (fullscreen) -->
<video id="remoteVideo" autoplay playsinline></video>

<!-- Waiting for remote user -->
<div id="waitingPlaceholder">
    <img src="{{ $doctor['image'] ?? asset('build/img/doctors/doctor-thumb-02.jpg') }}" alt="">
    <div class="wname">{{ $doctor['name'] ?? 'Waiting…' }}</div>
    <div class="wsub">Waiting for the other person to join…</div>
</div>

<!-- Local PiP -->
<video id="localVideo" autoplay muted playsinline></video>

<!-- Controls -->
<div class="call-controls">
    <button class="ctrl-btn mic" id="micBtn"  title="Mute mic">🎤</button>
    <button class="ctrl-btn end" id="endBtn"  title="End call">📵</button>
    <button class="ctrl-btn cam" id="camBtn"  title="Toggle camera">📷</button>
</div>

<!-- Error overlay -->
<div id="errorOverlay">
    <div class="err-icon">⚠️</div>
    <div class="err-msg" id="errorMsg">Failed to connect to the call.</div>
    <button class="err-back" id="errBackBtn">Go Back</button>
</div>

<!-- Debug toggle -->
<button id="debugToggle">🐛 logs</button>
<div id="debugLog"></div>

<script src="https://unpkg.com/zego-express-engine-webrtc@latest/sdk/ZegoExpressWebRTC.min.js"></script>
<script>
// ── Config from server ────────────────────────────────────────────────────────
const appID    = {{ (int) config('services.zego.app_id') }};
const server   = @json(config('services.zego.server_url'));
const token    = @json($token);
const userID   = @json($user['uid']);
const userName = @json($user['name'] ?? 'User');
const roomID   = "call_{{ $id }}";
const backUrl  = @json($backUrl ?? url('/dashboard'));

// ── Helpers ───────────────────────────────────────────────────────────────────
const statusBanner   = document.getElementById('statusBanner');
const waitPlaceholder = document.getElementById('waitingPlaceholder');
const logBox         = document.getElementById('debugLog');
let timerSeconds = 0, timerInterval = null;

function log(msg, level = 'info') {
    const ts = new Date().toTimeString().slice(0, 8);
    console[level === 'err' ? 'error' : 'log'](`[Zego ${ts}] ${msg}`);
    const p = document.createElement('p');
    p.className   = level === 'err' ? 'err' : (level === 'ok' ? 'ok' : '');
    p.textContent = `[${ts}] ${msg}`;
    logBox.appendChild(p);
    logBox.scrollTop = logBox.scrollHeight;
}

function setStatus(text, cls) {
    statusBanner.textContent = text;
    statusBanner.className   = cls;
    log(`STATUS → ${text}`, cls === 'error' ? 'err' : (cls === 'connected' ? 'ok' : 'info'));
}

function showError(msg) {
    log(msg, 'err');
    document.getElementById('errorMsg').textContent = msg;
    document.getElementById('errorOverlay').classList.add('show');
    setStatus('Connection failed', 'error');
}

function startTimer() {
    const timerEl = document.getElementById('callTimer');
    timerEl.style.display = 'block';
    timerInterval = setInterval(() => {
        timerSeconds++;
        const m = String(Math.floor(timerSeconds / 60)).padStart(2, '0');
        const s = String(timerSeconds % 60).padStart(2, '0');
        timerEl.textContent = `${m}:${s}`;
    }, 1000);
}

// ── ZegoExpressEngine ─────────────────────────────────────────────────────────
log(`Init: appID=${appID} server=${server} roomID=${roomID} userID=${userID}`);

if (!appID || !server || !token) {
    showError(`Missing config — appID:${!!appID} server:${!!server} token:${!!token}`);
}

let zg          = null;
let localStream = null;
let isMicMuted  = false;
let isCamOff    = false;

async function initCall() {
    try {
        zg = new ZegoExpressEngine(appID, server);
        log('ZegoExpressEngine created', 'ok');

        // ── Room state ─────────────────────────────────────────────────────
        zg.on('roomStateUpdate', (rID, state, errCode, extendedData) => {
            const states = ['Disconnected', 'Connecting', 'Connected'];
            log(`roomStateUpdate state=${states[state] ?? state} errCode=${errCode} data=${JSON.stringify(extendedData)}`);
            if (state === 2) {
                setStatus('Connected ✓', 'connected');
                startTimer();
            } else if (state === 1) {
                setStatus('Connecting…', 'connecting');
            } else if (state === 0 && errCode !== 0) {
                showError(`Disconnected. Error code: ${errCode}`);
            }
        });

        // ── Remote streams ─────────────────────────────────────────────────
        zg.on('roomStreamUpdate', async (rID, updateType, streamList) => {
            log(`roomStreamUpdate type=${updateType} streams=${streamList.map(s => s.streamID).join(',')}`);

            if (updateType === 'ADD') {
                for (const stream of streamList) {
                    try {
                        const remoteStream = await zg.startPlayingStream(stream.streamID, {
                            video: document.getElementById('remoteVideo'),
                        });
                        log(`Playing remote stream ${stream.streamID}`, 'ok');

                        // Hide the waiting placeholder when we get a remote stream
                        waitPlaceholder.style.display = 'none';

                        document.getElementById('remoteVideo').srcObject = remoteStream;
                    } catch (e) {
                        log(`Failed to play stream ${stream.streamID}: ${e.message}`, 'err');
                    }
                }
            } else if (updateType === 'DELETE') {
                for (const stream of streamList) {
                    zg.stopPlayingStream(stream.streamID);
                    log(`Stopped remote stream ${stream.streamID}`);
                }
                // Show placeholder again if no remote streams
                document.getElementById('remoteVideo').srcObject = null;
                waitPlaceholder.style.display = 'flex';
            }
        });

        // ── User updates ───────────────────────────────────────────────────
        zg.on('roomUserUpdate', (rID, updateType, userList) => {
            log(`roomUserUpdate type=${updateType} users=${userList.map(u => u.userID).join(',')}`);
        });

        // ── Publish quality ────────────────────────────────────────────────
        zg.on('publishQualityUpdate', (sID, q) => {
            if (q.audio.rtt > 300 || q.video.frameRate < 10) {
                log(`Quality warning: rtt=${q.audio.rtt}ms fps=${q.video.frameRate}`);
            }
        });

        // ── Login ──────────────────────────────────────────────────────────
        log(`Logging into room ${roomID}…`);
        const loginResult = await zg.loginRoom(roomID, token, { userID, userName }, { userUpdate: true });
        log(`loginRoom result: ${JSON.stringify(loginResult)}`, 'ok');

        // ── Local stream (video + audio) ───────────────────────────────────
        log('Creating local video+audio stream…');
        localStream = await zg.createStream({ camera: { audio: true, video: true } });
        log('Local stream created', 'ok');

        document.getElementById('localVideo').srcObject = localStream;

        const publishStreamID = `${userID}`;
        zg.startPublishingStream(publishStreamID, localStream);
        log(`Publishing stream as ${publishStreamID}`, 'ok');

    } catch (err) {
        log(`initCall error: ${err.message || err}`, 'err');
        showError(`Could not start call: ${err.message || 'Unknown error'}`);
    }
}

// ── Controls ──────────────────────────────────────────────────────────────────
document.getElementById('micBtn').addEventListener('click', () => {
    if (!localStream) return;
    isMicMuted = !isMicMuted;
    localStream.getAudioTracks().forEach(t => { t.enabled = !isMicMuted; });
    const btn = document.getElementById('micBtn');
    btn.classList.toggle('off', isMicMuted);
    btn.textContent = isMicMuted ? '🔇' : '🎤';
    log(`Mic ${isMicMuted ? 'muted' : 'unmuted'}`);
});

document.getElementById('camBtn').addEventListener('click', () => {
    if (!localStream) return;
    isCamOff = !isCamOff;
    localStream.getVideoTracks().forEach(t => { t.enabled = !isCamOff; });
    const btn = document.getElementById('camBtn');
    btn.classList.toggle('off', isCamOff);
    btn.textContent = isCamOff ? '🚫' : '📷';
    log(`Camera ${isCamOff ? 'off' : 'on'}`);
});

async function endCall() {
    log('Ending call…');
    try {
        if (localStream) {
            zg.stopPublishingStream(`${userID}`);
            zg.destroyStream(localStream);
            localStream = null;
        }
        if (zg) await zg.logoutRoom(roomID);
    } catch (e) {
        log(`endCall cleanup error: ${e.message}`, 'err');
    }
    clearInterval(timerInterval);
    window.location.href = backUrl;
}

document.getElementById('endBtn').addEventListener('click', endCall);
document.getElementById('errBackBtn').addEventListener('click', () => { window.location.href = backUrl; });

// ── Debug toggle (press D key or click button) ────────────────────────────────
document.getElementById('debugToggle').addEventListener('click', () => {
    logBox.style.display = logBox.style.display === 'block' ? 'none' : 'block';
});
document.addEventListener('keydown', e => {
    if (e.key === 'd' || e.key === 'D') {
        logBox.style.display = logBox.style.display === 'block' ? 'none' : 'block';
    }
});

// ── Start ─────────────────────────────────────────────────────────────────────
initCall();
</script>
</body>
</html>
