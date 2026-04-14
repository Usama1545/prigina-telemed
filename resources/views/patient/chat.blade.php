<?php $page = 'chat'; ?>
@extends('layouts.mainlayout')
@section('content')
    <!-- Page Content -->
    <div class="page-wrapper chat-page-wrapper">
        <div class="container">

            <div class="content doctor-content">

                <div class="chat-sec">

                    <!-- sidebar group -->
                    <div class="sidebar-group left-sidebar chat_sidebar">

                        <!-- Chats sidebar -->
                        <div id="chats" class="left-sidebar-wrap sidebar active slimscroll">

                            <div class="slimscroll-active-sidebar">

                                <!-- Left Chat Title -->
                                <div class="left-chat-title all-chats">
                                    <div class="setting-title-head">
                                        <h4> All Chats</h4>
                                    </div>
                                    <div class="add-section">
                                        <!-- Chat Search -->
                                        <form>
                                            <div class="user-chat-search">
                                                <span class="form-control-feedback"><i
                                                        class="fa-solid fa-magnifying-glass"></i></span>
                                                <input type="text" name="chat-search" placeholder="Search"
                                                    class="form-control">
                                            </div>
                                        </form>
                                        <!-- /Chat Search -->
                                    </div>
                                </div>
                                <!-- /Left Chat Title -->

                                <div class="sidebar-body chat-body" id="chatsidebar">

                                    <ul class="user-list">
                                        @foreach ($conversations as $index => $conversation)
                                            <li class="user-list-item {{ $index === 0 ? 'active' : '' }}" data-conversation-id="{{ $conversation['id'] }}">
                                                <a href="javascript:void(0);" class="conversation-item">
                                                    <div class="avatar avatar-online">
                                                        <img src="{{URL::asset('build/img/doctors-dashboard/profile-01.jpg')}}"
                                                            alt="image">
                                                    </div>
                                                    <div class="users-list-body">
                                                        <div>
                                                            <h5>{{ $conversation['doctorName'] }}</h5>
                                                            <p>{{ $conversation['lastMessage'] ?? "" }}</p>
                                                        </div>
                                                        <div class="last-chat-time">
                                                            <small class="text-muted">{{ $conversation['lastMessageTime'] }}</small>
                                                            <div class="chat-pin">
                                                                <i class="fa-solid fa-check-double green-check"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>

                        </div>
                        <!-- / Chats sidebar -->
                    </div>
                    <!-- /Sidebar group -->

                    <!-- Chat -->
                    <div class="chat chat-messages hide-sm-chatbar" id="middle" style="">
                        <div class="chat-inner-header">
                            <div class="chat-header">
                                <div class="user-details">
                                    <div class="d-lg-none">
                                        <ul class="list-inline mt-2 me-2">
                                            <li class="list-inline-item">
                                                <a class="text-muted px-0 left_sides" href="#" data-chat="open">
                                                    <i class="fas fa-arrow-left"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="avatar-placeholder">
                                        <i class="fa-solid fa-user-doctor" style="font-size: 40px; color: #007bff;"></i>
                                    </div>
                                    <div class="mt-1">
                                        <h5 id="selectedDoctorName">Select a conversation</h5>
                                        <small class="last-seen" id="selectedDoctorStatus">
                                            Online
                                        </small>
                                    </div>
                                </div>
                                <div class="chat-options ">
                                    <ul class="list-inline">
                                        {{-- <li class="list-inline-item">
                                            <a href="javascript:void(0)" class="btn btn-outline-light chat-search-btn"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Search">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </a>
                                        </li> --}}
                                        <li class="list-inline-item">
                                            <a class="btn btn-outline-light no-bg" href="#" data-bs-toggle="dropdown">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#change-chat">Delete Chat</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Chat Search -->
                                <div class="chat-search">
                                    <form>
                                        <span class="form-control-feedback"><i
                                                class="fa-solid fa-magnifying-glass"></i></span>
                                        <input type="text" name="chat-search" placeholder="Search Chats"
                                            class="form-control">
                                        <div class="close-btn-chat"><i class="fa fa-close"></i></div>
                                    </form>
                                </div>
                                <!-- /Chat Search -->
                            </div>
                        </div>
                        <div class="chat-body" id="chatMessagesContainer" style="flex: 1; overflow-y: auto; min-height: 0;">
                            <div class="messages" id="messagesList">
                                <div class="text-center text-muted" id="noMessagesPlaceholder">
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
                                                <a href="#" class="dropdown-item" id="attachDocumentBtn"><span><i
                                                            class="fa-solid fa-file-lines"></i></span>Document</a>
                                                <a href="#" class="dropdown-item" id="attachImageBtn"><span><i
                                                            class="fa-solid fa-image"></i></span>Gallery</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="smile-foot emoj-action-foot">
                                    <a href="#" class="action-circle"><i class="fa-regular fa-face-smile"></i></a>
                                    <div class="emoj-group-list-foot down-emoji-circle">
                                        <ul>
                                            <li><a href="javascript:void(0);"><img
                                                        src="{{URL::asset('build/img/icons/emoj-icon-01.svg')}}"
                                                        alt="Icon"></a></li>
                                            <li><a href="javascript:void(0);"><img
                                                        src="{{URL::asset('build/img/icons/emoj-icon-02.svg')}}"
                                                        alt="Icon"></a></li>
                                            <li><a href="javascript:void(0);"><img
                                                        src="{{URL::asset('build/img/icons/emoj-icon-03.svg')}}"
                                                        alt="Icon"></a></li>
                                            <li><a href="javascript:void(0);"><img
                                                        src="{{URL::asset('build/img/icons/emoj-icon-04.svg')}}"
                                                        alt="Icon"></a></li>
                                            <li><a href="javascript:void(0);"><img
                                                        src="{{URL::asset('build/img/icons/emoj-icon-05.svg')}}"
                                                        alt="Icon"></a></li>
                                            <li class="add-emoj"><a href="javascript:void(0);"><i
                                                        class="fa-solid fa-plus"></i></a></li>
                                        </ul>
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
                    <!-- /Chat -->

                    <!-- Hidden file inputs -->
                    <input type="file" id="imageFileInput" accept="image/*" style="display: none;">
                    <input type="file" id="documentFileInput" accept=".pdf,.doc,.docx,.txt" style="display: none;">

                </div>
            </div>
        </div>
    </div>
    <style>
        .hide-sm-chatbar {
            display: flex !important;
        }
        @media (max-width: 991px) {
            .hide-left-sidebar {
                display: none !important;
            }
        }
        .footer{
            display: none;
        }
    </style>
    <!-- /Page Content -->
