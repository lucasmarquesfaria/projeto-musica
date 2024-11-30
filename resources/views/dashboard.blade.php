<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard - Rede Social para Músicos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Grid Layout -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Card: Total Usuários -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h3 class="text-lg font-semibold">Usuários Registrados</h3>
                        <p class="text-2xl font-bold text-blue-500">150</p>
                    </div>
                </div>

                <!-- Card: Músicas Compartilhadas -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h3 class="text-lg font-semibold">Músicas Compartilhadas</h3>
                        <p class="text-2xl font-bold text-green-500">325</p>
                    </div>
                </div>

                <!-- Card: Projetos Colaborativos -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h3 class="text-lg font-semibold">Projetos Colaborativos</h3>
                        <p class="text-2xl font-bold text-orange-500">12</p>
                    </div>
                </div>
            </div>

            <!-- Feed de Atividades -->
            <div class="mt-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-xl font-semibold mb-4">Atividades Recentes</h3>
                    <ul>
                        <li class="mb-2">🎵 João Silva compartilhou uma nova música: *"Melodia Azul"*.</li>
                        <li class="mb-2">🎸 Ana Costa criou um novo projeto colaborativo: *"Rock Nacional"*.</li>
                        <li class="mb-2">🎤 Pedro Oliveira conectou-se com Maria Clara.</li>
                    </ul>
                </div>
            </div>

            <!-- Mensagem de Boas-Vindas -->
            <div class="mt-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-center">
                    <h3 class="text-2xl font-semibold text-gray-700">Bem-vindo ao painel da sua Rede Social!</h3>
                    <p class="text-gray-600">Aqui você pode gerenciar os usuários, músicas e projetos colaborativos.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
