<div id="messages">
    <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-envelope fa-fw"></i>
        <!-- Counter - Messages -->
        @if(count(Helper::messageList())>5)
            <span data-count="5" class="badge badge-danger badge-counter">5+</span>
        @else

            <span data-count="{{count(Helper::messageList())}}" class="badge badge-danger badge-counter">{{count(Helper::messageList())}}</span>

        @endif
    </a>

</div>


@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {

            Echo.channel('message')
                .listen('MessageSent', (e) => {

                    const message_container = $('#message-items');
                    const message_counter_area = $('#messages .count');
                    const message_counter = parseInt( $(message_counter_area).attr('data-count') ) + 1;
                    const message_length = parseInt( $('#message-items>.dropdown-item').length );
                    $(message_counter_area).attr('data-count', message_counter);

                    const data = `
      <a class="dropdown-item d-flex align-items-center message-item" href="${e.message.url}">
        <div class="dropdown-list-image mr-3">
          <img class="rounded-circle" src="${e.message.photo}" alt="${e.message.name}">
        </div>
        <div class="font-weight-bold">
          <div class="text-truncate">${e.message.subject}</div>
          <div class="small text-gray-500">${e.message.name} · ${e.message.date}</div>
        </div>
      </a>
      `;

                    $(message_container).prepend(data);

                    if(message_counter<=5){
                        $(message_counter_area).text( message_counter );
                    }else{
                        $(message_counter_area).text('5+');
                    };

                    if(message_length>=5) $(message_container).find('.message-item').last().remove();

                });

        });
    </script>
@endpush
