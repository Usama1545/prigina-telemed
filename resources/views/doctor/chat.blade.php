<?php $page = 'chat'; ?>
@extends('layouts.mainlayout')
@section('content')
    <!-- Page Content -->
    <div class="page-wrapper chat-page-wrapper mt-3">
        <div class="container chat-wrapper">
            <div class="content doctor-content">
                @include('partials.doctor-sidebar')
                <div class="chat-sec">

                    <!-- sidebar group -->
                    <div class="sidebar-group left-sidebar chat_sidebar" id="chatSidebar">
                        <div id="chats" class="left-sidebar-wrap sidebar active slimscroll">
                            
                            <!-- Left Chat Title -->
                            <div class="left-chat-title all-chats">
                                <div class="left-chat-title all-chats d-flex align-items-center justify-content-between">

                                    <div class="setting-title-head">
                                        <h4 class="mb-0">All Chats</h4>
                                    </div>

                                    <div>
                                        <a href="{{ route('doctor.dashboard') }}"
                                        class="btn btn-sm btn-primary text-white">

                                            <i class="fa-solid fa-arrow-left me-1"></i>
                                            Dashboard

                                        </a>
                                    </div>

                                </div>
                                <div class="add-section">
                                    <form>
                                        <div class="user-chat-search">
                                            <span class="form-control-feedback"><i class="fa-solid fa-magnifying-glass"></i></span>
                                            <input type="text" name="chat-search" placeholder="Search" class="form-control">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="slimscroll-active-sidebar">
                                <div class="sidebar-body chat-body" id="chatsidebar">
                                    <ul class="user-list">
                                        @foreach ($conversations as $index => $conversation)
                                            <li class="user-list-item" data-conversation-id="{{ $conversation['id'] }}">
                                                <a href="javascript:void(0);" class="conversation-item">
                                                    @php
                                                        $nameParts = explode(' ', trim($conversation['patientName'] ?? ''));
                                                        
                                                        $initials = collect($nameParts)
                                                            ->map(fn($part) => strtoupper(substr($part, 0, 1)))
                                                            ->take(2)
                                                            ->implode('') ?: 'P';
                                                    @endphp

                                                    <div class="avatar ">
                                                        <div class="avatar-initials">
                                                            {{ $initials }}
                                                        </div>
                                                    </div>
                                                    <div class="users-list-body">
                                                        <div>
                                                            <h5>{{ $conversation['patientName'] ?: 'Patient' }}</h5>
                                                            <p>{{ $conversation['lastMessage'] ?? "" }}</p>
                                                        </div>
                                                        @if($conversation['lastMessageTime'] ?? null)
                                                        <div class="last-chat-time">
                                                            <small class="text-muted">{{ Carbon\Carbon::parse($conversation['lastMessageTime'])->diffForHumans() ?? $conversation['lastMessageTime'] }}</small>
                                                            @if(($conversation['doctorUnreadCount'] ?? 0) > 0)
                                                                <div class="chat-pin">
                                                                    <span class="unread badge badge-primary">{{ $conversation['doctorUnreadCount'] ?? 0 }}</span>
                                                                </div>
                                                            @elseif(($conversation['patientUnreadCount'] ?? 0) == 0)
                                                                <div class="chat-pin">
                                                                    <i class="fa-solid fa-check-double text-primary"></i>
                                                                </div>
                                                            @else
                                                                <div class="chat-pin">
                                                                    <i class="fi fi-rr-check text-muted"></i>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        @endif
                                                    </div>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Chat -->
                    <div class="chat chat-messages" id="chatArea">
                        <div class="chat-inner-header">
                            <div class="chat-header">
                                <div class="user-details">
                                    <div class="d-lg-none">
                                        <ul class="list-inline mt-2 me-2">
                                            <li class="list-inline-item">
                                                <a class="text-muted px-0 left_sides" href="#" id="backToChatsBtn">
                                                    <i class="fas fa-arrow-left"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="avatar-placeholder">
                                        <i class="fa-solid fa-user" style="font-size: 40px; color: #007bff;"></i>
                                    </div>
                                    <div class="mt-1">
                                        <h5 id="selectedDoctorName">Select a conversation</h5>
                                        <small class="last-seen" id="selectedDoctorStatus">Online</small>
                                    </div>
                                </div>
                                <div class="chat-options">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0);" class="btn btn-outline-light" id="audioCallBtn" title="Audio Call" style="display: none;">
                                                <i class="fa-solid fa-phone"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0);" class="btn btn-outline-light" id="videoCallBtn" title="Video Call" style="display: none;">
                                                <i class="fa-solid fa-video"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="btn btn-outline-light no-bg" href="#" data-bs-toggle="dropdown">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#change-chat">Delete Chat</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="chat-search">
                                    <form>
                                        <span class="form-control-feedback"><i class="fa-solid fa-magnifying-glass"></i></span>
                                        <input type="text" name="chat-search" placeholder="Search Chats" class="form-control">
                                        <div class="close-btn-chat"><i class="fa fa-close"></i></div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="chat-body" id="chatMessagesContainer" style="flex: 1; overflow-y: auto; min-height: 0;">
                            <div class="messages" id="messagesList">
                                <div class="text-center text-muted p-5" id="noMessagesPlaceholder">
                                    Select a conversation to start messaging
                                </div>
                            </div>
                        </div>

                        <div class="chat-footer">
                            <form id="messageForm">
                                @csrf
                                <input type="hidden" id="conversationId" name="conversationId" value="">
                                <div class="smile-foot">
                                    <div class="chat-action-btns">
                                        <div class="chat-action-col">
                                            <a class="action-circle" href="#" data-bs-toggle="dropdown">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <button type="button" class="dropdown-item" id="attachDocumentBtn">
                                                    <span><i class="fa-solid fa-file-lines"></i></span> Document
                                                </button>
                                                <button type="button" class="dropdown-item" id="attachImageBtn">
                                                    <span><i class="fa-solid fa-image"></i></span> Gallery
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                                <input type="text" class="form-control chat_form" id="messageText" placeholder="Type your message here...">
                                <div class="form-buttons">
                                    <button class="btn send-btn" type="submit">
                                        <i class="isax isax-send-25"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <input type="file" id="imageFileInput" accept="image/*" style="display: none;">
                    <input type="file" id="documentFileInput" accept=".pdf,.doc,.docx,.txt" style="display: none;">
                </div>
            </div>
        </div>
    </div>
    
    <style>
        .doctor-sidebar {
            display: none;
        }
        .main-chat-blk {
            width: 100%;
            max-width: 100%;
            overflow-x: hidden;
            height: 100dvh;
        }

    
        .chat-wrapper {
             height: calc(100dvh - 150px);
        }

        
        
        /* Desktop Styles */
        .chat-sec {
            display: flex;
            width: 100%;
           
            background: #fff;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0,0,0,0.05);
        }

        .sidebar-group.left-sidebar {
            width: 320px;
            border-right: 1px solid #e5e7eb;
            background: #fff;
            flex-shrink: 0;
        }

       .chat {
            flex: 1;
            display: flex;
            flex-direction: column;
            transition: all 0.5s ease;
            -webkit-transition: all 0.5s ease;
            -ms-transition: all 0.5s ease;
            background: var(--white);
            border: 1px solid var(--gray-transparent);
            border-radius: 10px;
            height: calc(100vh - 150px);
            flex-direction: column;
        }
        /* Mobile Styles */
        @media (max-width: 991px) {
            .chat-wrapper {
                height: calc(100dvh - 170px);
                 flex: 1;
                overflow-y: auto;
                overflow-x: hidden;
                min-width: 0;
                padding-bottom: calc(90px + env(safe-area-inset-bottom));
            }

            .sidebar-group.left-sidebar {
                width: 100%;
            }

            .sidebar-group.left-sidebar.hide-on-mobile {
                display: none !important;
            }

            .chat {
                display: none !important;
            }
            .chat.show-on-mobile {
                display: flex !important;
            }

           
        }

        @media (max-width: 991.98px) {
            .container {
                max-width: 100%;
                padding-bottom: 0px !important;
            }
        }


        /* Rest of your styles remain the same */
        .user-list-item {
            cursor: pointer;
            transition: all 0.2s ease;
            margin-bottom: 0px;
        }

        .user-list-item.active {
            background: #f0f7ff;
            /* border-left: 4px solid #0d6efd; */
            border-radius: 0px;
        }

        .avatar-initials {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: var(--secondary);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 15px;
            text-transform: uppercase;
        }

        .doctor-content.content {
            padding: 0px !important;
        }

        /* ... rest of your existing CSS ... */
    </style>
