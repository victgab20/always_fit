<script setup lang="ts">
type PolicyLink = { label: string; href: string }

const props = withDefaults(defineProps<{
  logoSrc?: string
  companyName?: string
  sacPhone?: string 
  contactPhone?: string
  whatsappIntl?: string
  addressLines?: string[]
  cnpj?: string
  policies?: PolicyLink[]
}>(), {
  logoSrc: '/footer_img.svg',
  companyName: 'ALWAYS FIT ®',
  sacPhone: '0800 456-5103',
  contactPhone: '1799126-6117',
  whatsappIntl: '5517991266117',
  addressLines: () => [
    'Rodovia Fernão Dias, 937',
    'Complemento: BW Diase -',
    'DocaLog G500 Módulo 5',
    'CEP: 37646-202',
    'Extrema - MG'
  ],
  cnpj: '30.417.094/0001-60',
  policies: () => [
    { label: 'Quem Somos', href: '#' },
    { label: 'Política de Segurança', href: '#' },
    { label: 'Política de Privacidade', href: '#' },
    { label: 'Política de Entrega', href: '#' },
    { label: 'Política de Cookies', href: '#' },
    { label: 'Política de Devolução', href: '#' },
  ]
})

const telHref = (n: string) => `tel:${n.replace(/\D/g, '')}`
const waHref = (nIntl: string) => `https://wa.me/${nIntl}`
</script>

<template>
  <footer class="bg-foreground text-white text-base sm:text-lg">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-10 sm:py-14 grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-10">
      <div class="flex items-center justify-center md:justify-start">
        <img :src="logoSrc" :alt="`${companyName} — logomarca`" class="max-w-full h-auto" />
      </div>

      <div class="text-sm sm:text-base space-y-2">
        <div class="font-bold mb-2">{{ companyName }}</div>

        <div class="">Saúde Longevidade e Autoestima</div>
        <a :href="telHref(sacPhone)" class="hover:underline">{{ sacPhone }}</a>

        <div class="font-semibold mt-4">Contato</div>
        <a :href="telHref(contactPhone)" class="block hover:underline">{{ contactPhone }}</a>
        <a :href="waHref(whatsappIntl)" target="_blank" rel="noopener" class="block hover:underline">
          WhatsApp
        </a>

        <address class="not-italic mt-4">
          <div class="mb-1"><span class="font-bold">Endereço</span></div>
          <template v-for="(line, i) in addressLines" :key="i">
            {{ line }}<br />
          </template>
          <div class="mt-2">CNPJ: {{ cnpj }}</div>
        </address>
      </div>
      <nav class="text-sm sm:text-base space-y-2" aria-label="links institucionais">
        <div class="font-semibold mb-2">Política</div>
        <a v-for="p in policies" :key="p.label" :href="p.href" class="block hover:underline">
          {{ p.label }}
        </a>
      </nav>
    </div>

    <div class="border-t border-white/10 py-4 text-center text-xs sm:text-sm text-white/70">
      © 2025 Always Fit - Victor Gabriel
    </div>
  </footer>
</template>
