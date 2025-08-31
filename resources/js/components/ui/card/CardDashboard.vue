<script setup lang="ts">
import type { HTMLAttributes } from 'vue'
import { cn } from '@/lib/utils'

const props = defineProps<{
  class?: HTMLAttributes['class']
  imgSrc?: string
  imgAlt?: string
  title?: string
}>()
</script>

<template>
  <div
    data-slot="card"
    :class="
      cn(
        'flex flex-col justify-between rounded-2xl py-6 shadow-sm ',
        props.class,
      )
    "
  >
  <img v-if="props.imgSrc" :src="props.imgSrc" :alt="props.imgAlt || ''" />
<div class="flex justify-center align-center py-2 font-semibold "><p>{{ title }}</p></div>
  </div>
</template>
