<?php

namespace App\Livewire;

use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

use Illuminate\Database\Eloquent\Builder;
class Chat extends Component
{
    public User $user;
    
    public $message = "";


    public function render()
    {
        return view('livewire.chat',[
            "pesan" => Message::where(function (Builder $query){
                $query->where('from_user_id', Auth::id())
                ->orWhere('to_user_id', $this->user->id);
            })->orWhere(function (Builder $query){
                $query->where('from_user_id', $this->user->id)
                    ->where('to_user_id', Auth::id());
            })->get()
        ]);
    }

    public function sendMessage() {
        Message::create([
            "from_user_id" => auth()->id(),
            "to_user_id" => $this->user->id,
            "message" => $this->message
        ]);

        $this->reset('message');
    }
}
