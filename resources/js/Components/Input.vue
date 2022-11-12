<template>
    <input class="border border-old-silver focus:border-ruby-300 focus:ring focus:ring-ruby-200 h-10 pl-4 rounded shadow-sm" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" ref="input">
</template>

<script>
    export default {
        props: ['modelValue'],

        emits: ['update:modelValue'],

        methods: {
            focus() {
                this.$refs.input.focus()
            }
        }
    }
</script>

