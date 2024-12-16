<?php

namespace App\Enums;

enum TaskStatus: string
{
    case OPEN = 'open';
    case IN_PROGRESS = 'in_progress';
    case PENDING = 'pending';
    case WAITING_CLIENT = 'waiting_client';
    case BLOCKED = 'blocked';
    case CLOSED = 'closed';
}
