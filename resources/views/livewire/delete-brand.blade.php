<div class="text-center w-3/5 mx-auto my-5">
    <button 
        wire:click="$dispatch('alertDeleteBrand',{{$brand_id}})"                        
        class="flex justify-center items-center p-2 bg-red-500 border rounded-md text-white w-full cursor-pointer hover:bg-red-800 transition duration-700 font-bold">
        Delete brand
    </button>
</div>
