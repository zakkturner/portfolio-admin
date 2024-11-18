<template>
  <AuthenticatedLayout>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

          <div class="bg-white p-6" >
            <h1 class="capitalize">Create Category</h1>
            <CategoryForm  :edit="false" />
            <hr />

              <div class="mt-4">
                <a href="/projects">Go Back</a>
              </div>
          </div>
        </div>
      </div>

    </div>

  </AuthenticatedLayout>
  <Modal :show="show">
    <div class="p-4 flex flex-col">
      <h3 class="mb-6">Are you sure you want to delete this project?</h3>
      <div class="flex justify-between">
        <SecondaryButton @click="show = false">Cancel</SecondaryButton>
        <Link
            class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150"
            :href="route('projects.destroy', category.id)"
            as="button"
            method="DELETE"
            @click="show = false"
        >
          Yes, Delete
        </Link>
      </div>
    </div>
  </Modal>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Modal from "@/Components/Modal.vue";
import CustomForm from "@/Components/form/CustomForm.vue";
import DangerButton from "@/Components/DangerButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import { ref } from "vue";
import { useForm, Link } from "@inertiajs/vue3";
import CategoryForm from "@/Components/form/CategoryForm.vue";

const show = ref(false);
</script>

<style lang="scss" scoped></style>
