<script setup>

import {Head, router, usePage} from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import ProjectCard from "@/Components/projects/ProjectCard.vue";
import DangerButton from "@/Components/DangerButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import NavLink from "@/Components/NavLink.vue";
import Modal from "@/Components/Modal.vue";
import {computed, ref} from "vue";
import dayjs from "dayjs";
defineProps({
  submissions: Object
});

const page = usePage();


const flashMessage = computed(() => page.props.flash?.message || null);

const modalOpen = ref(false);
const selectedSubmission = ref(null);
function handleDelete(){
  router.delete(route('submissions.destroy',selectedSubmission.value));
  modalOpen.value = false;
}

function handleModal(submission){

  if(selectedSubmission.value == null){
    selectedSubmission.value = submission;
    modalOpen.value = true;
  }else{
    selectedSubmission.value = null;
    modalOpen.value = false;
  }
}

const formattedDate = (date) => computed(()=>{
      return dayjs(date).format("MMMM DD YYYY");
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
      <div class="grid grid-cols-5 gap-x-8 px-2 pt-4 justify-between">
        <h4>Name</h4>
        <h4>Email</h4>
        <h4>Message</h4>
        <h4>Date</h4>
        <h4>Actions</h4>
      </div>
        <ul class=" divide-y bg-gray-600 rounded">
          <li v-for="submission in submissions" class="text-white p-2 grid grid-cols-5 gap-x-8 ">
            <span>
              {{submission.name}}
            </span>
            <span>
              {{submission.email}}
            </span>
            <span>
              {{submission.message}}
            </span>
            <span>
              {{formattedDate(submission.created_at).value}}
            </span>
            <span class="flex  items-center">
              <a :href="`mailto:${submission.email}`" class="mr-4 rounded bg-white px-4 py-1">Reply</a>
              <danger-button @click="handleModal(submission)">Delete</danger-button>
            </span>
          </li>
        </ul>
    </div>
    <div v-if="flashMessage !== null" class="fixed bg-green-500 rounded bottom-10 right-0"  >
      <button
          @click.prevent="() => page.props.flash.message = null"
          class="rounded-full w-1 h-1 flex justify-center items-center p-4 bg-white border-gray-200 absolute -left-4 -top-4">
        X
      </button>
      <h4 class="text-white text-lg p-4">{{flashMessage}}</h4>

    </div>
   <Teleport to="body">
      <modal class="flex items-center" :show="modalOpen">
        <div class="flex flex-col items-center w-full py-4">
          <div class="">
            <h2>Delete {{ selectedSubmission.name}}'s Message?</h2>
          </div>
          <div class="">
            <danger-button class="mr-4" @click="handleDelete">Confirm</danger-button>
            <button class="rounded-full" @click="modalOpen = false">
              Cancel
            </button>
          </div>

        </div>
      </modal>
   </Teleport>
  </AuthenticatedLayout>
</template>

<style scoped lang="scss">

</style>