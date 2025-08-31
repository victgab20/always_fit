<script setup lang="ts">
import { computed } from 'vue'
const props = defineProps<{
  ex: { id:number; titulo:string; subtitulo:string; img:string; feitos:number; meta:number; concluido:boolean }
}>()

const restante = computed(() => Math.max(props.ex.meta - props.ex.feitos, 0))
const pct      = computed(() => Math.min(100, Math.round((props.ex.feitos / props.ex.meta) * 100)))

</script>

<template>
  <div class="bg-white rounded-xl border p-5 shadow-sm">
    <div class="space-y-1">
      <p class="text-slate-900 font-semibold leading-tight">{{ ex.titulo }}</p>
      <p class="text-slate-700 -mt-1">{{ ex.subtitulo }}</p>
    </div>

    <img :src="ex.img ?? '/supino.png'" alt="" class="h-36 mx-auto my-4 object-contain" />

    <div class="flex items-center justify-between mb-3">
      <span class="text-sm">Realizado?</span>
      <label class="inline-flex items-center cursor-pointer">
        <input type="checkbox" class="sr-only" :checked="ex.concluido" />
        <span class="w-10 h-6 bg-slate-300 rounded-full relative">
          <span :class="[
              'absolute top-0.5 left-0.5 w-5 h-5 rounded-full bg-white transition',
              ex.concluido ? 'translate-x-4 bg-white' : ''
            ]"></span>
        </span>
      </label>
    </div>

    <div class="text-sm mb-1">Meta</div>
    <div class="w-full h-4 bg-slate-200 rounded overflow-hidden flex">
      <div class="h-full bg-green-600" :style="{ width: pct + '%' }"></div>
      <div class="h-full bg-red-600 flex-1"></div>
    </div>
    <div class="flex justify-between text-xs mt-1">
      <span class="px-2 py-0.5 bg-green-700 text-white rounded">{{ ex.feitos }} dias</span>
      <span class="px-2 py-0.5 bg-red-700 text-white rounded">{{ restante }} dias</span>
    </div>

    <div class="mt-3">
      <slot />
    </div>
  </div>
</template>
