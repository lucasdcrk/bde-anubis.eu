<template>
    <div>
        <div class="p-6 sm:px-20 text-white bg-gray-800 border-b border-gray-700">
            <div class="mt-8 text-2xl">
                Bienvenue sur la plateforme du BDE Anubis !
            </div>

            <div class="mt-6 text-gray-300">
                Cette dernière vous permet de consulter les points que avez accumulé au cours d'activités au sein de l'école et de les échanger contre des lots.
                Vous pouvez également créer des équipes pour que les membre de votre team recoivent automatiquement leur récompense.
            </div>

            <div>
                <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
                    <div class="px-4 py-5 bg-gray-600 shadow rounded-lg overflow-hidden sm:p-6">
                        <dt class="text-sm font-medium text-gray-300 truncate">
                            Solde
                        </dt>
                        <dd class="mt-1 text-3xl font-semibold text-white">
                            {{ $page.props.user.balance }} Debens
                        </dd>
                    </div>

                    <div class="px-4 py-5 bg-gray-600 shadow rounded-lg overflow-hidden sm:p-6">
                        <dt class="text-sm font-medium text-gray-300 truncate">
                            Participations
                        </dt>
                        <dd class="mt-1 text-3xl font-semibold text-white">
                            0
                        </dd>
                    </div>

                    <div class="px-4 py-5 bg-gray-600 shadow rounded-lg overflow-hidden sm:p-6">
                        <dt class="text-sm font-medium text-gray-300 truncate">
                            Équipes
                        </dt>
                        <dd class="mt-1 text-3xl font-semibold text-white">
                            {{ $page.props.user.all_teams.length - 1 }}
                        </dd>
                    </div>
                </dl>
            </div>
        </div>

        <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
            <div class="p-6">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <div class="ml-4 text-lg text-gray-200 leading-7 font-semibold">Les Debens</div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-400">
                        Le deben est la monnaie utilisée par votre BDE (ainsi qu'en Égypte antique). Remportés lors d'events ils sont trocables contre des lots, boissons, des dons à des associations et plus encore.
                    </div>

                    <inertia-link v-if="false" :href="route('teams.create')">
                        <div class="mt-3 flex items-center text-sm font-semibold text-yellow-400">
                            Consulter mon solde &rarr;
                        </div>
                    </inertia-link>
                </div>
            </div>

            <div class="p-6 border-t border-gray-500 md:border-t-0 md:border-l">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <div class="ml-4 text-lg text-gray-200 leading-7 font-semibold">Équipes</div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-400">
                        Le système d'équipes permet une inscription facilitée aux différentes activités proposées, ainsi tous les membres seront récomponsés. Vous pouvez créer, supprimer et modifier des équipes librement.
                    </div>

                    <a v-if="false" href="#">
                        <div class="mt-3 flex items-center text-sm font-semibold text-yellow-200">
                            Créer une équipe (coming soon) &rarr;
                        </div>
                    </a>
                </div>
            </div>

            <div class="p-6 border-t border-gray-500">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div class="ml-4 text-lg text-gray-200 leading-7 font-semibold">Une question ?</div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-400">
                        Pour toute question concernant vos points ou pour les échanger contre une récompense, nous vous invitons à vous rapprocher d'un membre du BDE.
                    </div>
                </div>
            </div>

            <div class="p-6 border-t border-gray-500 md:border-l">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                    <div class="ml-4 text-lg text-gray-200 leading-7 font-semibold">Une suggestion ?</div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-400">
                        Nous sommes ouverts à toute suggestion, écrivez nous à bonjour@bde-anubis.eu et nous essayerons de vous répondre rapidement.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import JetApplicationLogo from '@/Jetstream/ApplicationLogo'

    export default {
        components: {
            JetApplicationLogo,
        },
    }
</script>
