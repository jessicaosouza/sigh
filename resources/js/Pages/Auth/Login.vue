<template>
    <Head>
        <title>Login</title>
        <meta type="description" content="Login" head-key="description">
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
                    <sigh-input class=" w-full" type="text" v-model="form.email" placeholder="E-mail" />
                    <div class="text-xs text-red-600 font-semibold" v-if="form.errors.email">{{ form.errors.email }}</div>
                </div>

                <div class="mb-1">
                    <div >
                        <label class="flex relative items-center">
                            <sigh-input class="w-full" :type="show_password ? 'password' : 'text'  " v-model="form.password" placeholder="Senha"  />
                            <span @click="show_password = !show_password" class="text-lg absolute mx-2 pt-2 z-50 cursor-pointer right-0 fi fi-br-eye-crossed text-black" />
                        </label>
                    </div>
                    <div class="text-xs text-red-600 font-semibold" v-if="form.errors.password">{{ form.errors.password }}</div>
                </div>

                <div class="mb-4 flex justify-between">
                    <div class="flex flex-wrap">
                        <sigh-checkbox v-model="form.remember"  class="my-2 mr-2"></sigh-checkbox>
                        <span class="mt-1">Lembrar</span>
                    </div>
                    <Link href="reset-password" class="flex items-center cursor-pointer">
                        <span class="fi fi-br-lock mr-1" />
                        <p class="underline">Esqueci minha senha</p>
                    </Link>
                </div>

                <sigh-outlined-anchor href="auth/google" class="flex items-center justify-center mb-2">
                    <svg width="15" height="15" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"> <path style="fill:#167EE6;" d="M492.668,211.489l-208.84-0.01c-9.222,0-16.697,7.474-16.697,16.696v66.715 c0,9.22,7.475,16.696,16.696,16.696h117.606c-12.878,33.421-36.914,61.41-67.58,79.194L384,477.589 c80.442-46.523,128-128.152,128-219.53c0-13.011-0.959-22.312-2.877-32.785C507.665,217.317,500.757,211.489,492.668,211.489z"/> <path style="fill:#12B347;" d="M256,411.826c-57.554,0-107.798-31.446-134.783-77.979l-86.806,50.034 C78.586,460.443,161.34,512,256,512c46.437,0,90.254-12.503,128-34.292v-0.119l-50.147-86.81 C310.915,404.083,284.371,411.826,256,411.826z"/> <path style="fill:#0F993E;" d="M384,477.708v-0.119l-50.147-86.81c-22.938,13.303-49.48,21.047-77.853,21.047V512 C302.437,512,346.256,499.497,384,477.708z"/> <path style="fill:#FFD500;" d="M100.174,256c0-28.369,7.742-54.91,21.043-77.847l-86.806-50.034C12.502,165.746,0,209.444,0,256 s12.502,90.254,34.411,127.881l86.806-50.034C107.916,310.91,100.174,284.369,100.174,256z"/> <path style="fill:#FF4B26;" d="M256,100.174c37.531,0,72.005,13.336,98.932,35.519c6.643,5.472,16.298,5.077,22.383-1.008 l47.27-47.27c6.904-6.904,6.412-18.205-0.963-24.603C378.507,23.673,319.807,0,256,0C161.34,0,78.586,51.557,34.411,128.119 l86.806,50.034C148.202,131.62,198.446,100.174,256,100.174z"/> <path style="fill:#D93F21;" d="M354.932,135.693c6.643,5.472,16.299,5.077,22.383-1.008l47.27-47.27 c6.903-6.904,6.411-18.205-0.963-24.603C378.507,23.672,319.807,0,256,0v100.174C293.53,100.174,328.005,113.51,354.932,135.693z"/> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg>
                    <p class="ml-2">Entrar com conta Google</p>
                </sigh-outlined-anchor>

                <sigh-button type="submit" :disabled="form.processing">
                    <span v-if="form.processing" class="fi fi-br-spinner animate-spin" />
                    <p v-if="!form.processing">Login</p>
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
                show_password: true
            }
        },

        methods: {
            submit(){
                this.form.post('login')
            }
        }
    }
</script>