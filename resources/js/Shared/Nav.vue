<template>
    <div class="flex flex-col">
        <div @click="showOptions" class="show_options"><span class="text-xl fi-br-menu-burger cursor-pointer text-stale-white"  /></div>
        <nav v-if="!hidden" class="nav_options absolute right-0 mt-8 bg-stale-white py-4 rounded w-full">
            <ul class="nav_options flex flex-col space-y-4 mx-4">
                <li><NavLink @click="closeOptions" href="/dashboard" :active="$page.component === 'Dashboard'">Dashboard</NavLink></li>
                <li><NavLink @click="closeOptions" href="/assets" :active="isAssetActive">Recursos</NavLink></li>
                <li><NavLink @click="closeOptions" href="/companies" :active="isCompanyActive">Empresas</NavLink></li>
                <li><NavLink @click="closeOptions" href="/departments" :active="isDepartmentActive">Departamentos</NavLink></li>
                <li><NavLink @click="closeOptions" href="/loans" :active="isLoanActive">Empréstimos</NavLink></li>
                <li><NavLink @click="closeOptions" href="/roles" :active="isRoleActive">Cargos</NavLink></li>
                <li><NavLink @click="closeOptions" href="/users" :active="isUserActive">Usuários</NavLink></li>
                <li><NavLink @click="closeOptions" href="/profile" :active="isProfileActive">Perfil</NavLink></li>
                <li><NavLink @click="closeOptions" href="/logout" :data="{ foo: 'bar'}" method="post" as="button">Logout</NavLink></li>
            </ul>
        </nav>
    </div>
</template>
<script>

    import NavLink from "./NavLink.vue"

    export default {
        components: { NavLink },
        data(){
            return {
                hidden: true
            }
        },
        methods: {
            closeOptions(){
                setTimeout(() => {
                    this.hidden = true
                }, 1000); // 👈️ time in milliseconds
            },
            showOptions(){
                this.hidden = !this.hidden
            },
            closeWhenClickedOutside(event){
                if( !event.target.closest('.nav_options') && !event.target.closest('.show_options') ){
                    this.hidden = true
                }
            },

            isAssetActive(){
                return this.$page.component === 'Asset/Index' || this.$page.component === 'Asset/Show' ||
                this.$page.component === 'Asset/Create' || this.$page.component === 'Asset/Edit'
            },

            isCompanyActive(){
                return this.$page.component === 'Company/Index' || this.$page.component === 'Company/Show' ||
                this.$page.component === 'Company/Create' || this.$page.component === 'Company/Edit'
            },

            isDepartmentActive(){
                return this.$page.component === 'Department/Index' || this.$page.component === 'Department/Show' ||
                this.$page.component === 'Department/Create' || this.$page.component === 'Department/Edit'
            },

            isLoanActive(){
                return this.$page.component === 'Loan/Index' || this.$page.component === 'Loan/Show' ||
                this.$page.component === 'Loan/Create' || this.$page.component === 'Loan/Edit'
            },

            isRoleActive(){
                return this.$page.component === 'Role/Index' || this.$page.component === 'Role/Show' ||
                this.$page.component === 'Role/Create' || this.$page.component === 'Role/Edit'
            },

            isUserActive(){
                return this.$page.component === 'User/Index' || this.$page.component === 'User/Show' ||
                this.$page.component === 'User/Create' || this.$page.component === 'User/Edit'
            },

            isProfileActive(){
                return this.$page.component === 'User/Profile' || this.$page.component === 'User/UpdateProfile'
            },
        },

        mounted(){
            document.addEventListener('click', this.closeWhenClickedOutside)
        }
    }
</script>