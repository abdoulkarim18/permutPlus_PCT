@extends('layouts.master')

@section('dynamicPageTitle')
Notifications
@stop

@section('content')
<div>
    <main>
        <div>
            @include('message-flash')
        </div>
        <div class="notification">
            <div class="group">
                @if(auth()->user()->unreadNotifications!=null)
                @foreach(auth()->user()->unreadNotifications as $notification)
                        <div class="item">
                            <div class="message">{{ $notification->data['nom'] }} {{ $notification->data['prenoms'] }} {{ $notification->data['message'] }}</div>
                            <div class="button"><a href="{{ $notification->data['isAccepted'] !=0
                                ? route('messageAccepted', ['user' =>$notification->data['userId'],'id' => $notification->data['customRequestId'],
                                            'notification'=> $notification->id])
                                : route('notif.edit', ['user' =>$notification->data['userId'],'customRequest' => $notification->data['customRequestId'],
                            'notification'=> $notification->id]) }}">VOIR</a></div>
                        </div>
                @endforeach
                @endif
                @foreach(auth()->user()->readNotifications as $notification)
                        <div class="item">
                            <div class="message">{{ $notification->data['nom'] }} {{ $notification->data['prenoms'] }} {{ $notification->data['message'] }}</div>
                            <div class="button"><a href="{{ $notification->data['isAccepted'] !=0
                                ? route('messageAccepted', ['user' =>$notification->data['userId'], 'id' => $notification->data['customRequestId'],
                                            'notification'=> $notification->id])
                                : route('notif.edit', ['user' =>$notification->data['userId'], 'customRequest' => $notification->data['customRequestId'],
                            'notification'=> $notification->id]) }}">VOIR</a></div>
                        </div>
                @endforeach
                <!-- <div class="item">
                    <div class="message">Julien a accepté votre offre</div>
                    <div class="button"><a href="detail-apply.html">VOIR</a></div>
                </div>
                <div class="item">
                    <div class="message">Konan a réfusé votre offre</div>
                    <div class="button"><a href="detail-apply.html">VOIR</a></div>
                </div> -->
            </div>
        </div>

    </main>
</div>
@stop
