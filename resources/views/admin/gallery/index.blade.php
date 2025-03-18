<x-layouts.app :title="__('Gallery')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <h1 class="text-2xl font-bold mb-4">Photo Gallery Management</h1>        
        <!-- Album Management -->
        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-2">Albums</h2>
            <button class="px-4 py-2 bg-blue-500 text-white rounded">Add New Album</button>
            <div class="mt-4 space-y-2">
                <div class="flex justify-between p-4 bg-gray-200 dark:bg-gray-700 rounded">
                    <span>Album Name 1</span>
                    <div>
                        <button class="text-blue-600 dark:text-blue-400">Edit</button>
                        <button class="text-red-600 dark:text-red-400 ml-2">Delete</button>
                    </div>
                </div>
                <div class="flex justify-between p-4 bg-gray-200 dark:bg-gray-700 rounded">
                    <span>Album Name 2</span>
                    <div>
                        <button class="text-blue-600 dark:text-blue-400">Edit</button>
                        <button class="text-red-600 dark:text-red-400 ml-2">Delete</button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Photo Management -->
        <div>
            <h2 class="text-xl font-semibold mb-2">Photos</h2>
            <button class="px-4 py-2 bg-green-500 text-white rounded">Upload Photo</button>
            <div class="mt-4 grid grid-cols-3 gap-4">
                <div class="relative">
                    <img src="https://via.placeholder.com/150" class="rounded shadow">
                    <div class="absolute top-0 right-0 p-2">
                        <button class="text-red-600 dark:text-red-400">✖</button>
                    </div>
                </div>
                <div class="relative">
                    <img src="https://via.placeholder.com/150" class="rounded shadow">
                    <div class="absolute top-0 right-0 p-2">
                        <button class="text-red-600 dark:text-red-400">✖</button>
                    </div>
                </div>
                <div class="relative">
                    <img src="https://via.placeholder.com/150" class="rounded shadow">
                    <div class="absolute top-0 right-0 p-2">
                        <button class="text-red-600 dark:text-red-400">✖</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
