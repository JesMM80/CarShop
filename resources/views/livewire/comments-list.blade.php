<div>

    @if (session()->has('commentSaved'))
        <x-alerts.green>
            {{ session('commentSaved') }}
        </x-alerts.green>
    @endif

    <x-forms.label for="comment">Comment this news</x-forms.label>

    <form wire:submit.prevent="saveComment">

        <textarea 
            wire:model="comment" 
            rows="4" 
            class="border border-gray-400 w-full p-4" 
            placeholder="Please, write your thoughts in here..">
        </textarea>

        @error('comment')
            <x-alerts.red-alert>
                {{$message}}
            </x-alerts.red-alert>
        @enderror

        <div>
            <div class="mt-5">
        
                <label for="name">
                    User's name: 
                </label>
                <input 
                type="text" 
                wire:model="user_name" 
                placeholder="John AMG" 
                class="p-2 mb-5 border border-gray-400 w-full lg:w-2/4 rounded-lg">

                @error('user_name')
                    <x-alerts.red-alert>
                        {{$message}}
                    </x-alerts.red-alert>
                @enderror
            </div>
        </div> 

        <x-buttons.confirm-blue>Save comment</x-buttons.confirm-blue> 

    </form>

    <p class="font-bold text-gray-600 mt-5">Release's comments</p>

    @forelse ($comments as $comment)

        <p>{{$comment->user}}</p>
        <p class="my-2 text-gray-500">
            {{$comment->comment}}        
        </p>

    @empty

        <x-alerts.red-alert>
            There aren't no comments yet!
        </x-alerts.red-alert>
    
    @endforelse
    
</div>
