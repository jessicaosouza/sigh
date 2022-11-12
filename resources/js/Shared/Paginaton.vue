<template>
    <div class="mt-6">
        <Component
            class="px-2 py-2 border border-ruby-900 rounded-lg text-center"
            :class="{
                'text-gray-500': !link.url,
                'font-bold text-ruby-900': link.active
            }"
            :is="link.url ? 'Link' : 'span' "
            v-for="(link,idx) in links"
            :key="idx"
            :href="link.url" v-html="link.label"
        />

    </div>
</template>
<script>
    export default {
        props: {
            links: Array
        }
    }
</script>