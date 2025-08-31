<script setup lang="ts">
import { ref, onMounted } from 'vue'
import { usePage } from '@inertiajs/vue3'
import axios from 'axios'

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
const error = ref<string | null>(null)

onMounted(async () => {
  try {
    const token = localStorage.getItem('token')
    if (!token) throw new Error('Sem token — redirecione para login')

    const { data } = await axios.get('api/trainings', {
      headers: { Authorization: `Bearer ${token}` },
    })

    const treino = data.data?.[0]
    exercicios.value = treino?.exercises ?? []

    const rows = data.data ?? []
    if (!rows.length) {
      error.value = 'Você não tem treinos.'
      return
    }
  } catch (e: any) {
    console.error(
      'Erro ao carregar exercícios da API',
      e?.response?.status,
      e?.response?.data || e?.message || e
    )
    error.value = 'Não foi possível carregar seus treinos.'
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

  <div class="max-w-6xl mx-auto px-4 py-8 pt-20 min-h-screen">
    <div class="text-center mb-6">
      <h2 class="text-lg font-semibold">Seus treinos de hoje</h2>
    </div>

    <div v-if="loading" class="flex justify-center items-center py-12">
      <div class="animate-spin rounded-full h-10 w-10 border-b-2 border-slate-600"></div>
    </div>

    <div v-else-if="error" class="text-center text-red-500 py-12">
      {{ error }}
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
