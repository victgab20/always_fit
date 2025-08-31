<script setup lang="ts">
import { Head, usePage } from '@inertiajs/vue3';
import Footer from '@/components/Footer.vue';
import TopBar from '@/components/TopBar.vue';
import NavDashboard from '@/components/ui/navigation-menu/NavDashboard.vue';
import GroupMetric from '@/components/ui/card/GroupMetric.vue';
import GroupDashboard from '@/components/ui/card/GroupDashboard.vue';

const page = usePage();
const user = page.props.auth.user;

</script>

<template>
  <Head title="Dashboard" />
  <TopBar />
  <div class="h-[15vh] grid grid-cols-1">
    <NavDashboard :user="user" />
  </div>

  <div class="bg-background * min-h-[100vh] pt-20">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 py-6 space-y-6">
      <p class="text-l text-slate-600">
        Olá <b class="font-semibold text-slate-900">{{ user.name }}</b>, Seja bem-vindo!
      </p>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 border-b-2 pb-15">
        <GroupDashboard class=""/> 
      </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-10 pb-10">
        <GroupMetric />   
    </div>

    </div>
  </div>
  <Footer />
</template>
