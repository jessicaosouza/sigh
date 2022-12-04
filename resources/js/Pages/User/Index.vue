<template>
    <Head>
        <title>Usuários</title>
        <meta type="description" content="Usuários" head-key="description">
    </Head>
    <div class="md:mx-auto xl:mx-auto 2xl:mx-auto 2xl:max-w-7xl xl:max-w-7xl lg:max-w-5xl md:max-w-3xl sm:max-w-xl pt-16 xs:mx-2">
        <div class="flex justify-between flex-col  md:flex-row mb-6">
            <div class="flex items-center justify-between mb-2 md:mb-0">
                <h1 class="text-3xl font-bold mr-1">Usuários</h1>
                <Link href="users/create" class="flex border-2 text-ruby-900 border-ruby-900 px-4 py-1 rounded " ><span class="flex text-ruby-900 text-xl mr-2 fi fi-br-user-add"><p class="text-base ml-1">Novo usuário</p></span></Link>
            </div>
            <sigh-input v-model="search" type="text" placeholder="Buscar..." />
        </div>

        <div class="flex flex-col">
            <div class="-m-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr v-for="user in users.data" :key="user.id">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ user.name }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class=" px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <Link :href="`/users/${user.id}/edit`" class="text-ruby-900 hover:text-ruby-700 mr-1">Editar</Link>
                                        <Link :href="`/users/${user.id}/show`" class="text-ruby-900 hover:text-ruby-700">Detalhes</Link>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Paginator -->
        <Pagination :links="users.links" class="mt-6" />
    </div>
</template>
<script>

    import Pagination from "../../Components/Pagination.vue"
    import SighInput from "../../Components/Input.vue"
    import debounce from 'lodash/debounce'
    import { Inertia } from '@inertiajs/inertia'

    export default {
        components: { Pagination, SighInput },
        props: {
            users: Object,
            filters: Object
        },
        data(){
            return {
                search: this.filters.search
            }
        },


        watch:{
            search: function (value) {
                this.getUsers(value)
            },
        },

        methods: {
            getUsers: debounce(
                async (search) => {
                    Inertia.get('/users', { search: search }, {
                        preserveState: true,
                        replace: true
                    })
                },
                300
            ),

            total(){
                return this.users.total > 10
            }
        }
    }
</script>