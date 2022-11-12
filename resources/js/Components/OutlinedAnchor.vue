<template>
    <a :href="href" class=" border-ruby-900 hover:bg-ruby-500 active:bg-ruby-900 focus:border-ruby-900 focus:shadow-outline-ruby inline-flex items-center px-4 py-2  border-2 rounded font-semibold text-xs text-ruby-900 uppercase tracking-widest  focus:outline-none text-center  disabled:opacity-25 transition ease-in-out duration-150">
        <slot></slot>
    </a>
</template>

<script>
    export default {
        props: {
            href: {
                href: String,
                default: '#',
            },
        }
    }
</script>