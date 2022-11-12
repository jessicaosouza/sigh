<template>
    <button :type="type" class="bg-ruby-900 hover:bg-ruby-800 active:bg-ruby-900 focus:border-ruby-900 focus:shadow-outline-ruby  px-4 py-2  border border-transparent rounded font-semibold text-xs text-white uppercase tracking-widest  focus:outline-none flex items-center justify-center  disabled:opacity-25 transition ease-in-out duration-150">
        <slot></slot>
    </button>
</template>

<script>
    export default {
        props: {
            type: {
                type: String,
                default: 'submit',
            },
        }
    }
</script>