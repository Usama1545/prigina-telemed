<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audio Call — Prigina</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('build/img/prigina-gav.png') }}">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html, body {
            width: 100%; height: 100%;
            background: #0f172a;
            font-family: 'Segoe UI', system-ui, sans-serif;
            color: #f1f5f9;
            overflow: hidden;
        }

        /* ── Layout ── */
        .call-page {
            display: flex; flex-direction: column;
            height: 100vh;
        }

        /* ── Status banner ── */
        #statusBanner {
            text-align: center;
            padding: 10px 16px;
            font-size: 13px; font-weight: 600; letter-spacing: .04em;
            background: #1e293b;
            border-bottom: 1px solid rgba(255,255,255,.06);
            transition: background .3s;
        }
        #statusBanner.connecting { background: #1e3a5f; color: #93c5fd; }
        #statusBanner.connected  { background: #14532d; color: #86efac; }
        #statusBanner.error      { background: #7f1d1d; color: #fca5a5; }

        /* ── Centre avatar ── */
        .call-center {
            flex: 1;
            display: flex; flex-direction: column;
            align-items: center; justify-content: center;
            gap: 16px;
        }
        .call-avatar-wrap { position: relative; display: inline-block; }
        .call-avatar {
            width: 110px; height: 110px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid rgba(255,255,255,.15);
            box-shadow: 0 0 0 0 rgba(14,165,233,.5);
        }
        .call-avatar.ringing {
            animation: pulse 1.4s infinite;
        }
        @keyframes pulse {
            0%   { box-shadow: 0 0 0 0 rgba(14,165,233,.6); }
            70%  { box-shadow: 0 0 0 22px rgba(14,165,233,0); }
            100% { box-shadow: 0 0 0 0 rgba(14,165,233,0); }
        }
        .call-name  { font-size: 22px; font-weight: 700; }
        #callTimer  { font-size: 15px; color: #94a3b8; font-variant-numeric: tabular-nums; }

        /* ── Controls ── */
        .call-controls {
            display: flex; justify-content: center; gap: 24px;
            padding: 28px 0 36px;
        }
        .ctrl-btn {
            width: 62px; height: 62px;
            border-radius: 50%;
            border: none; cursor: pointer;
            display: flex; align-items: center; justify-content: center;
            font-size: 22px;
            transition: transform .15s, box-shadow .15s;
        }
        .ctrl-btn:hover { transform: scale(1.1); }
        .ctrl-btn.mute-btn  { background: #334155; color: #f1f5f9; }
        .ctrl-btn.mute-btn.active { background: #dc2626; }
        .ctrl-btn.end-btn   { background: #dc2626; color: #fff; box-shadow: 0 4px 16px rgba(220,38,38,.45); }

        /* ── Error overlay ── */
        #errorOverlay {
            display: none;
            position: fixed; inset: 0; z-index: 100;
            background: rgba(15,23,42,.92);
            flex-direction: column;
            align-items: center; justify-content: center;
            gap: 16px; padding: 32px;
            text-align: center;
        }
        #errorOverlay.show { display: flex; }
        #errorOverlay .err-icon { font-size: 48px; }
        #errorOverlay .err-msg  { font-size: 15px; color: #fca5a5; max-width: 360px; line-height: 1.6; }
        #errorOverlay .err-back {
            background: #334155; color: #f1f5f9;
            border: none; border-radius: 8px;
            padding: 10px 28px; font-size: 14px; font-weight: 600;
            cursor: pointer; margin-top: 8px;
        }

        /* ── Debug log ── */
        #debugLog {
            display: none;
            position: fixed; bottom: 0; left: 0; right: 0;
            max-height: 220px; overflow-y: auto;
            background: rgba(0,0,0,.85);
            font-family: monospace; font-size: 11px;
            color: #94a3b8;
            padding: 8px;
            z-index: 200;
        }
        #debugLog p { margin: 2px 0; border-bottom: 1px solid rgba(255,255,255,.04); padding-bottom: 2px; }
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

<div class="call-page">
    <div id="statusBanner" class="connecting">Connecting…</div>

    <div class="call-center">
        <div class="call-avatar-wrap">
            <img
                id="remoteAvatar"
                src="{{ $doctor['image'] ?? asset('build/img/doctors/doctor-thumb-02.jpg') }}"
                class="call-avatar ringing"
                alt="{{ $doctor['name'] ?? 'Remote' }}"
            >
        </div>
        <div class="call-name">{{ $doctor['name'] ?? 'Connecting…' }}</div>
        <div id="callTimer">00:00</div>
    </div>

    <div class="call-controls">
        <button class="ctrl-btn mute-btn" id="muteBtn" title="Mute">🎤</button>
        <button class="ctrl-btn end-btn"  id="endBtn"  title="End call">📵</button>
    </div>
</div>

<!-- Error overlay -->
<div id="errorOverlay">
    <div class="err-icon">⚠️</div>
    <div class="err-msg" id="errorMsg">Failed to connect to the call.</div>
    <button class="err-back" id="errBackBtn">Go Back</button>
</div>

