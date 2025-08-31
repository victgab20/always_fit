<script setup lang="ts">
import { CardMetric } from '@/components/ui/card';

interface Metric {
    class?: string;
    data?: string;
    title?: string;
}

const metrics: Metric[] = [
    { class: '', data: '3', title: 'Treinos concluidos/semana' },
    { class: '', data: '5', title: 'Treinos disponiveis' },
    { class: '', data: '2', title: 'Treinos restantes' },
];
</script>

<template>
    <div
        v-for="(metric, idx) in metrics"
        :key="idx"
        class="rounded-xl bg-white p-6 shadow-xl shadow-stone-300"
        :class="metric.class"
    >
        <CardMetric :data="metric.data" :title="metric.title" />
    </div>
</template>