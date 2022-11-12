<template>
    <div>
        <slot />
    </div>
    <div class="inset-center text-old-silver">
        @Copyright 2022 Sigh. Todos os direitos reservados
    </div>
</template>
<style>
    .inset-center {
        position: fixed;
        left: 50%;
        bottom: 20px;
        transform: translate(-50%, -50%);
        margin: 0 auto;
    }
</style>