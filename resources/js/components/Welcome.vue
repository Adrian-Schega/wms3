<template>
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden">
            <div class="p-8">
                <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">
                    Laravel 12 + Vue 3 + PostgreSQL + Pinia
                </div>
                <h1 class="block mt-1 text-lg leading-tight font-medium text-black">
                    Welcome to {{ wmsStore.displayName }}
                </h1>
                <p class="mt-2 text-gray-500">
                    {{ message }}
                </p>
                <div class="mt-4 space-y-2">
                    <button 
                        @click="wmsStore.incrementClick" 
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2"
                    >
                        {{ wmsStore.clickMessage }}
                    </button>
                    <button 
                        @click="wmsStore.resetClick" 
                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded"
                    >
                        Reset Counter
                    </button>
                </div>
                <div class="mt-4 p-3 bg-gray-100 rounded">
                    <h3 class="font-semibold text-gray-700">WMS SaaS Features Ready:</h3>
                    <ul class="text-sm text-gray-600 mt-2 space-y-1">
                        <li>✅ Laravel Sanctum (API Authentication)</li>
                        <li>✅ Spatie Permissions (Role-based Access)</li>
                        <li>✅ Multi-tenancy Support</li>
                        <li>✅ Laravel Cashier (Stripe Integration)</li>
                        <li>✅ Pinia State Management</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { useWmsStore } from '../stores/wmsStore.js'

export default {
    name: 'Welcome',
    setup() {
        const wmsStore = useWmsStore()
        
        return {
            wmsStore
        }
    },
    data() {
        return {
            message: 'Your LiveWMS.pl SaaS application is ready for warehouse management!'
        }
    }
}
</script>