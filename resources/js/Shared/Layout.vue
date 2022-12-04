<template>
    <Head>
        <title>Sigh</title>
        <meta type="description" content="Sistema de gerenciamento de recursos humanos" head-key="description">
    </Head>
    <section class="p-6 xl:p-0 2xl:p-0 bg-new-york-pink xl:bg-transparent 2xl:bg-transparent">
        <header class="flex justify-between xl:hidden 2xl:hidden">
            <div class="flex items-center">
                <Link href="/dashboard"><logo-white class="absolute top-0 mt-5" :icon_width="35" :icon_height="35" /></Link>
                <p class="text-sm ml-10 text-stale-white">
                    Bem-vindo, {{ username }}
                </p>
            </div>
            <MobileNav class="xl:hidden 2xl:hidden" />

        </header>
    </section>
    <section class="flex w-screen h-screen">
        <Nav class="hidden sm:hidden md:hidden xl:w-2/12 2xl:w-2/12 lg:hidden xl:block 2xl:block" />
        <div class="h-screen w-screen xl:ml-from-nav" >
            <slot />
        </div>
    </section>
</template>
<script>
    import LogoWhite from '../Components/LogoWhite.vue'
    import MobileNav from "./MobileNav.vue"
    import Nav from "./Nav.vue"

    export default {
        components: { MobileNav, Nav, LogoWhite },

        computed: {
            username() {
                return this.$page.props.auth.user.username
            }
        }
    }
</script>