<template>
    <Head>
        <title>Recuperar Senha</title>
        <meta type="description" content="Recuperar Senha" head-key="description">
    </Head>
    <div class="h-screen w-screen flex items-center justify-center ">
        <div class="bg-pink-100 xs:hidden md:hidden xl:block">
            <svg class="absolute left-0 top-0 h-screen" viewBox="0 0 401 1015" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_225_2440)">
                <path d="M-425.922 -9L286.747 -9C249.645 46.6037 212.543 102.207 217.177 138.911C221.812 175.615 268.183 193.419 302.019 234.484C335.855 275.55 357.156 339.877 349.53 390.36C341.904 440.843 305.352 477.481 303.716 520.067C302.079 562.652 335.359 611.184 342.743 646.36C350.126 681.536 331.613 703.354 315.594 743.071C299.574 782.788 286.049 840.402 281.657 888.707C277.265 937.011 282.006 976.006 286.747 1015H-425.922L-425.922 -9Z" fill="#A2416B"/>
                <path d="M-404.59 -9L70.5233 -9C72.4351 46.8982 74.3468 102.796 92.5822 137.773C110.817 172.75 145.376 186.806 148.578 225.382C151.779 263.958 123.622 327.054 95.9758 373.293C68.3292 419.533 41.1924 448.915 36.5867 493.898C31.981 538.881 49.9065 599.464 38.2835 647.498C26.6606 695.532 -14.5107 731.016 9.43738 771.516C33.3855 812.015 122.453 857.53 143.487 898.947C164.521 940.363 117.522 977.682 70.5233 1015H-404.59L-404.59 -9Z" fill="#CC8488"/>
                </g>
                <defs>
                <clipPath id="clip0_225_2440">
                <rect width="1015" height="401" fill="white" transform="translate(401) rotate(90)"/>
                </clipPath>
                </defs>
            </svg>
        </div>
        <div class="max-w-sm w-full">

            <form @submit.prevent="submit" class="flex flex-col w-full justify-center">
                <div class="w-full flex items-center flex-col mb-10">
                    <logo-blue :icon_height="100" :icon_width="100" class="justify-center"/>
                    <p class="text-lg font-extrabold tracking-wide font-mono text-complementary-blue">SIGH</p>
                </div>
                <div class="mb-4">
                    <sigh-input class="w-full" type="text" v-model="form.email" placeholder="E-mail" />
                    <div class="text-xs text-red-600 font-semibold" v-if="form.errors.email">{{ form.errors.email }}</div>
                </div>

                <sigh-button type="submit" :disabled="form.processing">
                    <span v-if="form.processing" class="fi fi-br-spinner animate-spin" />
                    <p v-if="!form.processing">Enviar link de recuperação</p>
                </sigh-button>
            </form>
        </div>
    </div>
</template>
<script>
    import SighButton from '../../Components/Button.vue'
    import SighOutlinedAnchor from '../../Components/OutlinedAnchor.vue'
    import SighInput from '../../Components/Input.vue'
    import SighCheckbox from '../../Components/Checkbox.vue'
    import LayoutLogin from '../../Shared/LayoutLogin.vue'
    import { useForm } from '@inertiajs/inertia-vue3'
    import LogoBlue from '../../Components/LogoBlue.vue'

    export default {
        components: { SighButton, SighOutlinedAnchor, SighInput, SighCheckbox, LogoBlue },
        layout: LayoutLogin,
        setup () {
            const form = useForm({
                email: null,
                password: null,
                remember: false,
            })

            return { form }
        },

        data(){
            return{
                glogin: false
            }
        },

        methods: {
            submit(){
                if(this.glogin){
                    this.googleLogin()
                }else{
                    this.form.post('login')
                }

            },

            googleLogin(){
                this.form.get('auth/google')
            }
        }
    }
</script>