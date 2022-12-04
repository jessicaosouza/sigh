<template>
    <div class="h-screen bg-new-york-pink absolute left-0 overflow-y-scroll">
        <div class="flex 2xl:items-center lg:mx-4 2xl:mx-12 lg:pt-10 2xl:pt-10 text-gray-800">
            <div class="w-12 h-12 bg-gray-300 rounded-full flex items-center justify-center mr-1">{{ initials }}</div>
            <div>
                <p class="font-bold text">Olá,</p>
                <p class="leading-tight tracking-wide uppercase text-sm"> {{ username }} 👋🏻</p>
            </div>
        </div>
        <hr class="lg:mx-4 2xl:mx-12 mt-5">
        <ul class="lg:mx-4 2xl:mx-12 mt-10">
            <li>
                <p class="text-xs mt-4 text-gray-800 font-semibold">Menu:</p>
            </li>
            <Link href="/dashboard" ><li :class="{'bg-pale-pink': $page.component === 'Dashboard'}" class="py-3 hover:cursor-pointer hover:bg-pale-pink rounded-md text-gray-800 font-semibold text-lg">Dashboard</li></Link>
            <Link href="/assets" ><li :class="{'bg-pale-pink': isAssetActive()}" class="py-3 hover:cursor-pointer hover:bg-pale-pink rounded-md text-gray-800 font-semibold text-lg">Recursos</li></Link>
            <Link href="/companies" ><li :class="{'bg-pale-pink': isCompanyActive()}" class="py-3 hover:cursor-pointer hover:bg-pale-pink rounded-md text-gray-800 font-semibold text-lg">Empresas</li></Link>
            <Link href="/departments" ><li :class="{'bg-pale-pink': isDepartmentActive()}" class="py-3 hover:cursor-pointer hover:bg-pale-pink rounded-md text-gray-800 font-semibold text-lg">Departamentos</li></Link>
            <Link href="/loans" ><li :class="{'bg-pale-pink': isLoanActive() }" class="py-3 hover:cursor-pointer hover:bg-pale-pink rounded-md text-gray-800 font-semibold text-lg">Empréstimos</li></Link>
            <Link href="/users" ><li :class="{'bg-pale-pink': isUserActive() }" class="py-3 hover:cursor-pointer hover:bg-pale-pink rounded-md text-gray-800 font-semibold text-lg">Usuários</li></Link>
        </ul>
        <hr class="lg:mx-4 2xl:mx-12 mt-5">
        <ul class="lg:mx-4 2xl:mx-12 mt-10">
            <li>
                <p class="text-xs mt-4 text-gray-800 font-semibold">Sistema:</p>
            </li>
            <li class="flex py-3 hover:cursor-pointer hover:bg-pale-pink rounded-md text-gray-800 font-semibold text-lg">
                <svg class="fill-current text-gray-800" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="30" height="30"> <g> <path d="M34.283,384c17.646,30.626,56.779,41.148,87.405,23.502c0.021-0.012,0.041-0.024,0.062-0.036l9.493-5.483 c17.92,15.332,38.518,27.222,60.757,35.072V448c0,35.346,28.654,64,64,64s64-28.654,64-64v-10.944 c22.242-7.863,42.841-19.767,60.757-35.115l9.536,5.504c30.633,17.673,69.794,7.167,87.467-23.467 c17.673-30.633,7.167-69.794-23.467-87.467l0,0l-9.472-5.461c4.264-23.201,4.264-46.985,0-70.187l9.472-5.461 c30.633-17.673,41.14-56.833,23.467-87.467c-17.673-30.633-56.833-41.14-87.467-23.467l-9.493,5.483 C362.862,94.638,342.25,82.77,320,74.944V64c0-35.346-28.654-64-64-64s-64,28.654-64,64v10.944 c-22.242,7.863-42.841,19.767-60.757,35.115l-9.536-5.525C91.073,86.86,51.913,97.367,34.24,128s-7.167,69.794,23.467,87.467l0,0 l9.472,5.461c-4.264,23.201-4.264,46.985,0,70.187l-9.472,5.461C27.158,314.296,16.686,353.38,34.283,384z M256,170.667 c47.128,0,85.333,38.205,85.333,85.333S303.128,341.333,256,341.333S170.667,303.128,170.667,256S208.872,170.667,256,170.667z"/> </g> </svg>
                <p class="ml-2">Configurações</p>
            </li>
            <Link href="/profile" >
                <li :class="{'bg-pale-pink': $page.component === 'User/Profile'}" class="flex py-3 hover:cursor-pointer hover:bg-pale-pink rounded-md text-gray-800 font-semibold text-lg">
                    <svg class="fill-current text-gray-800" width="30" height="30" viewBox="0 0 32 32"  xmlns="http://www.w3.org/2000/svg"><g id="Layer_2" data-name="Layer 2"><path d="m16 17a6 6 0 1 1 6-6 6 6 0 0 1 -6 6zm0-10a4 4 0 1 0 4 4 4 4 0 0 0 -4-4z"/><path d="m16 31a15 15 0 0 1 -11.59-5.49l-.52-.64.52-.63a15 15 0 0 1 23.18 0l.52.63-.52.64a15 15 0 0 1 -11.59 5.49zm-9.49-6.12a13 13 0 0 0 19 0 13 13 0 0 0 -19 0z"/><path d="m16 31a15 15 0 1 1 11.59-5.49 15 15 0 0 1 -11.59 5.49zm0-28a13 13 0 1 0 13 13 13 13 0 0 0 -13-13z"/><path d="m5.18 24.88s10.07 11.25 20.32 1.12l1.32-1.12s-8.56-8.88-17.25-3.55z"/><circle cx="16" cy="11" r="5"/></g></svg>
                    <p class="ml-2">Perfil</p>
                </li>
            </Link>
            <li></li>
        </ul>
        <hr class="lg:mx-4 2xl:mx-12 mt-5">
        <div class="hover:cursor-pointer items-center hover:bg-pale-pink lg:px-4 2xl:px-12 py-3  mt-5 absolute w-full flex bottom-0">
            <svg class="fill-current text-gray-800" width="30" height="30" viewBox="0 0 512.00533 512"  xmlns="http://www.w3.org/2000/svg"><path d="m320 277.335938c-11.796875 0-21.332031 9.558593-21.332031 21.332031v85.335937c0 11.753906-9.558594 21.332032-21.335938 21.332032h-64v-320c0-18.21875-11.605469-34.496094-29.054687-40.554688l-6.316406-2.113281h99.371093c11.777344 0 21.335938 9.578125 21.335938 21.335937v64c0 11.773438 9.535156 21.332032 21.332031 21.332032s21.332031-9.558594 21.332031-21.332032v-64c0-35.285156-28.714843-63.99999975-64-63.99999975h-229.332031c-.8125 0-1.492188.36328175-2.28125.46874975-1.027344-.085937-2.007812-.46874975-3.050781-.46874975-23.53125 0-42.667969 19.13281275-42.667969 42.66406275v384c0 18.21875 11.605469 34.496093 29.054688 40.554687l128.386718 42.796875c4.351563 1.34375 8.679688 1.984375 13.226563 1.984375 23.53125 0 42.664062-19.136718 42.664062-42.667968v-21.332032h64c35.285157 0 64-28.714844 64-64v-85.335937c0-11.773438-9.535156-21.332031-21.332031-21.332031zm0 0"/><path d="m505.75 198.253906-85.335938-85.332031c-6.097656-6.101563-15.273437-7.9375-23.25-4.632813-7.957031 3.308594-13.164062 11.09375-13.164062 19.714844v64h-85.332031c-11.777344 0-21.335938 9.554688-21.335938 21.332032 0 11.777343 9.558594 21.332031 21.335938 21.332031h85.332031v64c0 8.621093 5.207031 16.40625 13.164062 19.714843 7.976563 3.304688 17.152344 1.46875 23.25-4.628906l85.335938-85.335937c8.339844-8.339844 8.339844-21.824219 0-30.164063zm0 0"/></svg>
            <p class="ml-2">Sair</p>
        </div>
    </div>
</template>
<script>
    export default {
        computed: {
            initials(){
                const regex = /(?<!\p{L}\p{M}*)\p{L}/gu;
                let name = this.$page.props.auth.user.username
                return name.match(regex).join("")
            },

            username() {
                return this.$page.props.auth.user.username
            }
        },

        methods: {
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
        }
    }
</script>