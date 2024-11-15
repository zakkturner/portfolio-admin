<script setup>

import {Head} from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import ProjectCard from "@/Components/projects/ProjectCard.vue";
import DangerButton from "@/Components/DangerButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import NavLink from "@/Components/NavLink.vue";
defineProps({
  submissions: Object
})
</script>

<template>
  <Head title="Projects" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Dashboard
      </h2>
    </template>
    <div class=" flex flex-col justify-center h-screen max-w-7xl mx-auto sm:px-6 lg:px-8">
      <h1 class="text-5xl">Form Submissions</h1>
      <hr/>
      <div class="grid grid-cols-4 px-2 pt-4 justify-between">
        <h4>Name</h4>
        <h4>Email</h4>
        <h4>Message</h4>
        <h4>Actions</h4>
      </div>
        <ul class="divide-y bg-gray-600 rounded">
          <li v-for="submission in submissions" class="text-white p-2 grid grid-cols-4">
            <span>
              {{submission.name}}
            </span>
            <span>
              {{submission.email}}
            </span>
            <span>
              {{submission.message}}
            </span>
            <span class="flex  items-center">
              <a :href="`mailto:${submission.email}`" class="mr-4 rounded bg-white px-4 py-1">Reply</a>
              <danger-button>Delete</danger-button>
            </span>
          </li>
        </ul>
    </div>

  </AuthenticatedLayout>
</template>

<style scoped lang="scss">

</style>