@endsection
@push('scripts')
<script>
$(document).ready(function() {
    let currentConversationId = null;
    let messagePollingInterval = null;
    let previousMessageCount = 0;
    let userScrolledUp = false;

    // Track user scroll position
    const chatContainer = $('#chatMessagesContainer');
    
    chatContainer.on('scroll', function() {
        const scrollTop = chatContainer.scrollTop();
        const scrollHeight = chatContainer[0].scrollHeight;
        const clientHeight = chatContainer[0].clientHeight;
        
        // User is scrolled up if they're not at the bottom (with 50px threshold)
        userScrolledUp = (scrollTop + clientHeight) < (scrollHeight - 50);
    });

    // Auto-select first conversation if available
    @if(count($conversations) > 0)
        setTimeout(function() {
            const firstConversation = $('.user-list-item').first();
            if (firstConversation.length) {
                const conversationId = firstConversation.data('conversation-id');
                const doctorName = firstConversation.find('h5').text();
                
                currentConversationId = conversationId;
                $('#conversationId').val(conversationId);
                $('#selectedDoctorName').text(doctorName);
                
                loadMessages(conversationId);
                
                if (messagePollingInterval) {
                    clearInterval(messagePollingInterval);
                }
                // messagePollingInterval = setInterval(() => {
                //     if (currentConversationId) {
                //         loadMessages(currentConversationId, true);
                //     }
                // }, 30000);
            }
        }, 100);
    @endif

    // Handle conversation selection
    $('.conversation-item').click(function() {
        const li = $(this).closest('li');
        const conversationId = li.data('conversation-id');
        const doctorName = li.find('h5').text();
        
        currentConversationId = conversationId;
        $('#conversationId').val(conversationId);
        $('#selectedDoctorName').text(doctorName);
        
        // Reset scroll tracking when switching conversations
        userScrolledUp = false;
        previousMessageCount = 0;
        
        // Load messages for this conversation
        loadMessages(conversationId);
        
        // Remove active class from all and add to selected
        $('.user-list li').removeClass('active');
        li.addClass('active');
        
        // Clear any existing polling and start new one
        if (messagePollingInterval) {
            clearInterval(messagePollingInterval);
        }
        // messagePollingInterval = setInterval(() => {
        //     if (currentConversationId) {
        //         loadMessages(currentConversationId, true);
        //     }
        // }, 3000);
    });
    
    // Function to check if image URL is valid
    function isValidImageUrl(url) {
        if (!url || url === '' || url === 'null' || url === 'undefined') {
            return false;
        }
        return true;
    }
    
    // Load messages function
    function loadMessages(conversationId, isPolling = false) {
        $.ajax({
            url: '/conversation/' + conversationId + '/messages',
            type: 'GET',
            success: function(response) {
                if (response.messages) {
                    const oldMessageCount = previousMessageCount;
                    const newMessageCount = response.messages.length;
                    
                    renderMessages(response.messages);
                    
                    if (!isPolling) {
                        // Initial load or manual refresh - scroll to bottom
                        scrollToBottom();
                    } else {
                        // During polling, only scroll if user is at bottom AND new messages arrived
                        const hasNewMessages = newMessageCount > oldMessageCount;
                        if (hasNewMessages && !userScrolledUp) {
                            scrollToBottom();
                        }
                    }
                    
                    previousMessageCount = newMessageCount;
                }
            },
            error: function(xhr) {
                console.error('Error loading messages:', xhr);
            }
        });
    }
    
    // Render messages in the chat view
    function renderMessages(messages) {
        if (!messages || messages.length === 0) {
            $('#messagesList').html('<div class="text-center text-muted">No messages yet. Start a conversation!</div>');
            return;
        }
        
        let html = '';
        let lastDate = null;
        
        messages.forEach(function(message) {
            // Add date separator if date changed
            const messageDate = new Date(message.timestamp);
            const currentDateStr = messageDate.toLocaleDateString();
            if (lastDate !== currentDateStr) {
                html += `<div class="chat-line"><span class="chat-date">${currentDateStr}</span></div>`;
                lastDate = currentDateStr;
            }
            
            const isOwnMessage = message.senderId === "{{ current_user()['uid'] }}";
            const timeString = new Date(message.timestamp).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
            
            html += `<div class="chats ${isOwnMessage ? 'chats-right' : ''}">`;
            html += `<div class="chat-avatar">`;
            if (isOwnMessage) {
                html += `<i class="fa-solid fa-user" style="font-size: 32px; color: #28a745;"></i>`;
            } else {
                html += `<i class="fa-solid fa-user-doctor" style="font-size: 32px; color: #007bff;"></i>`;
            }
            html += `</div>`;
            html += `<div class="chat-content">`;
            html += `<div class="chat-profile-name ${isOwnMessage ? 'text-end justify-content-end' : ''}">`;
            html += `<h6>${isOwnMessage ? 'You' : message.senderName || 'Doctor'}<span>${timeString}</span></h6>`;
            html += `</div>`;
            html += `<div class="message-content">`;
            
            // Handle different message types
            if (message.type === 'image' || (message.text === '📷 Photo' && message.imageUrl)) {
                const imageUrl = message.imageUrl;
                if (isValidImageUrl(imageUrl)) {
                    // Add cache-busting parameter to prevent infinite loading
                    const imageWithCache = imageUrl + (imageUrl.includes('?') ? '&t=' : '?t=') + Date.now();
                    html += `<div class="image-download-col">`;
                    html += `<div class="message-image-wrapper">`;
                    html += `
                        <img src="${escapeHtml(imageWithCache)}" 
                            alt="Image" 
                            class="message-image"
                            style="max-width: 200px; max-height: 200px; border-radius: 8px; cursor: pointer;"
                            onerror="handleImageError(this)">
                        `;
                    html += `</div>`;
                    html += `<div class="mt-1">`;
                    html += `<a href="${escapeHtml(imageUrl)}" download class="btn btn-sm btn-outline-primary mt-1">Download Image</a>`;
                    html += `</div>`;
                    html += `</div>`;
                } else {
                    // Show broken image placeholder
                    html += `<div class="image-error text-center p-3 border rounded">`;
                    html += `<i class="fa-solid fa-image-slash" style="font-size: 48px; color: #dc3545;"></i>`;
                    html += `<p class="text-danger mt-2 mb-0">Image not available or corrupted</p>`;
                    html += `</div>`;
                }
            } 
            else if (message.documentUrl) {
                // Document message
                const fileName = message.documentUrl.split('/').pop() || 'Document';
                const isValidDocument = isValidImageUrl(message.documentUrl);
                
                if (isValidDocument) {
                    html += `<div class="file-download d-flex align-items-center mb-0">`;
                    html += `<div class="file-type d-flex align-items-center justify-content-center me-2">`;
                    html += `<i class="fa-solid fa-file-lines"></i>`;
                    html += `</div>`;
                    html += `<div class="file-details">`;
                    html += `<span class="file-name">${escapeHtml(fileName)}</span>`;
                    html += `<ul class="mb-0">`;
                    html += `<li><a href="${escapeHtml(message.documentUrl)}" download class="download-link">Download</a></li>`;
                    html += `</ul>`;
                    html += `</div>`;
                    html += `</div>`;
                } else {
                    html += `<div class="file-error text-center p-3 border rounded">`;
                    html += `<i class="fa-solid fa-file-circle-exclamation" style="font-size: 32px; color: #ffc107;"></i>`;
                    html += `<p class="text-warning mt-2 mb-0">Document unavailable</p>`;
                    html += `</div>`;
                }
            }
            else if (message.text && message.text !== '📷 Photo') {
                // Plain text message
                html += `<p class="mb-0">${escapeHtml(message.text)}</p>`;
            }
            else if (message.text === '📷 Photo' && !message.imageUrl) {
                html += `<p class="mb-0 text-muted"><i class="fa-regular fa-image"></i> Photo shared (unavailable)</p>`;
            }
            
            html += `</div>`;
            html += `</div>`;
            html += `</div>`;
        });
        
        $('#messagesList').html(html);
        
        // Add click handlers for images to open in new tab
        $('.message-image').click(function() {
            // Extract original URL without cache busting
            const src = $(this).attr('src');
            if (src) {
                const originalUrl = src.split('?')[0];
                window.open(originalUrl, '_blank');
            }
        });
    }
    
    // Helper function to escape HTML
    function escapeHtml(text) {
        if (!text) return '';
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }
    
    // Scroll to bottom of chat
    function scrollToBottom() {
        setTimeout(function() {
            const chatBody = $('#chatMessagesContainer');
            if (chatBody.length) {
                chatBody.scrollTop(chatBody[0].scrollHeight);
            }
        }, 100);
    }
    
    // Send message handler
    $('#messageForm').submit(function(e) {
        e.preventDefault();
        
        const conversationId = $('#conversationId').val();
        const messageText = $('#messageText').val().trim();
        
        if (!conversationId) {
            alert('Please select a conversation first');
            return;
        }
        
        if (!messageText) {
            return;
        }
        
        // Reset scroll tracking when sending a new message
        userScrolledUp = false;
        
        // Send text message
        $.ajax({
            url: '/conversation/' + conversationId + '/send',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                text: messageText,
                type: 'text'
            },
            success: function(response) {
                $('#messageText').val('');
                loadMessages(conversationId);
            },
            error: function(xhr) {
                console.error('Error sending message:', xhr);
                alert('Failed to send message');
            }
        });
    });
    
    // Image attachment handler
    $('#attachImageBtn').click(function(e) {
        e.preventDefault();
        $('#imageFileInput').click();
    });
    
    $('#imageFileInput').change(function(e) {
        const file = e.target.files[0];
        if (!file) return;
        
        const conversationId = $('#conversationId').val();
        if (!conversationId) {
            alert('Please select a conversation first');
            return;
        }
        
        // Reset scroll tracking when uploading
        userScrolledUp = false;
        
        const formData = new FormData();
        formData.append('_token', '{{ csrf_token() }}');
        formData.append('file', file);
        formData.append('type', 'image');
        
        $.ajax({
            url: '/conversation/' + conversationId + '/send',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                loadMessages(conversationId);
                $('#imageFileInput').val('');
            },
            error: function(xhr) {
                console.error('Error uploading image:', xhr);
                alert('Failed to upload image');
                $('#imageFileInput').val('');
            }
        });
    });
    
    // Document attachment handler
    $('#attachDocumentBtn').click(function(e) {
        e.preventDefault();
        $('#documentFileInput').click();
    });
    
    $('#documentFileInput').change(function(e) {
        const file = e.target.files[0];
        if (!file) return;
        
        const conversationId = $('#conversationId').val();
        if (!conversationId) {
            alert('Please select a conversation first');
            return;
        }
        
        // Reset scroll tracking when uploading
        userScrolledUp = false;
        
        const formData = new FormData();
        formData.append('_token', '{{ csrf_token() }}');
        formData.append('file', file);
        formData.append('type', 'document');
        
        $.ajax({
            url: '/conversation/' + conversationId + '/send',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                loadMessages(conversationId);
                $('#documentFileInput').val('');
            },
            error: function(xhr) {
                console.error('Error uploading document:', xhr);
                alert('Failed to upload document');
                $('#documentFileInput').val('');
            }
        });
    });
    
    // Clean up polling on page unload
    $(window).on('beforeunload', function() {
        if (messagePollingInterval) {
            clearInterval(messagePollingInterval);
        }
    });
});
</script>
@endpush