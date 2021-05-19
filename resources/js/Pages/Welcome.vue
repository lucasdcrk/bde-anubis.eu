<template>
    <div class="relative flex items-top justify-center min-h-screen bg-black sm:items-center sm:pt-0">
        <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            <inertia-link v-if="$page.props.user" href="/dashboard" class="text-lg text-white underline">
                Panel utilisateur
            </inertia-link>

            <template v-else>
                <inertia-link :href="route('login')" class="text-lg text-white underline">
                    Connexion
                </inertia-link>

                <inertia-link v-if="canRegister" :href="route('register')" class="ml-4 text-lg text-white underline">
                    Inscription
                </inertia-link>
            </template>
        </div>

        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div>
                <img src="https://i.imgur.com/3XyvBTu.jpg" alt="">
            </div>
            <div class="flex justify-center my-5">
                <inertia-link :href="route('login')" class="text-xl text-yellow-400">
                    Accèder à la plateforme &rarr;
                </inertia-link>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            canLogin: Boolean,
            canRegister: Boolean,
            laravelVersion: String,
            phpVersion: String,
        }
    }
</script>
