<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-yellow-400 leading-tight">
                Administration
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20 text-white bg-gray-800 border-b border-gray-700">
                        <div class="mt-8 text-2xl">
                            Rechercher un utilisateur
                        </div>

                        <div class="mt-6 text-gray-300">
                            Vous pouvez chercher un utilisateur à l'aide de son nom, pseudo, login EPITECH ou AnubisID.
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '../Layouts/AppLayout';

export default {
    components: {
        AppLayout
    }
}
</script>
