<template>
    <Head>
        <title>Empréstimos</title>
        <meta type="description" content="Empréstimos" head-key="description">
    </Head>
    <div class="flex justify-between mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Empréstimos</h1>
        <sigh-input v-model="search" type="text" placeholder="Buscar..." />
    </div>

    <div class="flex flex-col">
        <div class="-m-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr v-for="loan in loans.data" :key="loan.id">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ loan.observations }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <Link :href="`/loans/${loan.id}/edit`" class="text-ruby-900 hover:text-ruby-700">Editar</Link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Paginator -->
    <Pagination v-if="total()" :resource="'loans'" :data="loans" class="mt-6" />
</template>
<script>

    import Pagination from "../../Components/Pagination.vue"
    import SighInput from "../../Components/Input.vue"
    import debounce from 'lodash/debounce'
    import { Inertia } from '@inertiajs/inertia'

    export default {
        components: { Pagination, SighInput },
        props: {
            loans: Object,
            filters: Object
        },
        data(){
            return {
                search: this.filters.search
            }
        },


        watch:{
            search: function (value) {
                this.getLoans(value)
            },
        },

        methods: {
            getLoans: debounce(
                async (search) => {
                    Inertia.get('/loans', { search: search }, {
                        preserveState: true,
                        replace: true
                    })
                },
                300
            ),

            total(){
                return this.loans.total > 10
            }
        }
    }
</script>