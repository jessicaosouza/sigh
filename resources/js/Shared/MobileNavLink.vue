<template>
    <Link  class="text-old-silver" :class="{'font-bold underline': active}">
        <slot />
    </Link>
</template>
<script>

    export default {
        props: {
            active: Boolean
        },
    }

</script>