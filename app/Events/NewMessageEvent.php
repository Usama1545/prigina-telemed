<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewMessageEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    // 🔥 Channel (important)
//todo need to revert this
    public function broadcastOn(): Channel
    {
        \Log::info('🔥 Broadcasting to chat.22');
        return new Channel('chat.22'); // ✅ public channel
    }

    // 🔥 Event name (frontend listens to this)
    public function broadcastAs(): string
    {
        return 'new.message';
    }

    // 🔥 Payload sent to frontend
    public function broadcastWith(): array
    {
        return [
            'messageId' => $this->data['messageId'] ?? null,
            'senderId' => $this->data['senderId'] ?? null,
            'receiverId' => $this->data['receiverId'] ?? null,
            'senderName' => $this->data['senderName'] ?? null,
            'text' => $this->data['text'] ?? null,
            'conversationId' => $this->data['conversationId'] ?? null,
            'createdAt' => $this->data['createdAt'] ?? null,
        ];
    }
}