<!-- Debug log (press D to toggle) -->
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
const statusBanner = document.getElementById('statusBanner');
const logBox       = document.getElementById('debugLog');
let   timerSeconds = 0, timerInterval = null;

function log(msg, level = 'info') {
    const ts = new Date().toTimeString().slice(0,8);
    console[level === 'err' ? 'error' : 'log'](`[Zego ${ts}] ${msg}`);
    const p = document.createElement('p');
    p.className = level === 'err' ? 'err' : (level === 'ok' ? 'ok' : '');
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
    timerInterval = setInterval(() => {
        timerSeconds++;
        const m = String(Math.floor(timerSeconds / 60)).padStart(2, '0');
        const s = String(timerSeconds % 60).padStart(2, '0');
        document.getElementById('callTimer').textContent = `${m}:${s}`;
    }, 1000);
}

// ── ZegoExpressEngine ─────────────────────────────────────────────────────────
log(`Init: appID=${appID} server=${server} roomID=${roomID} userID=${userID}`);

if (!appID || !server || !token) {
    showError(`Missing config — appID:${!!appID} server:${!!server} token:${!!token}`);
}

let zg          = null;
let localStream = null;
let isMuted     = false;

async function initCall() {
    try {
        zg = new ZegoExpressEngine(appID, server);
        log('ZegoExpressEngine created', 'ok');

        // ── Room state changes ──────────────────────────────────────────────
        zg.on('roomStateUpdate', (rID, state, errCode, extendedData) => {
            const states = ['Disconnected', 'Connecting', 'Connected'];
            log(`roomStateUpdate room=${rID} state=${states[state] ?? state} errCode=${errCode}`);
            if (state === 2) {
                setStatus('Connected ✓', 'connected');
                document.querySelector('.call-avatar').classList.remove('ringing');
                startTimer();
            } else if (state === 0 && errCode !== 0) {
                showError(`Disconnected from room. Error code: ${errCode}`);
            } else if (state === 1) {
                setStatus('Connecting…', 'connecting');
            }
        });

        // ── Remote stream updates ───────────────────────────────────────────
        zg.on('roomStreamUpdate', async (rID, updateType, streamList) => {
            log(`roomStreamUpdate type=${updateType} streams=${streamList.map(s => s.streamID).join(',')}`);
            if (updateType === 'ADD') {
                for (const stream of streamList) {
                    try {
                        const remoteStream = await zg.startPlayingStream(stream.streamID, {});
                        log(`Playing remote stream ${stream.streamID}`, 'ok');

                        // Audio element for voice call
                        const audio = document.createElement('audio');
                        audio.id        = 'audio_' + stream.streamID;
                        audio.srcObject = remoteStream;
                        audio.autoplay  = true;
                        audio.playsInline = true;
                        document.body.appendChild(audio);
                    } catch (e) {
                        log(`Failed to play stream ${stream.streamID}: ${e.message}`, 'err');
                    }
                }
            } else if (updateType === 'DELETE') {
                for (const stream of streamList) {
                    zg.stopPlayingStream(stream.streamID);
                    const el = document.getElementById('audio_' + stream.streamID);
                    if (el) el.remove();
                    log(`Stopped remote stream ${stream.streamID}`);
                }
            }
        });

        // ── User join / leave ───────────────────────────────────────────────
        zg.on('roomUserUpdate', (rID, updateType, userList) => {
            log(`roomUserUpdate type=${updateType} users=${userList.map(u => u.userID).join(',')}`);
        });

        // ── Network quality ─────────────────────────────────────────────────
        zg.on('publishQualityUpdate', (sID, quality) => {
            if (quality.video.frameRate > 0 || quality.audio.rtt > 200) {
                log(`publishQuality streamID=${sID} rtt=${quality.audio.rtt}ms`);
            }
        });

        // ── Login room ──────────────────────────────────────────────────────
        log(`Logging into room ${roomID}…`);
        const loginResult = await zg.loginRoom(roomID, token, { userID, userName }, { userUpdate: true });
        log(`loginRoom result: ${JSON.stringify(loginResult)}`, 'ok');

        // ── Publish local audio stream ──────────────────────────────────────
        log('Creating local audio stream…');
        localStream = await zg.createStream({ camera: { audio: true, video: false } });
        log('Local stream created', 'ok');

        const publishStreamID = `${userID}`;
        zg.startPublishingStream(publishStreamID, localStream);
        log(`Publishing stream as ${publishStreamID}`, 'ok');

    } catch (err) {
        log(`initCall error: ${err.message || err}`, 'err');
        showError(`Could not start call: ${err.message || 'Unknown error'}`);
    }
}

// ── Controls ──────────────────────────────────────────────────────────────────
document.getElementById('muteBtn').addEventListener('click', () => {
    if (!localStream) return;
    isMuted = !isMuted;
    localStream.getAudioTracks().forEach(t => { t.enabled = !isMuted; });
    document.getElementById('muteBtn').classList.toggle('active', isMuted);
    document.getElementById('muteBtn').textContent = isMuted ? '🔇' : '🎤';
    log(`Mic ${isMuted ? 'muted' : 'unmuted'}`);
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

// ── Debug toggle (press D) ────────────────────────────────────────────────────
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
