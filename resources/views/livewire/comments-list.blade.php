<div>
    <x-forms.label for="comment">Comment this news</x-forms.label>
    <form action="" method="post">
        <textarea 
            name="comment" 
            rows="4" 
            class="border border-gray-400 w-full p-4" 
            placeholder="Please, write your thoughts in here..">
        </textarea>      
        <x-buttons.confirm-blue>Save comment</x-buttons.confirm-blue>  

    </form>
    <p class="font-bold text-gray-600 mt-5">Release's comments</p>
    @forelse ($comments as $comment)
        <p class="my-2 text-gray-500">
            {{$comment->id}}        
        </p>

    @empty
        <x-alerts.red-alert>
            There aren't no comments yet!
        </x-alerts.red-alert>
    @endforelse
</div>
