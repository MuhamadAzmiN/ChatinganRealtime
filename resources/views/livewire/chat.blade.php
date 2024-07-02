<div>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <div wire:poll>
                        @foreach ($pesan as $item)
                        <div class="chat @if($item->from_user_id == auth()->id()) chat-end @else chat-start @endif">
                            <div class="chat-image avatar">
                                <div class="w-10 rounded-full">
                                    <img
                                    alt="Tailwind CSS chat bubble component"
                                    src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                                </div>
                            </div>
                            <div class="chat-header">
                                {{ $item->fromUser->name}}
                                <time class="text-xs opacity-50">{{ $item->created_at->diffForHumans() }}</time>
                                
                            </div>
                            <div class="chat-bubble">{{ $item->message }}</div>
                            <div class="chat-footer opacity-50">Delivered</div>
                        </div>
                        
                        @endforeach
                         
                          
                          <form action="" wire:submit.prevent="sendMessage">
                                <textarea name="" id="" class="textarea textarea-border w-full" placeholder="send yout message" wire:model="message"></textarea>
                                <button class="submit btn btn-primary">send</button>
                           
                          </form>
                    </div>
                   

                </div>
            </div>
        </div>
    </div>


</div>
