<template>
    <div class="w-full">
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <Link :href="route('films.index')" :active="route().current('films.index')">
                Films
            </Link>
        </div>
        <slot />
    </div>
</template>

<script>
import { Link } from '@inertiajs/vue3';
export default {
    name: "MainLayout.vue",
    components: {
        Link
    }
}
</script>

<style scoped>

</style>
