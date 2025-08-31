<script setup lang="ts">
import { User } from '@/types'
import { Link, router } from '@inertiajs/vue3'
import { logout } from '@/routes'
import { LogOut, ArrowLeft } from 'lucide-vue-next'

interface Props { user: User, pageTitle?: string }
const handleLogout = () => router.flushAll()
const handleClick = () => router.visit('/dashboard')
defineProps<Props>()
</script>

<template>
  <div class="h-full shadow-xl shadow-stone-300 grid grid-cols-1 bg-background-dark">
    <div class=" h-full w-full mx-auto max-w-6xl px-10 sm:px-6 lg:px-8 flex items-center">
      <div class="flex-1 flex items-center cursor-pointer"
      @click="handleClick">
        <img src="/way_fit_logo.svg" href="" alt="Logo" class="h-9 sm:h-8 shrink-0" />
      </div>

      <div class="flex align-center justify-center text-center">
        <div class="flex items-center">   
          <ArrowLeft v-if="pageTitle" class="h-5 w-5 cursor-pointer" @click="handleClick" />
          <h1 class="text-xl sm:text-2xl font-extrabold tracking-tight">
            {{ pageTitle || 'Dashboard' }}
          </h1>
        </div>
      </div>

      <div class="flex-1 flex justify-end">
        <Link
          :href="logout()"
          as="button"
          @click="handleLogout"
          class="group inline-flex items-center gap-2 rounded-md px-3 py-2 text-sm font-medium
                 text-slate-600 hover:text-slate-900 hover:bg-slate-100
                 focus:outline-none focus-visible:ring-2 focus-visible:ring-slate-400/60
                 transition"
        >
          <LogOut class="h-4 w-4 transition-transform group-hover:-translate-x-0.5" />
          <span class="cursor-pointer">Sair</span>
        </Link>
      </div>
    </div>
  </div>
</template>
