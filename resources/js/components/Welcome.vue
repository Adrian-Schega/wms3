<template>
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden">
            <div class="p-8">
                <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">
                    Laravel 12 + Vue 3 + PostgreSQL
                </div>
                <h1 class="block mt-1 text-lg leading-tight font-medium text-black">
                    Welcome to WMS3
                </h1>
                <p class="mt-2 text-gray-500">
                    {{ message }}
                </p>
                <button 
                    @click="incrementCounter" 
                    class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                >
                    Clicked {{ count }} times
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Welcome',
    data() {
        return {
            message: 'Your Laravel 12 + Vue 3 + PostgreSQL application is ready!',
            count: 0
        }
    },
    methods: {
        incrementCounter() {
            this.count++;
        }
    }
}
</script>