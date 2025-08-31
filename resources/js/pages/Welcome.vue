<script setup lang="ts">
import { dashboard, login, register } from '@/routes';
import { Head, Link } from '@inertiajs/vue3';
import Footer from '@/components/Footer.vue';
import TopBar from '@/components/TopBar.vue';
</script>

<template>
    <TopBar />
  <Head title="Always Fit">
    <link rel="preconnect" href="https://rsms.me/" />
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
  </Head>

  <div class="min-h-screen flex flex-col bg-white text-[#1b1b18] dark:bg-[#0a0a0a] dark:text-[#EDEDEC] h-[100vh]">
    <header class="w-full px-6 py-4 flex items-center justify-between">
      <div class="flex items-center gap-2">
        <img src="/way_fit_logo.svg" alt="Always Fit" class="h-8 w-auto" />
      </div>

      <nav class="flex items-center gap-3">
        <Link v-if="$page.props.auth.user" :href="dashboard()" class="text-sm px-3 py-1.5 rounded-md bg-black text-white dark:bg-white dark:text-black">
          Dashboard
        </Link>
        <template v-else>
          <Link :href="login()" class="text-sm px-3 py-1.5 hover:underline">Entrar</Link>
          <Link :href="register()" class="text-sm px-3 py-1.5 rounded-md border">
            Criar conta
          </Link>
        </template>
      </nav>
    </header>

    <main class="flex-1 grid place-items-center px-6">
      <div class="max-w-xl text-center">
        <img src="/way_fit_logo.svg " alt="Always Fit" class="mx-auto h-12 w-auto mb-4 opacity-90" />
        <h1 class="text-3xl font-semibold">Bem-vindo(a) à Always Fit</h1>
        <p class="mt-2 text-sm text-[#706f6c] dark:text-[#A1A09A]">
          Treinos simples. Resultados reais.
        </p>

        <div class="mt-6 flex flex-col items-center gap-3 sm:flex-row sm:justify-center">
          <Link :href="register()" class="w-full sm:w-auto inline-flex justify-center rounded-md bg-emerald-600 px-5 py-2 text-sm font-medium text-white hover:bg-emerald-700">
            Começar agora
          </Link>
          <Link :href="$page.props.auth.user ? dashboard() : login()" class="w-full sm:w-auto inline-flex justify-center rounded-md border px-5 py-2 text-sm">
            Ver painel
          </Link>
        </div>
      </div>
    </main>
  </div>
  <Footer />
</template>
