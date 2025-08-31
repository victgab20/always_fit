<script setup lang="ts">

import TopBar from '@/components/TopBar.vue';
import Footer from '@/components/Footer.vue';
import NavDashboar from '@/components/ui/navigation-menu/NavDashboard.vue';
import { usePage } from '@inertiajs/vue3';


const page = usePage();
const user = page.props.auth.user;


type Exercicio = {
  id: number
  nome: string
  series: string
  cargaInicial: string
  iniciadoEm: string
  feitos: number
  meta: number
}

const itens: Exercicio[] = [
  { id: 1, nome: 'Supino Reto', series: '5 séries de 15 repetições cada', cargaInicial: 'Iniciar com 5kg e aumentar conforme possível', iniciadoEm: '13/03/2024', feitos: 23, meta: 30 },
  { id: 2, nome: 'Supino Reto', series: '5 séries de 15 repetições cada', cargaInicial: 'Iniciar com 5kg e aumentar conforme possível', iniciadoEm: '13/03/2024', feitos: 23, meta: 30 },
  { id: 3, nome: 'Supino Reto', series: '5 séries de 15 repetições cada', cargaInicial: 'Iniciar com 5kg e aumentar conforme possível', iniciadoEm: '13/03/2024', feitos: 23, meta: 30 },
  { id: 4, nome: 'Supino Reto', series: '5 séries de 15 repetições cada', cargaInicial: 'Iniciar com 5kg e aumentar conforme possível', iniciadoEm: '13/03/2024', feitos: 23, meta: 30 },
  { id: 5, nome: 'Supino Reto', series: '5 séries de 15 repetições cada', cargaInicial: 'Iniciar com 5kg e aumentar conforme possível', iniciadoEm: '13/03/2024', feitos: 23, meta: 30 },
]
</script>

<template>
    <TopBar />
    <div class="h-[15vh] grid grid-cols-1">
        <NavDashboar :user="user" :page-title="'Progresso'" />
    </div>
  <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h2 class="text-center text-xl sm:text-2xl font-bold text-slate-800">Progresso dos seus treinos</h2>

    <div class="mt-4 rounded-lg bg-sky-100 text-slate-800/90 p-3 text-sm leading-relaxed">
      A chave para a evolução está na <b>consistência</b>! Mantenha sua rotina, aumente a carga
      <b>progressivamente</b> e respeite os dias de <b>descanso</b> para melhores resultados.
    </div>

    <div class="mt-5 grid grid-cols-1 md:grid-cols-2 gap-5">
      <article v-for="ex in itens" :key="ex.id" class="bg-white border rounded-xl shadow-sm p-4">
        <h3 class="font-semibold text-slate-900">{{ ex.nome }}</h3>

        <p class="mt-2 text-slate-700 text-sm">{{ ex.series }}</p>
        <p class="mt-1 text-slate-700 text-sm">{{ ex.cargaInicial }}</p>

        <p class="mt-3 text-xs text-slate-500">
          <span class="font-semibold text-slate-700">Iniciada:</span> {{ ex.iniciadoEm }}
        </p>

        <div class="mt-3 text-sm font-medium text-slate-800">Meta</div>

        <div class="mt-1 w-full h-4 bg-slate-200 rounded overflow-hidden flex">
          <div class="h-full bg-green-700"
               :style="{ width: Math.min(100, Math.round((ex.feitos / ex.meta) * 100)) + '%' }"/>
          <div class="h-full bg-red-600 flex-1"/>
        </div>

        <div class="mt-2 flex justify-between text-xs">
          <span class="px-2 py-0.5 rounded bg-green-700 text-white">{{ ex.feitos }} dias</span>
          <span class="px-2 py-0.5 rounded bg-red-600 text-white">
            {{ Math.max(ex.meta - ex.feitos, 0) }} dias
          </span>
        </div>
      </article>
    </div>
  </div>
<Footer />
</template>