@endsection
@push('scripts')
<script>
$(document).ready(function() {

    let currentConversationId = null;
    let previousMessageCount = 0;
    let userScrolledUp = false;
    let isSendingMessage = false;
    let lastRenderedMessages = '';
    let currentMessages = [];
    let messagePage = 1;
    let hasMoreMessages = false;
    let isLoadingMessages = false;
    let isLoadingOlderMessages = false;
    const messagePageSize = 30;

    const chatContainer = $('#chatMessagesContainer');
    const sendBtn = $('.send-btn');
    const sendBtnOriginalHtml = sendBtn.html();

    // =========================
    // FILE PICKERS
    // =========================

    $('#attachImageBtn').on('click', function(e) {
        e.preventDefault();
        e.stopPropagation();

        $('#imageFileInput').trigger('click');
    });

    $('#attachDocumentBtn').on('click', function(e) {
        e.preventDefault();
        e.stopPropagation();

        $('#documentFileInput').trigger('click');
    });

    $('#imageFileInput').on('change', function() {

        const file = this.files[0];

        if (!file) return;

        sendFileMessage(file);

        $(this).val('');
    });

    $('#documentFileInput').on('change', function() {

        const file = this.files[0];

        if (!file) return;

        sendFileMessage(file);

        $(this).val('');
    });

    // =========================
    // MOBILE
    // =========================

    function isMobile() {
        return window.innerWidth <= 991;
    }

    function resetLayoutClasses() {
        $('.sidebar-group.left-sidebar')
            .removeClass('hide-on-mobile');

        $('.chat')
            .removeClass('show-on-mobile');
    }

    function showChatOnMobile() {

        if (isMobile()) {

            $('.sidebar-group.left-sidebar')
                .addClass('hide-on-mobile');

            $('.chat')
                .addClass('show-on-mobile');
        }
    }

    function showSidebarOnMobile() {

        if (isMobile()) {

            $('.sidebar-group.left-sidebar')
                .removeClass('hide-on-mobile');

            $('.chat')
                .removeClass('show-on-mobile');
        }
    }

    $('#backToChatsBtn').click(function(e) {

        e.preventDefault();

        showSidebarOnMobile();

        currentConversationId = null;
        window.currentConversationId = null;
        currentMessages = [];
        messagePage = 1;
        hasMoreMessages = false;
        previousMessageCount = 0;
        lastRenderedMessages = '';

        $('#conversationId').val('');

        $('#selectedDoctorName')
            .text('Select a conversation');

        $('#audioCallBtn, #videoCallBtn').hide();

        window.history.pushState(
            {},
            '',
            '/doctor/conversations'
        );
    });

    // =========================
    // SCROLL
    // =========================

    chatContainer.on('scroll', function() {

        const scrollTop = chatContainer.scrollTop();

        const scrollHeight =
            chatContainer[0].scrollHeight;

        const clientHeight =
            chatContainer[0].clientHeight;

        userScrolledUp =
            (scrollTop + clientHeight)
            < (scrollHeight - 50);

        if (
            scrollTop <= 80 &&
            currentConversationId &&
            hasMoreMessages &&
            !isLoadingOlderMessages &&
            !isLoadingMessages
        ) {
            loadMessages(currentConversationId, false, false, messagePage, true);
        }
    });

    // =========================
    // UI
    // =========================

    function setActiveConversation(conversationId) {

        $('.user-list li')
            .removeClass('active');

        $(`.user-list li[data-conversation-id="${conversationId}"]`)
            .addClass('active');
    }

    function setLoadingState() {

        $('#messagesList').html(`
            <div class="chat-loading text-center p-5">
                <div class="spinner-border text-primary"></div>
            </div>
        `);
    }

    function setSendingState(state) {

        isSendingMessage = state;

        if (state) {

            sendBtn.prop('disabled', true);

            sendBtn.html(`
                <div class="spinner-border spinner-border-sm text-light"></div>
            `);

        } else {

            sendBtn.prop('disabled', false);

            sendBtn.html(sendBtnOriginalHtml);
        }
    }

    // =========================
    // MARK READ
    // =========================

    function markMessagesAsRead(conversationId) {

        $.ajax({
            url: '/doctor/conversation/' + conversationId + '/mark-read',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            error: function(xhr) {
                console.error(xhr);
            }
        });
    }

    // =========================
    // OPEN CHAT
    // =========================

    function openConversation(conversationId, doctorName = null) {

        currentConversationId = conversationId;
        window.currentConversationId = conversationId;
        currentMessages = [];
        messagePage = 1;
        hasMoreMessages = false;
        previousMessageCount = 0;
        lastRenderedMessages = '';

        $('#conversationId').val(conversationId);

        if (doctorName) {
            $('#selectedDoctorName').text(doctorName);
        }

        if (!isMobile()) {

            $('.sidebar-group.left-sidebar')
                .removeClass('hide-on-mobile');
        }

        $('#audioCallBtn, #videoCallBtn').show();

        setActiveConversation(conversationId);

        if (isMobile()) {
            showChatOnMobile();
        }

        const newUrl =
            '/doctor/conversations/' + conversationId;

        window.history.pushState(
            { conversationId: conversationId },
            '',
            newUrl
        );
        setLoadingState();
        loadMessages(conversationId, false, true);

        markMessagesAsRead(conversationId);

       

        
    }

    // =========================
    // INITIALIZE
    // =========================

    function initializeLayout() {

        resetLayoutClasses();

        let targetConversation = null;

        const urlParts =
            window.location.pathname.split('/');

        const urlConvId =
            urlParts[urlParts.length - 1];

        const hasUrlConversation = (
            urlConvId &&
            urlConvId !== 'conversations' &&
            urlConvId !== 'doctor'
        );

        if (hasUrlConversation) {

            targetConversation =
                $(`.user-list-item[data-conversation-id="${urlConvId}"]`);
        }

        if (
            !targetConversation ||
            !targetConversation.length
        ) {

            targetConversation = isMobile()
                ? $()
                : $('.user-list-item').first();
        }

        if (targetConversation.length) {

            const conversationId =
                targetConversation.data('conversation-id');

            const doctorName =
                targetConversation.find('h5').text();

            openConversation(
                conversationId,
                doctorName
            );

        } else if ($('.user-list-item').length) {

            $('#selectedDoctorName')
                .text('Select a conversation');

            $('#messagesList').html(`
                <div class="text-center text-muted p-5">
                    Select a conversation to start messaging
                </div>
            `);

        } else {

            $('#selectedDoctorName')
                .text('No conversations');

            $('#messagesList').html(`
                <div class="text-center text-muted p-5">
                    No conversations available
                </div>
            `);
        }

        if (isMobile() && !currentConversationId) {
            showSidebarOnMobile();
        }
    }

    // =========================
    // CLICK CHAT
    // =========================

    $(document).on('click', '.conversation-item', function(e) {

        e.preventDefault();

        const li = $(this).closest('li');

        const conversationId =
            li.data('conversation-id');

        const doctorName =
            li.find('h5').text();

        userScrolledUp = false;

        previousMessageCount = 0;

        lastRenderedMessages = '';
        currentMessages = [];
        messagePage = 1;
        hasMoreMessages = false;

        openConversation(
            conversationId,
            doctorName
        );
    });

    // =========================
    // LOAD MESSAGES
    // =========================

    function loadMessages(
        conversationId,
        isPolling = false,
        forceRender = false,
        page = 1,
        prependOlder = false
    ) {

        if (isLoadingMessages || isLoadingOlderMessages) {
            return;
        }

        if (!isPolling && !forceRender && !prependOlder) {
            setLoadingState();
        }

        if (prependOlder) {
            isLoadingOlderMessages = true;
            $('#messagesList').prepend(`
                <div class="older-messages-loader text-center py-2">
                    <div class="spinner-border spinner-border-sm text-primary"></div>
                </div>
            `);
        } else {
            isLoadingMessages = true;
        }

        const oldScrollHeight = chatContainer[0].scrollHeight;
        const oldScrollTop = chatContainer.scrollTop();

        $.ajax({

            url: '/conversation/' + conversationId + '/messages',

            type: 'GET',
            data: {
                limit: messagePageSize,
                page: page,
                latest: isPolling ? 1 : 0
            },

            success: function(response) {

                if (!response.messages) return;

                if (conversationId !== currentConversationId) {
                    return;
                }

                const messagesString =
                    JSON.stringify(response.messages);

                if (
                    messagesString === lastRenderedMessages &&
                    isPolling
                ) {
                    return;
                }

                lastRenderedMessages = messagesString;

                const oldMessageCount =
                    currentMessages.length;

                if (prependOlder) {
                    currentMessages = mergeMessages(response.messages, currentMessages);
                    messagePage = response.nextPage || page;
                } else if (isPolling) {
                    currentMessages = mergeMessages(currentMessages, response.messages);
                    messagePage = Math.max(messagePage, response.nextPage || 1);
                } else {
                    currentMessages = response.messages;
                    messagePage = response.nextPage || 1;
                }

                hasMoreMessages = !!response.hasMore;

                const newMessageCount =
                    currentMessages.length;

                renderMessages(currentMessages);

                if (prependOlder) {

                    const newScrollHeight = chatContainer[0].scrollHeight;
                    chatContainer.scrollTop(newScrollHeight - oldScrollHeight + oldScrollTop);

                } else if (!isPolling) {

                    scrollToBottom();

                } else {

                    const hasNewMessages =
                        newMessageCount > oldMessageCount;

                    if (
                        hasNewMessages &&
                        !userScrolledUp
                    ) {
                        scrollToBottom();
                    }
                }

                previousMessageCount = newMessageCount;

                markMessagesAsRead(conversationId);
            },

            complete: function() {
                isLoadingMessages = false;
                isLoadingOlderMessages = false;
                $('.older-messages-loader').remove();
            },

            error: function(xhr) {

                console.error(xhr);

                if (!isPolling && !prependOlder) {

                    $('#messagesList').html(`
                        <div class="text-center text-danger p-4">
                            Failed to load messages
                        </div>
                    `);
                }
            }
        });
    }

    // =========================
    // REFRESH SIDEBAR
    // =========================

    function refreshConversationList() {

        $.ajax({

            url: window.location.href,

            type: 'GET',

            success: function(response) {

                const html = $(response)
                    .find('#chatsidebar')
                    .html();

                if (html) {

                    $('#chatsidebar').html(html);

                    if (currentConversationId) {
                        setActiveConversation(currentConversationId);
                    }
                }
            },

            error: function(xhr) {
                console.error(xhr);
            }
        });
    }

    // =========================
    // RENDER
    // =========================

    function mergeMessages(existingMessages, incomingMessages) {

        const byId = new Map();

        existingMessages.concat(incomingMessages).forEach(function(message) {
            byId.set(message.id || `${message.senderId}-${message.timestamp}-${message.text}`, message);
        });

        return Array.from(byId.values()).sort(function(a, b) {
            return new Date(a.timestamp) - new Date(b.timestamp);
        });
    }

    function renderMessages(messages) {

        if (!messages || messages.length === 0) {

            $('#messagesList').html(`
                <div class="text-center text-muted p-5">
                    No messages yet
                </div>
            `);

            return;
        }

        let html = '';

        messages.forEach(function(message) {

            const isOwnMessage =
                message.senderId === "{{ current_user()['uid'] }}";

            const timeString =
                new Date(message.timestamp)
                .toLocaleTimeString([], {
                    hour: '2-digit',
                    minute: '2-digit'
                });

            let readIcon = '';

            if (isOwnMessage) {

                readIcon = message.isRead
                    ? `<i class="fa-solid fa-check-double text-primary ms-1"></i>`
                    : `<i class="fa-solid fa-check ms-1 text-muted"></i>`;
            }

            html += `
                <div class="chats ${isOwnMessage ? 'chats-right' : ''}">
                    
                    <div class="chat-avatar">
                        <i class="fa-solid ${isOwnMessage ? 'fa-user-doctor' :  'fa-user' }"
                            style="font-size: 32px; color: ${isOwnMessage ? '#28a745' : '#0d6efd'};">
                        </i>
                    </div>

                    <div class="chat-content">

                        <div class="chat-profile-name ${isOwnMessage ? 'text-end justify-content-end' : ''}">
                            
                            <h6>

                               

                                <span>
                                    ${timeString}
                                    ${readIcon}
                                </span>

                            </h6>

                        </div>

                        <div class="message-content">

                            ${message.imageUrl ? `
                                <div class="chat-image mb-2">
                                    <a href="${message.imageUrl}" download target="_blank">
                                        <img src="${message.imageUrl}"
                                            style="max-width:220px;border-radius:10px;cursor:pointer;">
                                    </a>
                                </div>
                            ` : ''}

                            ${message.documentUrl ? `
                                <div class="chat-document mb-2">
                                    <a href="${message.documentUrl}"
                                        download
                                        target="_blank"
                                        class="btn btn-sm btn-primary text-white">

                                        <i class="fa-solid fa-file-lines"></i>
                                        Download Document

                                    </a>
                                </div>
                            ` : ''}

                            ${message.text ? `
                                <p class="mb-0">
                                    ${escapeHtml(message.text)}
                                </p>
                            ` : ''}

                        </div>

                    </div>

                </div>
            `;
        });

        $('#messagesList').html(html);
    }

    // =========================
    // HELPERS
    // =========================

    function escapeHtml(text) {

        if (!text) return '';

        const div = document.createElement('div');

        div.textContent = text;

        return div.innerHTML;
    }

    function scrollToBottom() {

        setTimeout(function() {

            const chatBody =
                $('#chatMessagesContainer');

            if (chatBody.length) {

                chatBody.scrollTop(
                    chatBody[0].scrollHeight
                );
            }

        }, 100);
    }

    // =========================
    // SEND TEXT
    // =========================

    $('#messageForm').submit(function(e) {

        e.preventDefault();

        if (isSendingMessage) return;

        const conversationId =
            $('#conversationId').val();

        const messageText =
            $('#messageText').val().trim();

        if (!conversationId) {

            alert('Please select a conversation');

            return;
        }

        if (!messageText) return;

        setSendingState(true);

        $.ajax({

            url:
                '/doctor/conversation/' +
                conversationId +
                '/send',

            type: 'POST',

            data: {
                _token: '{{ csrf_token() }}',
                text: messageText,
                type: 'text'
            },

            success: function(response) {

                $('#messageText').val('');

                userScrolledUp = false;

                loadMessages(
                    conversationId,
                    true,
                    true
                );

                refreshConversationList();
            },

            error: function(xhr) {

                alert('Failed to send message');

                console.error(xhr);
            },

            complete: function() {
                setSendingState(false);
            }
        });
    });

    // =========================
    // SEND FILE
    // =========================

    function sendFileMessage(file) {

        if (isSendingMessage) return;

        const conversationId =
            $('#conversationId').val();

        if (!conversationId) {

            alert('Please select a conversation');

            return;
        }

        const formData = new FormData();

        formData.append(
            '_token',
            '{{ csrf_token() }}'
        );

        formData.append('file', file);

        setSendingState(true);

        $.ajax({

            url:
                '/doctor/conversation/' +
                conversationId +
                '/send',

            type: 'POST',

            data: formData,

            processData: false,

            contentType: false,

            success: function(response) {

                userScrolledUp = false;

                loadMessages(
                    conversationId,
                    true,
                    true
                );

                refreshConversationList();
            },

            error: function(xhr) {

                console.error(xhr);

                if (xhr.responseJSON?.message) {

                    alert(xhr.responseJSON.message);

                } else {

                    alert('Failed to upload file');
                }
            },

            complete: function() {
                setSendingState(false);
            }
        });
    }

    // =========================
    // HISTORY
    // =========================

    window.addEventListener('popstate', function(event) {
        initializeLayout();
    });

    // =========================
    // RESIZE
    // =========================

    $(window).on('resize', function() {

        if (!isMobile()) {

            $('.sidebar-group.left-sidebar')
                .removeClass('hide-on-mobile');

            $('.chat')
                .removeClass('show-on-mobile');

            $('.sidebar-group.left-sidebar')[0]
                .style.removeProperty('display');

            $('.chat')[0]
                .style.removeProperty('display');

        } else {

            if (currentConversationId) {

                showChatOnMobile();

            } else {

                showSidebarOnMobile();
            }
        }
    });

    // =========================
    // INIT
    // =========================

    initializeLayout();

    // =========================
    // CLEANUP
    // =========================

    window.loadMessages = loadMessages;
    window.currentConversationId = currentConversationId;

});
</script>
@endpush
