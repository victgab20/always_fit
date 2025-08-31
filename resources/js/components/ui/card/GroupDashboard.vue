<script setup lang="ts">
import { CardDashboard } from '@/components/ui/card'
import { Link } from '@inertiajs/vue3'

const cards = [
  { title: 'Treinos', img: '/treino.png', href: '/treinos' },
  { title: 'Plano Nutricional', img: '/nutricao.png', href: '/nutricao' },
  { title: 'Progresso', img: '/progresso.png', href: '/progresso' },
]
</script>

<template>
  <div v-for="card in cards" :key="card.title" class="rounded-xl bg-[#153B4E] text-white px-10 shadow-sm cursor-pointer">
    <Link :href="card.href" class="block w-full h-full">
      <CardDashboard class="w-full h-full" :img-src="card.img" :title="card.title" />
    </Link>
  </div>
</template>
