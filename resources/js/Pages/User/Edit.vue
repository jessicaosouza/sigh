<template>
    <Head>
        <title>Editar Usuário</title>
        <meta type="description" content="Editar Usuário" head-key="description">
    </Head>
    <div class="md:mx-auto xl:mx-auto 2xl:mx-auto 2xl:max-w-7xl xl:max-w-7xl lg:max-w-5xl md:max-w-3xl sm:max-w-xl pt-16 xs:mx-2">
        <div class="flex">
            <Link href="/users">
                <svg class="hover:text-indigo-400 cursor-pointer fill-current text-gray-800 mr-1" width="30" height="30" enable-background="new 0 0 24 24"  viewBox="0 0 24 24" ><path d="m7.4 12 4.3-4.3c.4-.4.4-1 0-1.4s-1-.4-1.4 0l-5 5c-.4.4-.4 1 0 1.4l5 5c.2.2.5.3.7.3s.5-.1.7-.3c.4-.4.4-1 0-1.4zm7 0 4.3-4.3c.4-.4.4-1 0-1.4s-1-.4-1.4 0l-5 5c-.4.4-.4 1 0 1.4l5 5c.2.2.5.3.7.3s.5-.1.7-.3c.4-.4.4-1 0-1.4z"/></svg>
            </Link>
            <h1 class="text-3xl font-bold text-gray-800">Editar Usuário</h1>
        </div>
        <form @submit.prevent="submit" class=" xl:mx-10 2xl:mx-0 flex flex-col justify-center px-10 pt-5 pb-10 shadow-md rounded-md">
            <div class="lg:flex">
                <div class="lg:flex lg:flex-col lg:w-1/2  mb-4 lg:mr-1">
                    <sigh-label>Nome</sigh-label>
                    <sigh-input class=" w-full" type="text" v-model="form.name" />
                    <div class="text-xs text-red-600 font-semibold" v-if="form.errors.name">{{ form.errors.name }}</div>
                </div>

                <div class="lg:flex lg:flex-col lg:w-1/2 mb-4 lg:ml-1">
                    <sigh-label>E-mail</sigh-label>
                    <sigh-input class="w-full" type="email" v-model="form.email"  />
                    <div class="text-xs text-red-600 font-semibold" v-if="form.errors.email">{{ form.errors.email }}</div>
                </div>
            </div>
            <div class="lg:flex">
                <div class="lg:flex lg:flex-col lg:w-1/2  mb-4 lg:mr-1">
                    <sigh-label>CPF</sigh-label>
                    <sigh-input class=" w-full" type="text" v-mask="['###.###.###-##']" v-model="form.cpf"/>
                    <div class="text-xs text-red-600 font-semibold" v-if="form.errors.cpf">{{ form.errors.cpf }}</div>
                </div>

                <div class="lg:flex lg:flex-col lg:w-1/2 mb-4 lg:ml-1">
                    <sigh-label>RG</sigh-label>
                    <sigh-input class="w-full" type="text" v-mask="'##.###.###-#'" v-model="form.rg" />
                    <div class="text-xs text-red-600 font-semibold" v-if="form.errors.rg">{{ form.errors.rg }}</div>
                </div>
            </div>
            <div class="lg:flex">
                <div class="lg:flex lg:flex-col lg:w-1/2  mb-4 lg:mr-1">
                    <sigh-label>CNH</sigh-label>
                    <sigh-input class=" w-full" type="text" v-model="form.cnh" placeholder="CNH" />
                    <div class="text-xs text-red-600 font-semibold" v-if="form.errors.cnh">{{ form.errors.cnh }}</div>
                </div>

                <div class="lg:flex lg:flex-col lg:w-1/2 mb-4 lg:ml-1">
                    <sigh-label>Cópia CNH</sigh-label>
                    <input class="w-full" type="file" @change="addFile($event)" ref="cnh_file"  />
                    <div class="text-xs text-red-600 font-semibold" v-if="form.errors.cnh_file">{{ form.errors.cnh_file }}</div>
                </div>
            </div>
            <div class="lg:flex">
                <div class="lg:flex lg:flex-col lg:w-1/2  mb-4 lg:mr-1">
                    <sigh-label>Nível</sigh-label>
                    <select v-model="form.level_id" class="w-full border border-old-silver focus:border-ruby-300 focus:ring focus:ring-ruby-200 h-10 pl-4 rounded shadow-sm">
                        <option value="">Selecionar</option>
                        <option v-for="level in levels" :key="level.id" :value="level.id">{{ level.name }}</option>
                    </select>
                    <div class="text-xs text-red-600 font-semibold" v-if="form.errors.level_id">{{ form.errors.level_id }}</div>
                </div>

                <div class="lg:flex lg:flex-col lg:w-1/2 mb-4 lg:ml-1">
                    <sigh-label>Cargo</sigh-label>
                    <select v-model="form.role_id" class="w-full border border-old-silver focus:border-ruby-300 focus:ring focus:ring-ruby-200 h-10 pl-4 rounded shadow-sm">
                        <option value="">Selecionar</option>
                        <option v-for="role in roles" :key="role.id" :value="role.id">{{ role.name }}</option>
                    </select>
                    <div class="text-xs text-red-600 font-semibold" v-if="form.errors.role_id">{{ form.errors.role_id }}</div>
                </div>
            </div>

            <sigh-button type="submit" :disabled="form.processing">
                <span v-if="form.processing" class="fi fi-br-spinner animate-spin" />
                <p v-if="!form.processing">Salvar</p>
            </sigh-button>
        </form>
    </div>
</template>
<script>
    import { useForm } from '@inertiajs/inertia-vue3'
    import SighButton from '../../Components/Button.vue'
    import SighInput from '../../Components/Input.vue'
    import SighLabel from '../../Components/Label.vue'

    export default {
        components: { SighButton, SighInput, SighInput, SighLabel },

        props: {
            user: Object,
            levels: Array,
            roles: Array
        },

        setup () {
            const form = useForm({
                'name': '',
                'email': '',
                'cpf': '',
                'rg': '',
                'cnh': '',
                'department_id': '',
                'role_id': '',
                'level_id': '',
            })

            return { form }
        },

        methods: {
            submit(){
                this.form.put(`/users/${this.user.id}`)
            },
        },

        mounted(){
            this.form.name = this.user.name
            this.form.email = this.user.email
            this.form.rg = this.user.rg
            this.form.cpf = this.user.cpf
            this.form.cnh = this.user.cnh
            this.form.level_id = this.user.level_id
            this.form.role_id = this.user.role_id
        }
    }
</script>