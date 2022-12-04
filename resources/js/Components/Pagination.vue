<template>
    <div>
        <Component
            :is="link.url ? 'Link' : 'span'"
            v-for="(link,idx) in links"
            :key="idx"
            :href="link.url"
            v-html="link.label"
            class=" mb-1 px-4 py-3 text-sm leading-4 border-2 cursor-pointer  hover:bg-white border-ruby-900  focus:text-gray-700"
            :class="{
                'text-gray-400': !link.url,
                'rounded-l-lg': idx===0,
                'rounded-r-lg': idx === (links.length-1)
            }"
        />
    </div>
</template>
<script>
    export default {
        props: {
            links: { type: Array}
        }
    }
</script>