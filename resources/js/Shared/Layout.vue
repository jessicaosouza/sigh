<template>
    <Head>
        <title>Sigh</title>
        <meta type="description" content="Sistema de gerenciamento de recursos humanos" head-key="description">
    </Head>
    <section class="p-6 bg-new-york-pink">
        <header class="flex justify-between">
            <div class="flex items-center">
                <h1 class="font-bolt text-lg text-stale-white">Logo</h1>
                <p class="text-sm ml-4 text-stale-white">
                    Bem-vindo, {{ username }}
                </p>
            </div>
            <Nav class="xl:hidden 2xl:hidden" />
        </header>
    </section>
    <section class="p-6">
        <div class="max-w-3xl mx-auto">
            <slot />
        </div>
    </section>
</template>

<script>

    import Nav from "../Shared/Nav.vue"

    export default {
        components: { Nav },

        computed: {
            username() {
                return this.$page.props.auth.user.username
            }
        }
    }
</script>