<script setup lang="ts">
import { ref, onMounted } from 'vue'
import { usePage } from '@inertiajs/vue3'

import TopBar from '@/components/TopBar.vue'
import Footer from '@/components/Footer.vue'
import NavDashboar from '@/components/ui/navigation-menu/NavDashboard.vue'
import { CardExercise } from '@/components/ui/card'
import { Link } from '@inertiajs/vue3'

type Ex = {
  id: number
  titulo: string
  subtitulo: string
  img: string
  feitos: number
  meta: number
  concluido: boolean
}

const page = usePage()
const user = page.props.auth.user
const pageName = page.component

const exercicios = ref<Ex[]>([])
const loading = ref(true)

const MOCK_EXERCICIOS: Ex[] = [
  {
    id: 1,
    titulo: 'Supino reto',
    subtitulo: '3 séries x 12 reps',
    img: '/images/ex/supino-reto.jpg',
    feitos: 12,
    meta: 36,
    concluido: false,
  },
  {
    id: 2,
    titulo: 'Flexão de braços',
    subtitulo: '4 séries x 10 reps',
    img: '/images/ex/flexao.jpg',
    feitos: 40,
    meta: 40,
    concluido: true,
  },
  {
    id: 3,
    titulo: 'Remada curvada',
    subtitulo: '3 séries x 10 reps',
    img: '/images/ex/remada-curvada.jpg',
    feitos: 10,
    meta: 30,
    concluido: false,
  },
  {
    id: 4,
    titulo: 'Desenvolvimento militar',
    subtitulo: '3 séries x 8 reps',
    img: '/images/ex/desenvolvimento-militar.jpg',
    feitos: 16,
    meta: 24,
    concluido: false,
  },
  {
    id: 5,
    titulo: 'Rosca direta',
    subtitulo: '3 séries x 12 reps',
    img: '/images/ex/rosca-direta.jpg',
    feitos: 36,
    meta: 36,
    concluido: true,
  },
  {
    id: 6,
    titulo: 'Tríceps testa',
    subtitulo: '3 séries x 12 reps',
    img: '/images/ex/triceps-testa.jpg',
    feitos: 24,
    meta: 36,
    concluido: false,
  },
]

onMounted(async () => {
  try {

    await new Promise(r => setTimeout(r, 400))
    exercicios.value = MOCK_EXERCICIOS
  } catch (e) {
    console.error('Erro ao carregar exercícios (mock)', e)
  } finally {
    loading.value = false
  }
})
</script>

<template>
  <TopBar />
  <div class="h-[15vh] grid grid-cols-1">
    <NavDashboar :user="user" :page-title="pageName" />
  </div>

  <div class="max-w-6xl mx-auto px-4 py-8 pt-20">
    <div class="text-center mb-6">
      <h2 class="text-lg font-semibold">Seus treinos de hoje</h2>
      <p class="text-slate-500 -mt-1">Membros superiores</p>
    </div>

    <div v-if="loading" class="flex justify-center items-center py-12">
      <div class="animate-spin rounded-full h-10 w-10 border-b-2 border-slate-600"></div>
    </div>

    <div v-else class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <CardExercise v-for="ex in exercicios" :key="ex.id" :ex="ex">
        <Link
          :href="`/treinos/${ex.id}`"
          class="w-full border-2 border-green-400 rounded-md py-2 px-30 text-green-600 text-center text-sm font-medium hover:bg-slate-50"
        >
          Detalhes
        </Link>
      </CardExercise>
    </div>
  </div>

  <Footer />
</template>
