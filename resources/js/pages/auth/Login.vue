<script setup lang="ts">
import { ref } from 'vue'
import InputError from '@/components/InputError.vue'
import TextLink from '@/components/TextLink.vue'
import { Button } from '@/components/ui/button'
import { Input } from '@/components/ui/input'
import { register } from '@/routes'
import { request } from '@/routes/password'
import { Head, router } from '@inertiajs/vue3'
import { LoaderCircle } from 'lucide-vue-next'
import TopBar from '@/components/TopBar.vue'
import Footer from '@/components/Footer.vue'
import { loginToken } from '@/api/auth'

defineProps<{ status?: string; canResetPassword: boolean }>()

const email = ref('')
const password = ref('')
const processing = ref(false)
const errorMsg = ref<string | null>(null)

async function onSubmit() {
  errorMsg.value = null
  processing.value = true
  try {
    await loginToken(email.value, password.value)
    router.visit('/dashboard')
  } catch (e: any) {
    errorMsg.value = 'E-mail ou senha incorretos.'
  } finally {
    processing.value = false
  }
}
</script>

<template>
  <Head title="Login">
    <link rel="preconnect" href="https://rsms.me/" />
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
  </Head>

  <TopBar />

  <div class="flex min-h-screen bg-[#FDFDFC] text-[#1b1b18]">
    <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8 py-8 sm:py-12 grid place-items-center">
      <main class="w-full max-w-md sm:max-w-lg md:max-w-xl lg:max-w-2xl">
        <div class="rounded-xl shadow-lg bg-[#F6F6FA] w-full">
          <div class="p-4 sm:p-6 md:p-8">
            <div class="mb-6 flex items-center justify-center">
              <img src="/way_fit_logo.svg" alt="AlwaysFit" class="h-9 mr-2" />
            </div>

            <h1 class="text-2xl sm:text-3xl font-extrabold text-center mb-6 sm:mb-10">Login</h1>

            <p class="mb-2 font-bold">Olá!</p>
            <p class="text-sm">Este é o ambiente seguro de login da Always Fit ®</p>

            <p class="mt-8 sm:mt-10 mb-2 font-bold">Para acessar, informe suas credenciais.</p>

            <div v-if="status" class="mb-4 text-center text-sm font-medium text-green-600">
              {{ status }}
            </div>
            <form @submit.prevent="onSubmit" class="flex flex-col gap-6">
              <div v-if="errorMsg" class="rounded border border-red-300 bg-red-50 px-4 py-3 text-sm text-red-700">
                {{ errorMsg }}
              </div>

              <div class="grid gap-4 sm:gap-6">
                <div class="grid gap-2">
                  <Input
                    id="email"
                    v-model="email"
                    type="email"
                    name="email"
                    required
                    autofocus
                    :tabindex="1"
                    autocomplete="email"
                    placeholder="E-mail"
                    class="w-full bg-[#FDFDFC] border-2 border-black"
                  />
                  <InputError :message="undefined" />
                </div>

                <div class="grid gap-2">
                  <div class="flex justify-end">
                    <TextLink v-if="canResetPassword" :href="request()" class="text-sm" :tabindex="5">
                      Esqueceu a senha?
                    </TextLink>
                  </div>
                  <Input
                    id="password"
                    v-model="password"
                    type="password"
                    name="password"
                    required
                    :tabindex="2"
                    autocomplete="current-password"
                    placeholder="Senha"
                    class="w-full bg-[#FDFDFC] border-2 border-black"
                  />
                  <InputError :message="undefined" />
                </div>

                <Button type="submit" class="mt-2 w-full bg-[#153B4E] hover:bg-[#0e2a3a]" :tabindex="4" :disabled="processing">
                  <LoaderCircle v-if="processing" class="h-4 w-4 mr-2 animate-spin" />
                  Logar
                </Button>
              </div>

              <div class="text-center text-sm text-muted-foreground mt-2">
                Não tem conta?
                <TextLink :href="register()" :tabindex="5">Criar conta</TextLink>
              </div>
            </form>
          </div>
        </div>
      </main>
    </div>
  </div>
  <Footer />
</template>
