<script setup lang="ts">
import TopBar from '@/components/TopBar.vue';
import Footer from '@/components/Footer.vue';
import NavDashboar from '@/components/ui/navigation-menu/NavDashboard.vue';
import { usePage } from '@inertiajs/vue3';

type Item = { text: string; note?: string }
type Section = { icon: string; title: string; items: Item[] }


const page = usePage();
const pageName = page.component
const user = page.props.auth.user;

const secoes: Section[] = [
  {
    icon: '🍳', title: 'Café da manhã',
    items: [
      { text: 'Omelete Proteico', note: '3 claras e 1 gema, tomate, cebola e queijo branco' },
      { text: 'Vitamina de Banana e Aveia 🥛', note: 'Leite desnatado, banana e 2 colheres de aveia' },
    ]
  },
  {
    icon: '🍏', title: 'Lanche da Manhã',
    items: [
      { text: 'Iogurte Natural com Granola 🥣' },
      { text: 'Iogurte desnatado, granola e mel' },
    ]
  },
  {
    icon: '🍗', title: 'Almoço',
    items: [
      { text: 'Peito de Frango Grelhado com Quinoa', note: 'Filé de frango, quinoa cozida e salada de folhas' },
      { text: 'Batata Doce Assada', note: 'Assada no forno com azeite e ervas' },
    ]
  },
  {
    icon: '🧃', title: 'Lanche da Tarde',
    items: [
      { text: 'Pasta de Amendoim com Pão Integral 🥪', note: '1 fatia de pão integral com pasta de amendoim' },
      { text: 'Suco de Laranja Natural', note: 'Sem açúcar' },
    ]
  },
  {
    icon: '🍽️', title: 'Jantar',
    items: [
      { text: 'Salmão Grelhado com Legumes 🥦', note: 'Salmão, brócolis, cenoura e abobrinha' },
      { text: 'Arroz Integral', note: 'Porção pequena para energia leve' },
    ]
  },
  {
    icon: '🥤', title: 'Ceia (Opcional)',
    items: [
      { text: 'Shake Proteico', note: 'Whey com leite ou água' },
    ]
  },
]

const dicaCurta = `
Tente fazer da sua refeição um momento de pausa e presença.
Coma devagar, apreciando cada sabor — isso faz bem para o corpo e a mente.
`

const dicaLonga = `
Em meio à correria do dia a dia, fazer uma pausa para se alimentar é
um gesto de cuidado consigo mesmo. Mais do que ingerir alimentos, a
refeição é um ritual de conexão: com seus sentidos e o momento presente.
Respire fundo e observe seu prato: as cores, os aromas, as texturas.
Coma devagar, apreciando cada garfada como uma celebração. Sinta gratidão
por cada ingrediente e pelo caminho até chegar até você.
`
</script>

<template>
    <TopBar />
    <div class="h-[15vh] grid grid-cols-1">
        <NavDashboar :user="user" page-title="Plano Nutricional"  />
    </div>
  <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h2 class="text-center text-xl sm:text-2xl font-bold text-slate-800 mb-6">Refeições do dia</h2>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
      <div class="lg:col-span-2 space-y-4">
        <section v-for="sec in secoes" :key="sec.title"
          class="bg-white border rounded-xl p-4 sm:p-5 shadow-sm">
          <header class="flex items-center gap-2 text-slate-800 font-semibold mb-3">
            <span class="text-lg">{{ sec.icon }}</span>
            <h3 class="leading-none">{{ sec.title }}</h3>
          </header>

          <ul class="space-y-2">
            <li v-for="(it, i) in sec.items" :key="i" class="text-slate-700">
              <div class="flex items-start gap-2">
                <span class="mt-1">•</span>
                <div>
                  <p class="font-medium">{{ it.text }}</p>
                  <p v-if="it.note" class="text-sm text-slate-500 -mt-0.5">{{ it.note }}</p>
                </div>
              </div>
            </li>
          </ul>
        </section>
      </div>
      <aside class="space-y-4">
        <div class="bg-[#CFE9FB] text-slate-800/90 rounded-xl p-4 sm:p-5">
          <p class="font-medium">
            Tente fazer da sua refeição um momento de <u>pausa</u> e <u>presença</u>.
          </p>
          <p class="mt-2 text-sm leading-relaxed">{{ dicaCurta }}</p>
        </div>

        <div class="bg-[#F5EED8] text-slate-800/90 rounded-xl p-4 sm:p-5">
          <p class="text-sm leading-relaxed whitespace-pre-line">
            {{ dicaLonga }}
          </p>
        </div>
      </aside>
    </div>
  </div>
  <Footer />
</template>
