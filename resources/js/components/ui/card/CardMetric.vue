<script setup lang="ts">
import type { HTMLAttributes } from 'vue'
import { cn } from '@/lib/utils'

const props = defineProps<{
  class?: HTMLAttributes['class'],
  data?: string,
  title?: string
}>()
</script>

<template>
  <div
    data-slot="card"
    :class="
      cn(
        'flex h-full rounded-2xl py-6',
        props.class,
      )
    "
  >
<div>
    <p>{{ title }}</p>
    <p class="font-bold text-[30px]">{{ data }}</p>
</div>
    <slot />
  </div>
</template>
